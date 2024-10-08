<?php

use Illuminate\Support\Facades\Route;
use Modules\Form\Http\Controllers\FormController;
use Modules\Form\Http\Controllers\FlightReportController;

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
    Route::resource('aanmeld-formulier', FormController::class)->names('form');
    Route::get('lid-vlucht-aanmeldingen-aantal/{id}', [FormController::class, 'checkClubFlights']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('vluchten-rapporten', FlightReportController::class)->names('flight-reports');
});