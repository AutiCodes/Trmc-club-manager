<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MembersContact;
use Illuminate\Support\Facades\Mail;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('send-test-mail', function () {
    return Mail::to('prive@kelvincodes.nl')->send(new MembersContact());
});
