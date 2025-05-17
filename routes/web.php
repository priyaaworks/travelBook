<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 📌 Home page route
Route::get('/', [UserController::class, 'showForm'])->name('home');

// 📌 Auth routes
Auth::routes();

// 📌 Package listing
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

// 📌 Booking routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/book/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');
});

// 📌 Booking success page
Route::get('/booking-success', function () {
    return view('bookings.success');
})->name('bookings.success');

// 📌 Admin routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// 📌 User Data routes (POST-based only)
// Show form (GET request)
Route::get('/user-form', [UserController::class, 'showForm'])->name('user.form');

// Save form data via POST
Route::post('/save-user-data', [UserController::class, 'saveData'])->name('save.user.data');

// User list page
Route::get('/user-list', [UserController::class, 'showUsers'])->name('user.list');
