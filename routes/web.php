<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;  
use App\Http\Controllers\Dashboard\PostController;  
use App\Http\Controllers\Dashboard\TagController; 
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


Route::resource('categories', CategoryController::class);

Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::post('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

Route::resource('posts', PostController::class);
Route::resource('tags', TagController::class);

require __DIR__.'/auth.php';
