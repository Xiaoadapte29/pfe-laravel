<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/contact', 'contact')->name('contact');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('bookings', BookingController::class);

    Route::post('/bookings/{id}/accept', [BookingController::class, 'accept'])->name('bookings.accept');
    Route::post('/bookings/{id}/refuse', [BookingController::class, 'refuse'])->name('bookings.refuse');
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::post('/bookings/{id}/complete', [BookingController::class, 'complete'])->name('bookings.complete');

    Route::post('/reviews/{booking_id}', [ReviewController::class, 'store'])->name('reviews.store');
});

// Registration 
Route::get('/register/client', fn () => view('auth.register-client'))->name('register.client');
Route::post('/register/client', [RegisteredUserController::class, 'storeClient'])->name('register.client.submit');



// Professionals listing
Route::resource('professionals', ProfessionalController::class)->only(['index']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
require __DIR__.'/auth.php';
