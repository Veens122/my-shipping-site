<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\RequestFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('veenstechsolutions@gmail.com')->send(new RequestFormMail($data));

            return back()->with('success', 'Your request has been submitted successfully.');
        } catch (TransportExceptionInterface $e) {
            // Log error for developer
            Log::error('Mail sending failed: ' . $e->getMessage());

            return back()->with('error', 'Message could not be sent due to network issues. Please check your network and try again, Thank you.');
        }
    }
}
