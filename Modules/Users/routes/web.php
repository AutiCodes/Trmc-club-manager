<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;
use Modules\Users\Http\Controllers\AuthenticationController;
use Modules\Users\Http\Controllers\MemberController;

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

Route::group([], function () {
    Route::resource('users', UsersController::class)->names('users');
});

Route::group([], function () {
    Route::post('authenticatie-login-post', [AuthenticationController::class, 'login']);
    Route::get('authenticatie-login', [AuthenticationController::class, 'loginPage']);
});

Route::group([], function () {
    Route::resource('leden', MemberController::class)->names('members');
});