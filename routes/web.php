<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinglePostController;

Route::get('/', HomeController::class)->name('blog.index');
Route::get('/posts', SinglePostController::class)->name('blog.show');
// Route::get('/categories/{category:slug}', [FrontCategoryController::class, 'category'])->name('blog.category');
Route::get('/categories', [FrontCategoryController::class, 'categories'])->name('blog.categories');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin/')
->name('admin.')
->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posts', PostController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
