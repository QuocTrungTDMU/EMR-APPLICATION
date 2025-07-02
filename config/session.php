<?php

use Illuminate\Support\Str;

return [
    'driver' => env('SESSION_DRIVER', 'file'),

    'lifetime' => env('SESSION_LIFETIME', 1440),

    // ✅ QUAN TRỌNG: Đảm bảo expire_on_close = false
    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    'encrypt' => env('SESSION_ENCRYPT', false),

    'files' => storage_path('framework/sessions'),

    'connection' => env('SESSION_CONNECTION'),

    'table' => env('SESSION_TABLE', 'sessions'),

    'store' => env('SESSION_STORE'),

    'lottery' => [2, 100],

    // ✅ FIX: Cookie name - bỏ underscore để tránh conflict
    'cookie' => env('SESSION_COOKIE', 'nkssession'),

    'path' => env('SESSION_PATH', '/'),

    // ✅ FIX: Domain - set null cho localhost
    'domain' => env('SESSION_DOMAIN', null),

    // ✅ FIX: Secure cookie - set false cho HTTP
    'secure' => env('SESSION_SECURE_COOKIE', false),

    'http_only' => env('SESSION_HTTP_ONLY', true),

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),
];
