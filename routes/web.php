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

// Route
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('/category/{category}', [App\Http\Controllers\BlogController::class, 'category'])->name('category');
    Route::get('/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
});

Route::redirect('/blog', '/blogs');



// routes/web.php - debug controller execution  
Route::get('/debug-controller-execution/{slug}', function ($slug) {
    try {
        Log::info('=== DEBUGGING CONTROLLER EXECUTION ===', ['slug' => $slug]);

        // Test service first
        $service = app(App\Services\NksApiService::class);
        Log::info('Service created successfully');

        // Test insight API
        $insightResult = $service->getInsight($slug);
        Log::info('Insight API called', [
            'result' => !is_null($insightResult),
            'success' => $insightResult['success'] ?? false
        ]);

        // Test controller manually
        $controller = app(App\Http\Controllers\BlogController::class);
        Log::info('Controller created successfully');

        // Call show method
        $result = $controller->show($slug);
        Log::info('Controller show method executed successfully');

        return response()->json([
            'success' => true,
            'service_works' => !is_null($insightResult),
            'controller_works' => true,
            'result_type' => get_class($result)
        ]);
    } catch (\Exception $e) {
        Log::error('Controller execution failed', [
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'error_class' => get_class($e),
            'file' => basename($e->getFile()),
            'line' => $e->getLine(),
            'trace' => array_slice(explode("\n", $e->getTraceAsString()), 0, 5)
        ]);
    }
});



require __DIR__ . '/auth.php';
