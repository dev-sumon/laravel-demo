<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes();

<<<<<<< Updated upstream
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');



// Route::controller(UserSettingController::class)->prefix('settings')->name('us.')->group(function () {
//     Route::get('profile', 'profile')->name('profile');
//     Route::post('profile', 'profile_store')->name('profile');
//     Route::get('change-password', 'password')->name('password');
//     Route::post('change-password', 'password_store')->name('password');
// });

Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function(){
    Route::get('index', 'profile')->name('index');
    Route::post('store', 'store')->name('store');
});
>>>>>>> Stashed changes
