<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;  
use App\Http\Controllers\Dashboard\PostController;  
use App\Http\Controllers\Dashboard\TagController; 
use App\Http\Controllers\Dashboard\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/home', function () {
    return view('dashboard.master');
})->middleware(['auth', 'verified'])->name('dashboard.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Category Routes
Route::resource('categories', CategoryController::class);

// Post Routes
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete', action: [PostController::class, 'forceDelete'])->name('posts.forceDelete');
Route::resource('posts', PostController::class);

// Tag Routes
Route::resource('tags', TagController::class);

// Media Manager Routes
Route::get('media', [MediaController::class, 'index'])->name('media.index');
Route::delete('media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
Route::get('media/{media}/download', [MediaController::class, 'download'])->name('media.download');

require __DIR__.'/auth.php';
