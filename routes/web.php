<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('homepage');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/blog-detail', function () {
    return view('blog-detail');
})->name('blog-detail');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/homepage', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

require __DIR__ . '/auth.php';
