<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\FCMController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PatientAccountController;
use App\Http\Controllers\PatientManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TelemedicineController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Http;

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


    // Lịch làm việc bác sĩ
    Route::get('/availability-checker', [AvailabilityController::class, 'index'])->name('availability.checker');
    Route::get('/doctor-detail/{doctorId}', [AvailabilityController::class, 'book'])->name('book.doctor-detail');

    //Tư vấn trực tuyến & từ xa
    Route::get('/online-consultation-telemedicine', [TelemedicineController::class, 'index'])->name('telemedicine');

    //Câu hỏi thường gặp
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::post('/faq/submit', [FaqController::class, 'submit'])->name('faq.submit');

    //Tạo tài khoản bệnh nhân
    Route::get('/patient-account', [PatientAccountController::class, 'index'])->name('patient-account');
    Route::post('/patient-account/submit', [PatientAccountController::class, 'submit'])->name('patient-account.submit');

    //Đánh giá
    Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');

    // Password update routes
    Route::post('/password/store', [PasswordController::class, 'store'])->name('password.store');
    Route::get('/password/confirm', [PasswordController::class, 'showConfirmation'])->name('password.confirm-view');
    Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
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

    Route::get('/patients', [PatientManagementController::class, 'index'])->name('patients.index');
    Route::get('/patients/{id}/edit', [PatientManagementController::class, 'edit'])->name('patients.edit');
    Route::post('/patients/{id}', [PatientManagementController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientManagementController::class, 'destroy'])->name('patients.destroy');
    Route::get('/patients/export', [PatientManagementController::class, 'exportExcel'])->name('patients.export');


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

Route::post('/api/provinces-proxy', function () {
    try {
        $response = Http::asForm()->post('https://online.nks.vn/api/nks/provinces', [
            'slcBox' => 1
        ]);
        
        return response($response->body(), $response->status())
            ->header('Content-Type', $response->header('Content-Type'));
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
});

require __DIR__ . '/auth.php';
