<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Test;

Route::get('/welcome', function () {
    return view('welcome');
});
