<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\UserManageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest', 'as' => 'page-'], function () {
    Route::match(['get'],'/', [AuthController::class, 'login'])->name('login');
    Route::match(['get'],'/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-post', [AuthController::class, 'login'])->name('login-post');
    Route::match(['get', 'post'],'/sign-up', [AuthController::class, 'signup'])->name('signup');
    Route::get('/sign-up/success', [AuthController::class, 'success'])->name('signup-success');
});

Route::group(['middleware' => 'auth', 'as' => 'page-'], function () {
    Route::match(['post'],'/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['as' => 'setting-', 'prefix' => 'setting'], function () {
        Route::match(['get', 'post'],'/edit-profile', [UserManageController::class, 'editProfile'])->name('edit-profile');
        Route::match(['get', 'post'],'/edit-login-details', [UserManageController::class, 'editLoginDetails'])->name('edit-login-details');
    });

});
