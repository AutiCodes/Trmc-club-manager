<?php

use Illuminate\Support\Facades\Route;
use Modules\Fail2Ban\Http\Controllers\Fail2BanController;

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
    Route::resource('fail2ban', Fail2BanController::class)->names('fail2ban');
    Route::get('fail2ban/delete/{ip}', [Fail2BanController::class, 'destroy']);
});
