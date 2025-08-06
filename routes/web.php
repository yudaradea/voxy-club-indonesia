<?php

use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/event', 'event')->name('event');
    Route::get('/event/story/{story:slug}', 'eventShow')->name('event.show');
    Route::get('/event/schedule/{event:slug}', 'eventScheduleShow')->name('event.schedule.show');
    Route::get('/merchandise', 'merchandise')->name('merchandise');
    Route::get('/merchandise/{product:slug}', 'merchandiseShow')->name('merchandise.show');
    Route::get('/profile/setting/{id}', 'profileSetting')->middleware('auth')->name('profile.setting');
    // auth
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/forgot-password', 'forgotPassword')->name('password.request');
        Route::get('/password-baru/{token}', 'resetPassword')->name('auth.password.reset');
    });
});

// livewire
Route::get('/profile', Profile::class)->middleware('auth')->name('profile');

Route::get('/error/{code}', [ErrorController::class, '__invoke'])->name('error');
