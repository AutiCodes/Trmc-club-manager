<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;
use Modules\Users\Http\Controllers\AuthenticationController;
use Modules\Users\Http\Controllers\PasswordResetController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UsersController::class)->names('users');
    Route::get('bestuursleden/verwijder/{id}', [UsersController::class, 'destroy']);
    Route::get('authenticatie-uitloggen', [AuthenticationController::class, 'logout']);
});

Route::group([], function () {
    // Signin
    Route::post('authenticatie-login-post', [AuthenticationController::class, 'login']);
    Route::get('authenticatie-login', [AuthenticationController::class, 'loginPage'])->name('login');

    // Password reset
    Route::get('password-reset', [PasswordResetController::class, 'showPasswordReset']);
    Route::post('password-reset-post', [PasswordResetController::class, 'HandlePasswordReset']);

});