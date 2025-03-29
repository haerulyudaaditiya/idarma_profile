<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::post('/news-comments', [NewsCommentController::class, 'store'])->name('news-comments.store');
Route::get('/news/{news}', [HomeController::class, 'news_detail'])->name('user.news.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('users', UserController::class);
    Route::resource('positions', PositionController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('vision-and-misions', VisionAndMisionController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('news-categories', NewsCategoryController::class);
    Route::resource('news-tags', TagController::class)->parameters([
        'news-tags' => 'tag',
    ]);
    Route::post('/news-comments', [NewsCommentController::class, 'store'])->name('news-comments.store');
    Route::delete('/news-comments/{newsComment}', [NewsCommentController::class, 'destroy'])->name('news-comments.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
