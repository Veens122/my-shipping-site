<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Shipment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');



// =====================
// Admin Authentication
// =====================
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/login', [LoginController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Super Admin routes

// Super Admin routes
Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');

    Route::get('/users', [SuperAdminController::class, 'users'])->name('superadmin.users.index');

    Route::patch('/users/{id}/approve', [SuperAdminController::class, 'approveUser'])->name('superadmin.approveUser');
    Route::delete('/users/{id}/reject', [SuperAdminController::class, 'rejectUser'])->name('superadmin.rejectUser');

    Route::patch('/users/{id}/ban', [SuperAdminController::class, 'banUser'])->name('superadmin.banUser');
    Route::patch('/users/{id}/unban', [SuperAdminController::class, 'unbanUser'])->name('superadmin.unbanUser');
    Route::delete('/users/{id}', [SuperAdminController::class, 'deleteUser'])->name('superadmin.deleteUser');
    Route::patch('/users/{id}/active-days', [SuperAdminController::class, 'setActiveDays'])->name('superadmin.setActiveDays');

    // Banned Users
    Route::get('/banned-users', [SuperAdminController::class, 'bannedUsers'])->name('superadmin.banned-users');

    // Pending Users
    Route::get('/pending-users', [SuperAdminController::class, 'pendingUsers'])->name('superadmin.pending-users');
});


// =====================
// Admin Dashboard
// =====================
Route::middleware(['auth', 'admin', 'check.ban'])->prefix('admin')->group(function () {
    // Admin Index Route

    // Admin Dashboard Route
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');

    Route::get('/shipments/create-shipment', [ShipmentController::class, 'createShipment'])->name('admin.shipment.create-shipment');
    Route::post('/shipments', [ShipmentController::class, 'store'])->name('shipment.store');

    Route::get('/shipments/shipment-list', [ShipmentController::class, 'shipmentList'])->name('shipments.shipment-list');
    Route::get('/shipments/{id}/details', [ShipmentController::class, 'shipmentDetails'])->name('shipments.shipment-details');
    Route::get('/shipments/{id}/edit', [ShipmentController::class, 'editShipment'])->name('shipments.edit-shipment');
    Route::put('/shipments/{id}', [ShipmentController::class, 'updateShipmentStatus'])->name('shipments.update');
    Route::get('/shipments/{id}/update', [ShipmentController::class, 'showUpdateForm'])->name('shipments.update.form');
    Route::post('/shipments/{id}/update', [ShipmentController::class, 'storeUpdate'])->name('shipments.update.store');
});


// =====================
// Public Tracking
// =====================
// Form on homepage submits here
Route::post('/track-shipment', [ShipmentController::class, 'trackShipment'])->name('shipments.track-shipment');

// Display results (fixes refresh resubmit issue)
Route::get('/track/{tracking_number}', [ShipmentController::class, 'showResult'])->name('track.result');


// ==============
// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/submit-request', [ContactController::class, 'submit'])->name('submit.request');

// Admin registration
Route::get('/admin/register', [AuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register'])->name('admin.register.store');
