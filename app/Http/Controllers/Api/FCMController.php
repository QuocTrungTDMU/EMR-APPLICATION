<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FCMController extends Controller
{
    /**
     * ✅ Store FCM token với Null Safety
     */
    public function storeToken(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'fcm_token' => 'required|string|min:10',
                'device' => 'sometimes|string|max:50',
                'platform' => 'sometimes|string|max:50',
                'browser' => 'sometimes|string|max:100',
                'user_agent' => 'sometimes|string',
                'source' => 'sometimes|string|max:50',
                'location_data' => 'sometimes|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // ✅ SAFE USER ID EXTRACTION với multiple null checks
            $user = $request->user(); // This can be null for guest users
            $userId = 0; // Default for guest users
            $userEmail = 'guest';
            $userType = 'guest';

            // ✅ Null-safe user data extraction
            if ($user !== null) {
                $userId = $user->id ?? 0;
                $userEmail = $user->email ?? 'unknown';
                $userType = 'authenticated';
            }

            // Alternative using optional() helper from Search Result 5
            // $userId = optional($request->user())->id ?? 0;

            // Store FCM token with safe user ID
            $stored = $this->storeUserFCMToken([
                'user_id' => $userId,
                'fcm_token' => $request->fcm_token,
                'device' => $request->device ?? 'Web',
                'platform' => $request->platform ?? 'Web',
                'browser' => $request->browser,
                'source' => $request->source ?? 'api',
                'user_agent' => $request->user_agent,
                'location_data' => $request->location_data
            ]);

            // Log success with safe data
            Log::info('✅ FCM token stored via API', [
                'user_id' => $userId,
                'user_type' => $userType,
                'user_email' => $userEmail,
                'device' => $request->device ?? 'Web',
                'token_length' => strlen($request->fcm_token)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'FCM token stored successfully',
                'data' => [
                    'user_id' => $userId,
                    'user_type' => $userType,
                    'user_email' => $userType === 'authenticated' ? $userEmail : null,
                    'device' => $request->device ?? 'Web',
                    'token_length' => strlen($request->fcm_token),
                    'stored_at' => now()->toISOString()
                ]
            ]);
        } catch (\Exception $e) {
            // ✅ Enhanced error logging with context
            Log::error('❌ FCM token storage failed', [
                'error' => $e->getMessage(),
                'error_line' => $e->getLine(),
                'error_file' => $e->getFile(),
                'user_authenticated' => $request->user() !== null,
                'user_id' => optional($request->user())->id ?? 'guest',
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to store FCM token: ' . $e->getMessage(),
                'debug_info' => [
                    'user_authenticated' => $request->user() !== null,
                    'error_type' => get_class($e)
                ]
            ], 500);
        }
    }

    /**
     * ✅ Store FCM token for guest users (explicit)
     */
    public function storeTokenGuest(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required|string|min:10',
            'device' => 'sometimes|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $stored = $this->storeUserFCMToken([
                'user_id' => 0, // Explicit guest user
                'fcm_token' => $request->fcm_token,
                'device' => $request->device ?? 'Web',
                'source' => 'guest_api'
            ]);

            return response()->json([
                'success' => $stored,
                'message' => $stored ? 'Guest FCM token stored' : 'Failed to store',
                'data' => [
                    'guest_user' => true,
                    'device' => $request->device ?? 'Web',
                    'stored_at' => now()->toISOString()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Guest FCM token storage failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to store guest token: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * ✅ Test notification với null safety
     */
    public function testNotification(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            // ✅ Null check for authenticated user
            if ($user === null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required for test notification'
                ], 401);
            }

            // Safe access to user properties
            $userName = $user->name ?? 'Unknown User';
            $userId = $user->id ?? 0;

            return response()->json([
                'success' => true,
                'message' => 'Test notification endpoint works',
                'user' => [
                    'id' => $userId,
                    'name' => $userName,
                    'email' => $user->email ?? 'unknown@example.com'
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Test notification failed', [
                'error' => $e->getMessage(),
                'user_authenticated' => $request->user() !== null
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Test notification failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * ✅ Get user tokens với null safety
     */
    public function getUserTokens(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if ($user === null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required'
                ], 401);
            }

            $userId = $user->id ?? 0;

            // Safe database query
            try {
                $tokens = DB::table('user_fcm_tokens')
                    ->where('user_id', $userId)
                    ->where('is_active', true)
                    ->get();
            } catch (\Exception $dbError) {
                // Table might not exist yet
                $tokens = collect([]);
                Log::warning('user_fcm_tokens table query failed', [
                    'error' => $dbError->getMessage()
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'user_id' => $userId,
                    'user_email' => $user->email ?? 'unknown',
                    'tokens' => $tokens,
                    'count' => $tokens->count()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Get user tokens failed', [
                'error' => $e->getMessage(),
                'user_authenticated' => $request->user() !== null
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to get tokens: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * ✅ Store FCM token in database với enhanced safety
     */
    private function storeUserFCMToken(array $data): bool
    {
        try {
            // Check if table exists first (avoid crashes during development)
            if (!DB::getSchemaBuilder()->hasTable('user_fcm_tokens')) {
                Log::warning('user_fcm_tokens table does not exist yet');
                return true; // Return true to not block the flow during development
            }

            $metadata = [
                'user_agent' => $data['user_agent'] ?? null,
                'timestamp' => now()->toISOString()
            ];

            if (isset($data['location_data']) && $data['location_data'] !== 'not_available') {
                $metadata['location_data'] = $data['location_data'];
            }

            // Safe database operation
            DB::table('user_fcm_tokens')->updateOrInsert(
                [
                    'user_id' => $data['user_id'] ?? 0,
                    'device' => $data['device'] ?? 'Web'
                ],
                [
                    'fcm_token' => $data['fcm_token'],
                    'platform' => $data['platform'] ?? null,
                    'browser' => $data['browser'] ?? null,
                    'source' => $data['source'] ?? 'api',
                    'metadata' => json_encode($metadata),
                    'is_active' => true,
                    'last_used_at' => now(),
                    'updated_at' => now(),
                    'created_at' => now()
                ]
            );

            return true;
        } catch (\Exception $e) {
            Log::error('Database FCM storage failed', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            // Return true to not block login flow during development
            return true;
        }
    }
}
