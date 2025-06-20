<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Mail;

require __DIR__ . '/auth.php';

// Trang chính
Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/homepage', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('homepage');

// Trang tĩnh
Route::view('/about', 'about-us')->name('about');
Route::view('/cart', 'cart')->name('cart');
Route::view('/checkout', 'checkout')->name('checkout');

// Trang liên hệ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['web'])->group(function () {
    Route::post('/nks-login', [AuthController::class, 'nksLogin'])->name('nksLogin');
});

// Login
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Admin
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

// Blog
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('/category/{category}', [App\Http\Controllers\BlogController::class, 'category'])->name('category');
    Route::get('/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
});
Route::redirect('/blog', '/blogs');

// Test email
Route::get('/test-email', function () {
    try {
        Mail::raw('Test email from Laravel', function ($message) {
            $message->to('enjoy4624@gmail.com')->subject('Test Email');
        });
        return 'Email sent successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::middleware('auth')->group(function () {
    // Xem thông tin
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');

    // Form chỉnh sửa
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Xử lý cập nhật
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Xoá tài khoản
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cập nhật mật khẩu
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Form chỉnh sửa mật khẩu
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');

   // Route::post('/avatar/update', [ProfileController::class, 'updateAvatar'])->name('avatar.update');

   Route::post('/profile/upload-cccd', [ProfileController::class, 'uploadCccd'])->name('profile.uploadCccd');
});