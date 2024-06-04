<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');



// Route::controller(UserSettingController::class)->prefix('settings')->name('us.')->group(function () {
//     Route::get('profile', 'profile')->name('profile');
//     Route::post('profile', 'profile_store')->name('profile');
//     Route::get('change-password', 'password')->name('password');
//     Route::post('change-password', 'password_store')->name('password');
// });


// Route::get('/dashboard', function () {
//     return view('layouts.backend_master');
// });

Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function(){
    Route::get('index', 'profile')->name('index');
    Route::post('store', 'update')->name('store');
});


Route::controller(GenderController::class)->prefix('gender')->name('gender.')->group(function(){

    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}','edit')->name('edit');
    Route::post('update/{id}','update')->name('update');
    Route::get('delete/{id}','delete')->name('delete');
});

