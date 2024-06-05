<?php

<<<<<<< Updated upstream
=======

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProfessionController;
use Illuminate\Support\Facades\Auth;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::post('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');



// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
//     return view('layouts.backend_master');
<<<<<<< Updated upstream
// });
=======
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

Route::controller(ProfessionController::class)->prefix('profession')->name('profession.')->group(function(){

    Route::get('index','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
});
>>>>>>> Stashed changes
