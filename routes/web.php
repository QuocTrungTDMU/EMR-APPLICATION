<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\FCMController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;


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

Route::get('/about', function () {
    return view('about-us');
})->name('about');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::middleware(['web'])->group(function () {
    Route::post('/nks-login', [AuthController::class, 'nksLogin'])->name('nksLogin');
});

// Login
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



// routes/web.php

// Dashboard routes (giữ nguyên route hiện tại của bạn)
Route::middleware(['auth'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // ✅ Thêm attendance routes vào cùng group
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/checkin', [AttendanceController::class, 'checkin'])->name('attendance.checkin');
    Route::post('/attendance/checkout', [AttendanceController::class, 'checkout'])->name('attendance.checkout');
    Route::get('/attendance/attendances', [AttendanceController::class, 'attendances'])->name('attendance.attendances');
});


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

// Test route
Route::post('/test-fcm-backend', function (Request $request) {
    $firebaseService = new \App\Services\FirebaseService();

    $result = $firebaseService->sendToDevice(
        'Test từ Backend',
        'Đây là test notification từ Service Account!',
        $request->fcm_token,
        ['type' => 'backend_test']
    );

    return response()->json([
        'success' => $result,
        'message' => $result ? 'Sent successfully!' : 'Failed to send'
    ]);
});




// ✅ Protected FCM routes (Tối ưu nhất)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/store-fcm-token', [FCMController::class, 'storeToken']);
    Route::post('/test-notification', [FCMController::class, 'testNotification']);
    Route::get('/my-fcm-tokens', [FCMController::class, 'getUserTokens']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

// API routes với web middleware
Route::middleware(['web'])->prefix('api')->group(function () {
    // Danh sách thông báo (popup)
    Route::get('/notifications', [NotificationController::class, 'index'])->name('api.notifications.index');

    // Đảm bảo route này có TRƯỚC route với wildcard {id}
    Route::get('/notifications/paginate', [NotificationController::class, 'paginate'])->name('api.notifications.paginate');
    Route::get('/notifications/unread/count', [NotificationController::class, 'unreadCount'])->name('api.notifications.unread-count');
    Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('api.notifications.mark-all-read');
    Route::delete('/notifications/multiple', [NotificationController::class, 'destroyMultiple'])->name('api.notifications.destroy-multiple');
    Route::post('/notifications/test', [NotificationController::class, 'sendTestNotification'])->name('api.notifications.test');

    // Routes với {id} parameter - ĐẶT CUỐI CÙNG
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('api.notifications.show');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('api.notifications.mark-read');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('api.notifications.destroy');
});

require __DIR__ . '/auth.php';
