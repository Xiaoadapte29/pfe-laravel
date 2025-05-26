<?php

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

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
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

// ClientController 
Route::controller(ClientController::class)->group(function () {
    Route::get('/book', 'book')->name('book');
    Route::get('/register-professional', 'registerProfessional')->name('register.professional');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/steps', 'steps')->name('steps');
    
    Route::get('/services/plumbing', 'plumbing')->name('services.plumbing');
    Route::get('/services/electrical', 'electrical')->name('services.electrical');
    Route::get('/services/painting', 'painting')->name('services.painting');
    Route::get('/services/moving', 'moving')->name('services.moving');
    Route::get('/services/carpentry', 'carpentry')->name('services.carpentry');
    Route::get('/services/gardening', 'gardening')->name('services.gardening');
    Route::get('/services/cleaning', 'cleaning')->name('services.cleaning');
    Route::get('/services/security', 'security')->name('services.security');

    Route::get('/services/{service}', 'viewService')->name('services.view');
});

// Professionals listing
Route::resource('professionals', ProfessionalController::class)->only(['index']);

require __DIR__.'/auth.php';
