<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/', function () {
    return view('contacts.index');
});



Route::resource("/contacts", ContactsController::class);

require __DIR__ . '/auth.php';
