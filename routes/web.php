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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/dashboard/categories', CategoryController::class);

Route::get('/dashboard/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::post('/dashboard/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/dashboard/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
Route::resource('/dashboard/posts', PostController::class);

Route::resource('/dashboard/tags', TagController::class);

Route::get('/dashboard/media', [MediaController::class, 'index'])->name('media.index');
Route::delete('/dashboard/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
Route::get('/dashboard/media/{media}/download', [MediaController::class, 'download'])->name('media.download');

require __DIR__.'/auth.php';
