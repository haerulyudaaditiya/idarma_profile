<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\VisionAndMisionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::post('/news-comments', [NewsCommentController::class, 'store'])->name('news-comments.store');
Route::get('/news/{news}', [HomeController::class, 'news_detail'])->name('user.news.show');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
    Route::middleware('role:user')->group(function () {
        Route::get('/beranda', [HomeController::class, 'userHome'])->name('beranda');
    });
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('users', UserController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('vision-and-misions', VisionAndMisionController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('news-categories', NewsCategoryController::class);
    Route::resource('news-tags', TagController::class)->parameters([
        'news-tags' => 'tag',
    ]);
    Route::delete('/news-comments/{newsComment}', [NewsCommentController::class, 'destroy'])->name('news-comments.destroy');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__ . '/auth.php';
