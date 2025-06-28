<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ProfessionalDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
//   Route::get('/professionals/dashboard', [ProfessionalDashboardController::class, 'index'])
//         ->name('professionals.dashboard');
Route::get('/dashboard/professional', [ProfessionalDashboardController::class, 'index'])->name('professionals.dashboard');


  Route::resource('bookings', BookingController::class);
Route::post('/bookings/{booking}/{action}', [BookingController::class, 'acceptRefuse'])
    ->name('bookings.acceptRefuse');

Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
Route::post('/bookings/{booking}/complete', [BookingController::class, 'complete'])->name('bookings.complete');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');


    Route::post('/reviews/{booking_id}', [ReviewController::class, 'store'])->name('reviews.store');
});

// Registration 
Route::get('/register/client', fn () => view('auth.register-client'))->name('register.client');
Route::post('/register/client', [RegisteredUserController::class, 'storeClient'])->name('register.client.submit');

Route::redirect('/admin', '/admin/dashboard')->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('professionals/{id}/verify', [DashboardController::class, 'verifyProfessional'])->name('professionals.verify');

    Route::delete('professionals/{id}/reject', [DashboardController::class, 'rejectProfessional'])->name('professionals.reject');
      Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    
});

// Professionals listing
Route::resource('professionals', ProfessionalController::class);
Route::put('/professional/profile', [ProfessionalController::class, 'updateProfile'])->name('professionals.updateProfile');


Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
require __DIR__.'/auth.php';
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.submit');
