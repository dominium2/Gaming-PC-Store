<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $image1 = Image::find(1); // Fetch the image with ID 1
    $image2 = Image::find(2); // Fetch the image with ID 2
    return view('welcome', compact('image1', 'image2'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

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

    Route::get('/faq/manage', [FaqController::class, 'manage'])->name('faq.manage');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');

    Route::get('/news/manage', [NewsController::class, 'manage'])->name('news.manage');
    Route::get('/admin/mail', [ContactController::class, 'adminMail'])->name('admin.mail');
    Route::delete('/admin/mail/{message}', [ContactController::class, 'destroy'])->name('admin.mail.delete');

    Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
