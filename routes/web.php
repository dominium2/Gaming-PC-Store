<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    $image1 = Image::find(1); // Fetch the image with ID 1
    $image2 = Image::find(2); // Fetch the image with ID 2
    return view('welcome', compact('image1', 'image2'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/news', [NewsController::class, 'index'])->name('news');

// Use the fully qualified class name for the admin middleware
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit'); // Edit route
    Route::patch('/news/{news}', [NewsController::class, 'update'])->name('news.update'); // Update route
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy'); // Delete route

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/promote', [AdminController::class, 'promote'])->name('admin.promote');
    Route::post('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::delete('/admin/delete', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('/admin/demote', [AdminController::class, 'demote'])->name('admin.demote');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
