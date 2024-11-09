<?php

use App\Http\Middleware\AdminMiddleware; // Ensure this is present if you're using custom AdminMiddleware
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', HomeController::class)->name('blog.index');
Route::get('/posts/{post:slug}', SinglePostController::class)->name('blog.show');
Route::get('/categories/{category:slug}', FrontCategoryController::class)->name('blog.categories');

// Comment Routes for Authenticated Users
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

// User Dashboard Routes
Route::middleware(['auth', 'verified'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');  // User dashboard view
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// Admin Dashboard Routes
Route::middleware(['auth', AdminMiddleware::class]) // Apply auth and admin middleware
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard'); // Admin dashboard view
        })->name('dashboard'); // Make sure this route is named correctly

        Route::resource('/categories', CategoryController::class)->except('show');
        Route::resource('/posts', PostController::class)->except('show');

        // Display the list of comments for admin to approve or manage
        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');

        // Approve a comment (for admin)
        Route::get('/comments/{id}/approve', [CommentController::class, 'approveComment'])->name('comments.approve');
    });

require __DIR__.'/auth.php';
