<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordController extends Controller
{
    // Show forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.password.forgot-password');
    }

    // Send OTP to email
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        // Generate OTP (plain for email only)
        $otp = rand(100000, 999999);

        // Store hashed OTP in password_resets and set expiry in DB (datetime)
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => Hash::make($otp),
                'created_at' => now(),
                'otp_expires_at' => now()->addMinutes(2),
            ]
        );

        // Send OTP email (plain OTP)
        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Password Reset OTP');
        });

        // Persist email + expiry timestamp in session (seconds)
        session([
            'reset_email' => $user->email,
            'otp_expires_at' => now()->addMinutes(2)->timestamp, // store integer seconds
        ]);

        return redirect()->route('password.reset-password')->with('success', 'An OTP has been sent to your email.');
    }

    // Resend OTP (to the email already stored in session)
    public function resendOtp(Request $request)
    {
        $email = session('reset_email');

        if (!$email) {
            return redirect()->route('password.forgot-password')->withErrors(['email' => 'Session expired. Please try again.']);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('password.forgot-password')->withErrors(['email' => 'Email not found.']);
        }

        $otp = rand(100000, 999999);

        // Update DB with new hashed OTP + reset expiry (datetime)
        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            [
                'token' => Hash::make($otp),
                'created_at' => now(),
                'otp_expires_at' => now()->addMinutes(2),
            ]
        );

        // Send OTP via email
        Mail::raw("Your new OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Password Reset OTP (Resent)');
        });

        // Update expiry in session as integer timestamp (seconds)
        session(['otp_expires_at' => now()->addMinutes(2)->timestamp]);

        return redirect()->route('password.reset-password')->with('success', 'A new OTP has been sent to your email.');
    }

    // Show reset password form (reads email from session)
    public function showVerifyOtpForm(Request $request)
    {
        $email = session('reset_email');
        if (!$email) {
            return redirect()->route('password.forgot-password')
                ->withErrors(['email' => 'Please enter your email to receive OTP.']);
        }
        return view('auth.password.reset-password', ['email' => $email]);
    }

    // Reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:5|confirmed',
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Invalid OTP or email.']);
        }

        // Check OTP expiry (DB stores datetime in otp_expires_at)
        if (isset($record->otp_expires_at) && Carbon::now()->greaterThan(Carbon::parse($record->otp_expires_at))) {
            session()->forget('otp_expires_at'); // let Blade show no timer
            return back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }


        // Verify OTP using Hash::check
        if (!Hash::check($request->otp, $record->token)) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete OTP record + clear session
        DB::table('password_resets')->where('email', $request->email)->delete();
        session()->forget(['reset_email', 'otp_expires_at']);

        return redirect()->route('admin.login')->with('success', 'Password reset successfully. Please login.');
    }
}
