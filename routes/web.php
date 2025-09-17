<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShipmentController;
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


// =====================
// Admin Authentication
// =====================
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =====================
// Admin Dashboard
// =====================
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
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
