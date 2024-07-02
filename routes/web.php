<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Test;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('test-mail', function () {
    Mail::to('prive@kelvincodes.nl')->send(new Test());
});

