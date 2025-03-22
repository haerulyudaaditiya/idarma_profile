<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/blog-details', function () {
    return view('pages.blog-details');
})->name('blog.details');

Route::prefix('admin')->group(function(){
    Route::resource('news',NewsController::class);
    Route::resource('contacts',ContactController::class);
    Route::resource('users', UserController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
