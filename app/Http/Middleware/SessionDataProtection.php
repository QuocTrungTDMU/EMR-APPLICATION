<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SessionDataProtection
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Capture BEFORE state
        $beforeAuth = $request->session()->get('is_authenticated');
        $beforeName = $request->session()->get('user_name');
        $beforeKeys = array_keys($request->session()->all());

        Log::info('🛡️ SESSION PROTECTION - BEFORE', [
            'session_id' => $request->session()->getId(),
            'url' => $request->fullUrl(),
            'before_auth' => $beforeAuth,
            'before_name' => $beforeName,
            'before_keys_count' => count($beforeKeys)
        ]);

        $response = $next($request);

        // ✅ Capture AFTER state
        $afterAuth = $request->session()->get('is_authenticated');
        $afterName = $request->session()->get('user_name');
        $afterKeys = array_keys($request->session()->all());

        // ✅ DETECT DATA LOSS
        if ($beforeAuth === true && $afterAuth === true) {
            if ($beforeName && !$afterName) {
                Log::error('🚨 SESSION DATA CORRUPTION DETECTED', [
                    'session_id' => $request->session()->getId(),
                    'url' => $request->fullUrl(),
                    'before_name' => $beforeName,
                    'after_name' => $afterName,
                    'keys_lost' => array_diff($beforeKeys, $afterKeys),
                    'keys_added' => array_diff($afterKeys, $beforeKeys)
                ]);

                // ✅ AUTO-REPAIR if possible
                if ($request->session()->get('nks_user_data.name')) {
                    $repairName = $request->session()->get('nks_user_data.name');
                    $request->session()->put('user_name', $repairName);
                    $request->session()->save();

                    Log::info('🔧 SESSION AUTO-REPAIRED', [
                        'session_id' => $request->session()->getId(),
                        'repaired_name' => $repairName
                    ]);
                }
            }
        }

        Log::info('🛡️ SESSION PROTECTION - AFTER', [
            'session_id' => $request->session()->getId(),
            'after_auth' => $afterAuth,
            'after_name' => $afterName,
            'after_keys_count' => count($afterKeys)
        ]);

        return $response;
    }
}
