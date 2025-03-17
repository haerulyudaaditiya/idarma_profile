<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::resource('news',NewsController::class);
    Route::resource('contacts',ContactController::class);
});