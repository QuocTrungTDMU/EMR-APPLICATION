<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SessionBackup
{
    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->session()->getId();

        // ✅ Create backup of authenticated session
        if ($request->session()->get('is_authenticated') === true) {
            $backupData = [
                'user_name' => $request->session()->get('user_name'),
                'user_email' => $request->session()->get('user_email'),
                'user_id' => $request->session()->get('user_id'),
                'nks_user_data' => $request->session()->get('nks_user_data'),
                'is_authenticated' => true,
                'backup_time' => now()->timestamp
            ];

            // Store backup in cache for 1 hour
            Cache::put('session_backup_' . $sessionId, $backupData, 3600);

            Log::debug('💾 SESSION BACKUP CREATED', [
                'session_id' => $sessionId,
                'backup_keys' => array_keys($backupData)
            ]);
        }

        $response = $next($request);

        // ✅ Check if restore is needed
        $this->checkAndRestore($request);

        return $response;
    }

    private function checkAndRestore(Request $request): void
    {
        $sessionId = $request->session()->getId();

        // If authenticated but missing user_name
        if (
            $request->session()->get('is_authenticated') === true &&
            !$request->session()->get('user_name')
        ) {

            $backupData = Cache::get('session_backup_' . $sessionId);

            if ($backupData && isset($backupData['user_name'])) {
                Log::warning('🔄 RESTORING SESSION FROM BACKUP', [
                    'session_id' => $sessionId,
                    'backup_user_name' => $backupData['user_name']
                ]);

                // Restore missing data
                foreach ($backupData as $key => $value) {
                    if ($key !== 'backup_time' && !$request->session()->has($key)) {
                        $request->session()->put($key, $value);
                    }
                }

                $request->session()->save();

                Log::info('✅ SESSION RESTORED FROM BACKUP', [
                    'session_id' => $sessionId,
                    'restored_user_name' => $backupData['user_name']
                ]);
            }
        }
    }
}
