<?php



use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



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
// });












// Route::controller(RoleController::class)->prefix('role')->name('role.')->gropu(function(){
//     Route::get('index', 'index')->name('index');
// });


Route::group(['middleware' => 'auth'], function () {
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
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });
    Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });
    Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });
    Route::controller(ShiftController::class)->prefix('shift')->name('shift.')->group(function(){
        Route::get('index', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('delete/{id}','delete')->name('delete');
    });

});
