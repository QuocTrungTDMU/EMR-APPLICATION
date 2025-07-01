<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\FCMController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes - FIXED SESSION PERSISTENCE
|--------------------------------------------------------------------------
*/

// ✅ ENHANCED DEBUG ROUTES cho Session Logging
if (!app()->isProduction()) {
    // View logs in real-time
    Route::get('/logs/user-activity', function () {
        $logFile = storage_path('logs/laravel.log');

        if (!file_exists($logFile)) {
            return response()->json(['error' => 'Log file not found']);
        }

        // Get last 50 lines of log
        $lines = file($logFile);
        $lastLines = array_slice($lines, -50);

        // Filter for user activity logs
        $userActivityLogs = array_filter($lastLines, function ($line) {
            return strpos($line, 'USER ACTIVITY') !== false ||
                strpos($line, 'HOMEPAGE ACCESSED') !== false ||
                strpos($line, 'REFRESH DETECTED') !== false;
        });

        return response()->json([
            'total_lines' => count($lines),
            'filtered_lines' => count($userActivityLogs),
            'logs' => array_values($userActivityLogs)
        ]);
    });

    // Clear logs
    Route::get('/logs/clear', function () {
        $logFile = storage_path('logs/laravel.log');
        file_put_contents($logFile, '');
        return response()->json(['message' => 'Logs cleared']);
    });

    // Test session with logging
    Route::get('/test-session-with-logs', function (Request $request) {
        Log::info('🧪 SESSION TEST ACCESSED', [
            'session_id' => $request->session()->getId(),
            'all_session_data' => $request->session()->all(),
            'is_authenticated' => $request->session()->get('is_authenticated'),
            'session_file_path' => storage_path('framework/sessions/' . $request->session()->getId()),
            'session_file_exists' => file_exists(storage_path('framework/sessions/' . $request->session()->getId())),
            'test_timestamp' => now()->toISOString()
        ]);

        return response()->json([
            'message' => 'Session test logged',
            'session_id' => $request->session()->getId(),
            'is_authenticated' => $request->session()->get('is_authenticated'),
            'user_name' => $request->session()->get('user_name'),
            'check_logs' => 'Access /logs/user-activity to see logs'
        ]);
    });
}



// ✅ REAL-TIME SESSION MONITORING
Route::get('/monitor-session', function (Request $request) {
    $sessionId = $request->session()->getId();
    $sessionFile = storage_path('framework/sessions/' . $sessionId);

    return response()->json([
        'session_id' => $sessionId,
        'current_data' => $request->session()->all(),
        'user_name' => $request->session()->get('user_name'),
        'user_name_type' => gettype($request->session()->get('user_name')),
        'is_authenticated' => $request->session()->get('is_authenticated'),
        'nks_user_data_name' => $request->session()->get('nks_user_data.name'),
        'session_file_size' => file_exists($sessionFile) ? filesize($sessionFile) : 0,
        'session_file_modified' => file_exists($sessionFile) ? date('Y-m-d H:i:s', filemtime($sessionFile)) : null,
        'timestamp' => now()->toISOString()
    ]);
});

// ✅ FORCE REPAIR SESSION
Route::get('/repair-session', function (Request $request) {
    if ($request->session()->get('is_authenticated') && !$request->session()->get('user_name')) {
        $nksUserData = $request->session()->get('nks_user_data', []);
        if (isset($nksUserData['name'])) {
            $request->session()->put('user_name', $nksUserData['name']);
            $request->session()->save();

            Log::info('🔧 MANUAL SESSION REPAIR', [
                'session_id' => $request->session()->getId(),
                'repaired_name' => $nksUserData['name']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Session repaired',
                'user_name' => $nksUserData['name']
            ]);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'No repair needed or data not available'
    ]);
});


// ✅ TRACE SESSION MODIFICATION
Route::get('/trace-session-changes', function (Request $request) {
    // Enable detailed session tracking
    $sessionFile = storage_path('framework/sessions/' . $request->session()->getId());

    if (file_exists($sessionFile)) {
        $content = file_get_contents($sessionFile);
        $sessionData = unserialize($content);

        return response()->json([
            'session_id' => $request->session()->getId(),
            'file_size' => filesize($sessionFile),
            'file_modified' => date('Y-m-d H:i:s', filemtime($sessionFile)),
            'raw_content_sample' => substr($content, 0, 500),
            'unserialized_data' => $sessionData,
            'has_user_name' => isset($sessionData['user_name']),
            'user_name_value' => $sessionData['user_name'] ?? 'NOT_SET'
        ], 200, [], JSON_PRETTY_PRINT);
    }

    return response()->json(['error' => 'Session file not found']);
});


// ✅ REAL-TIME SESSION FILE MONITOR
Route::get('/monitor-session-file', function (Request $request) {
    $sessionId = $request->session()->getId();
    $sessionFile = storage_path('framework/sessions/' . $sessionId);

    return view('debug.session-file-monitor', [
        'sessionId' => $sessionId,
        'sessionFile' => $sessionFile
    ]);
});

Route::get('/test-new-home', function () {
    return view('test-new-home');
})->name('home-test');

Route::get('/our-doctor', function () {
    return view('our-doctor');
})->name('our-doctor');

Route::get('/doctor-detail', function () {
    return view('doctor-detail');
})->name('doctor-detail');


Route::get('/hospitals-search', function () {
    return view('hospitals-search');
})->name('hospitals-search');


Route::get('/hospital-details', function () {
    return view('hospital-details');
})->name('hospital-details');


Route::get('/top-specialization', function () {
    return view('top-specialization');
})->name('top-specialization');


Route::get('/top-specialization-details', function () {
    return view('top-specialization-details');
})->name('top-specialization-details');


// ✅ HOMEPAGE ROUTE - CHỈ MỘT ROUTE DUY NHẤT
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// ✅ AUTH ROUTES - PROPER SESSION HANDLING
Route::middleware(['web'])->group(function () {
    // Login page - với proper session check
    Route::get('/login', function () {
        // Kiểm tra session đúng cách
        if (session('is_authenticated') === true) {
            return redirect('/')->with('info', 'Bạn đã đăng nhập rồi');
        }
        return view('auth.login');
    })->name('login');

    // NKS Login endpoint
    Route::post('/nks-login', [AuthController::class, 'nksLogin'])->name('nksLogin');

    // Logout endpoint
    Route::post('/logout', [AuthController::class, 'webLogout'])->name('logout');
});

// ✅ PUBLIC ROUTES
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

// ✅ BLOG ROUTES
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('/category/{category}', [App\Http\Controllers\BlogController::class, 'category'])->name('category');
    Route::get('/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
});

Route::redirect('/blog', '/blogs');

// ✅ PROTECTED ROUTES - FIXED SESSION MIDDLEWARE
Route::middleware(['web'])->group(function () {
    // Profile routes với proper session check
    Route::get('/profile', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập trang này.');
        }
        return app(ProfileController::class)->edit($request);
    })->name('profile.edit');

    Route::patch('/profile', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')->with('error', 'Session đã hết hạn.');
        }
        return app(ProfileController::class)->update($request);
    })->name('profile.update');

    Route::delete('/profile', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')->with('error', 'Session đã hết hạn.');
        }
        return app(ProfileController::class)->destroy($request);
    })->name('profile.destroy');
});

// ✅ ADMIN DASHBOARD - FIXED SESSION CHECK
Route::middleware(['web'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập dashboard.');
        }
        return app(AdminController::class)->index($request);
    })->name('dashboard');

    // Attendance routes với session check cải thiện
    Route::get('/attendance', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return redirect()->route('login')->with('error', 'Session đã hết hạn.');
        }
        return app(AttendanceController::class)->index($request);
    })->name('attendance.index');

    Route::post('/attendance/checkin', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(AttendanceController::class)->checkin($request);
    })->name('attendance.checkin');

    Route::post('/attendance/checkout', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(AttendanceController::class)->checkout($request);
    })->name('attendance.checkout');

    Route::get('/attendance/attendances', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(AttendanceController::class)->attendances($request);
    })->name('attendance.attendances');
});

// ✅ API ROUTES - ENHANCED SESSION CHECK
Route::middleware(['web'])->prefix('api')->group(function () {
    // Auth API routes với enhanced session check
    Route::post('/logout', function (Request $request) {
        return app(AuthController::class)->logout($request);
    });

    Route::get('/me', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session không hợp lệ hoặc đã hết hạn'
            ], 401);
        }
        return app(AuthController::class)->me($request);
    });

    Route::get('/check-session', function (Request $request) {
        return app(AuthController::class)->checkSession($request);
    });

    // FCM routes với enhanced session check
    Route::post('/store-fcm-token', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Cần đăng nhập để lưu FCM token'
            ], 401);
        }
        return app(FCMController::class)->storeToken($request);
    });

    Route::post('/test-notification', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Cần đăng nhập để test notification'
            ], 401);
        }
        return app(FCMController::class)->testNotification($request);
    });

    Route::get('/my-fcm-tokens', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Cần đăng nhập để xem FCM tokens'
            ], 401);
        }
        return app(FCMController::class)->getUserTokens($request);
    });

    // Notification routes với enhanced session check
    Route::get('/notifications', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Cần đăng nhập để xem notifications'
            ], 401);
        }
        return app(NotificationController::class)->index($request);
    })->name('api.notifications.index');

    Route::get('/notifications/paginate', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->paginate($request);
    })->name('api.notifications.paginate');

    Route::get('/notifications/unread/count', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->unreadCount($request);
    })->name('api.notifications.unread-count');

    Route::post('/notifications/mark-all-read', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->markAllAsRead($request);
    })->name('api.notifications.mark-all-read');

    Route::delete('/notifications/multiple', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->destroyMultiple($request);
    })->name('api.notifications.destroy-multiple');

    Route::post('/notifications/test', function (Request $request) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->sendTestNotification($request);
    })->name('api.notifications.test');

    // Routes với {id} parameter - ĐẶT CUỐI CÙNG
    Route::get('/notifications/{id}', function (Request $request, $id) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->show($request, $id);
    })->name('api.notifications.show');

    Route::post('/notifications/{id}/read', function (Request $request, $id) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->markAsRead($request, $id);
    })->name('api.notifications.mark-read');

    Route::delete('/notifications/{id}', function (Request $request, $id) {
        if (!$request->session()->get('is_authenticated')) {
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Session đã hết hạn'
            ], 401);
        }
        return app(NotificationController::class)->destroy($request, $id);
    })->name('api.notifications.destroy');
});

// ✅ PUBLIC API ROUTES (không cần auth)
Route::middleware(['web'])->prefix('api/public')->group(function () {
    // Test routes
    Route::post('/test-fcm-backend', function (Request $request) {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    });
});

// ✅ ENHANCED DEBUG/TEST ROUTES
if (!app()->isProduction()) {
    Route::get('/test-email', function () {
        try {
            Mail::raw('Test email from Laravel', function ($message) {
                $message->to('enjoy4624@gmail.com')
                    ->subject('Test Email - ' . now());
            });

            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!',
                'timestamp' => now()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    });

    // ✅ ENHANCED session debug
    Route::get('/test-session', function (Request $request) {
        $sessionId = $request->session()->getId();
        $sessionFile = storage_path('framework/sessions/' . $sessionId);

        return response()->json([
            'session_id' => $sessionId,
            'is_authenticated' => $request->session()->get('is_authenticated'),
            'user_name' => $request->session()->get('user_name'),
            'user_email' => $request->session()->get('user_email'),
            'login_timestamp' => $request->session()->get('login_timestamp'),
            'session_persistent' => $request->session()->get('session_persistent'),
            'all_session' => $request->session()->all(),
            'current_url' => $request->url(),
            'intended_url' => session('url.intended'),
            'session_file_exists' => file_exists($sessionFile),
            'session_config' => [
                'driver' => config('session.driver'),
                'lifetime' => config('session.lifetime'),
                'expire_on_close' => config('session.expire_on_close'),
                'cookie' => config('session.cookie'),
                'domain' => config('session.domain'),
                'secure' => config('session.secure'),
            ],
            'cookies' => $request->cookies->all(),
            'timestamp' => now()->toISOString()
        ]);
    });

    Route::get('/clear-session', function (Request $request) {
        $oldSessionId = $request->session()->getId();
        $request->session()->flush();
        $request->session()->regenerate(true);

        return response()->json([
            'success' => true,
            'message' => 'Session cleared!',
            'old_session_id' => $oldSessionId,
            'new_session_id' => $request->session()->getId(),
            'timestamp' => now()
        ]);
    });

    // ✅ Session persistence test
    Route::get('/test-session-persistence', function (Request $request) {
        $testKey = 'test_persistence_' . now()->timestamp;
        $testValue = 'Test value: ' . now();

        $request->session()->put($testKey, $testValue);
        $request->session()->save();

        return response()->json([
            'test_key' => $testKey,
            'test_value' => $testValue,
            'retrieved_value' => $request->session()->get($testKey),
            'session_id' => $request->session()->getId(),
            'message' => 'Refresh page and check /test-session to verify persistence'
        ]);
    });

    // ✅ Force login for testing
    Route::get('/force-login-test', function (Request $request) {
        $request->session()->put([
            'user_id' => 'test_user_' . now()->timestamp,
            'user_name' => 'Test User',
            'user_email' => 'test@example.com',
            'is_authenticated' => true,
            'login_timestamp' => now()->timestamp,
            'session_persistent' => true
        ]);
        $request->session()->save();

        return redirect('/')->with('login_success', 'Force logged in for testing');
    });
}

// ✅ Include auth.php - kept for Laravel's built-in features if needed
require __DIR__ . '/auth.php';
