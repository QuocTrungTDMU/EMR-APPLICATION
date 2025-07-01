<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SessionKeyProtection
{
    private $protectedKeys = [
        'user_name',
        'user_email',
        'user_id',
        'is_authenticated',
        'nks_user_data',
        'nks_access_token'
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Capture BEFORE state
        $beforeKeys = array_keys($request->session()->all());
        $beforeProtectedData = [];

        foreach ($this->protectedKeys as $key) {
            $beforeProtectedData[$key] = $request->session()->get($key);
        }

        Log::info('🛡️ SESSION KEY PROTECTION - BEFORE', [
            'session_id' => $request->session()->getId(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'before_keys' => $beforeKeys,
            'protected_data' => $beforeProtectedData
        ]);

        $response = $next($request);

        // ✅ Capture AFTER state
        $afterKeys = array_keys($request->session()->all());
        $afterProtectedData = [];

        foreach ($this->protectedKeys as $key) {
            $afterProtectedData[$key] = $request->session()->get($key);
        }

        // ✅ DETECT KEY DELETION
        $deletedKeys = array_diff($beforeKeys, $afterKeys);
        $addedKeys = array_diff($afterKeys, $beforeKeys);
        $lostProtectedKeys = [];

        foreach ($this->protectedKeys as $key) {
            if ($beforeProtectedData[$key] !== null && $afterProtectedData[$key] === null) {
                $lostProtectedKeys[] = $key;
            }
        }

        if (!empty($deletedKeys) || !empty($lostProtectedKeys)) {
            Log::error('🚨 SESSION KEY DELETION DETECTED', [
                'session_id' => $request->session()->getId(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'deleted_keys' => $deletedKeys,
                'added_keys' => $addedKeys,
                'lost_protected_keys' => $lostProtectedKeys,
                'before_protected' => $beforeProtectedData,
                'after_protected' => $afterProtectedData,
                'stack_trace' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10)
            ]);

            // ✅ IMMEDIATE RESTORE
            $this->restoreProtectedKeys($request, $beforeProtectedData, $lostProtectedKeys);
        }

        Log::info('🛡️ SESSION KEY PROTECTION - AFTER', [
            'session_id' => $request->session()->getId(),
            'after_keys' => $afterKeys,
            'keys_deleted' => $deletedKeys,
            'keys_added' => $addedKeys,
            'protected_keys_lost' => $lostProtectedKeys
        ]);

        return $response;
    }

    private function restoreProtectedKeys(Request $request, array $beforeData, array $lostKeys): void
    {
        $restored = [];

        foreach ($lostKeys as $key) {
            if (isset($beforeData[$key]) && $beforeData[$key] !== null) {
                $request->session()->put($key, $beforeData[$key]);
                $restored[] = $key . ' = ' . (is_string($beforeData[$key]) ? $beforeData[$key] : 'object/array');
            }
        }

        if (!empty($restored)) {
            $request->session()->save();

            Log::info('🔧 SESSION KEYS RESTORED', [
                'session_id' => $request->session()->getId(),
                'restored_keys' => $restored
            ]);
        }
    }
}
