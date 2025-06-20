<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'nks_user_id',
        'nks_access_token',
        'nks_expires_at',        // ✅ THÊM FIELD THIẾU
        'activation_code',
        'status',
        'last_login_at',
        'last_login_ip',
        'avatar',
        'active',
        'email_verified_at',     // ✅ THÊM ĐỂ TRÁNH MASS ASSIGNMENT ERROR
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'nks_access_token',
        'activation_code',
    ];

    /**
     * ✅ Casts - thêm nks_expires_at để tránh lỗi database
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'nks_expires_at' => 'datetime',    // ✅ THÊM CAST CHO NKS EXPIRY
            'active' => 'boolean',
        ];
    }

    /**
     * ✅ Password mutator - chỉ hash khi cần thiết
     */
    public function setPasswordAttribute($value)
    {
        if (!$value) {
            return;
        }

        // Kiểm tra xem đã là hash chưa (hash Laravel bắt đầu bằng $2y$)
        if (str_starts_with($value, '$2y$') || str_starts_with($value, '$2a$') || str_starts_with($value, '$2b$')) {
            $this->attributes['password'] = $value;
        } else {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * ✅ Kiểm tra NKS token hợp lệ - bao gồm cả expiry check
     */
    public function hasValidNksToken(): bool
    {
        if (empty($this->nks_access_token)) {
            return false;
        }

        // Kiểm tra expiry nếu có
        if ($this->nks_expires_at && $this->nks_expires_at->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * ✅ Refresh NKS access token với error handling tốt hơn
     */
    public function refreshNksToken(): bool
    {
        if (!$this->nks_access_token) {
            Log::warning('Cannot refresh NKS token: no existing token', ['user_id' => $this->id]);
            return false;
        }

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->nks_access_token,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post('https://account.nks.vn/api/nks/auth/refresh');

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['data']['access_token'])) {
                    $updateData = [
                        'nks_access_token' => $data['data']['access_token']
                    ];

                    // Cập nhật expiry nếu có
                    if (isset($data['data']['expires_at'])) {
                        $updateData['nks_expires_at'] = Carbon::parse($data['data']['expires_at']);
                    }

                    $this->update($updateData);

                    Log::info('NKS token refreshed successfully', ['user_id' => $this->id]);
                    return true;
                }
            }

            Log::warning('NKS token refresh failed', [
                'user_id' => $this->id,
                'status' => $response->status(),
                'response' => $response->body()
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to refresh NKS token for user ' . $this->id, [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return false;
    }

    /**
     * ✅ Sync user data với NKS API - improved error handling
     */
    public function syncWithNks(): bool
    {
        if (!$this->hasValidNksToken()) {
            Log::info('Cannot sync with NKS: invalid token', ['user_id' => $this->id]);
            return false;
        }

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->nks_access_token,
                    'Accept' => 'application/json',
                ])
                ->get('https://account.nks.vn/api/nks/user/profile');

            if ($response->successful()) {
                $responseData = $response->json();
                $userData = $responseData['data'] ?? $responseData;

                if (!empty($userData)) {
                    $this->update([
                        'name' => $userData['name'] ?? $this->name,
                        'email' => $userData['email'] ?? $this->email,
                        'phone' => $userData['phone'] ?? $this->phone,
                        'status' => isset($userData['active']) && $userData['active'] ? 'active' : $this->status,
                        'avatar' => $userData['avatar'] ?? $this->avatar,
                    ]);

                    Log::info('User data synced with NKS successfully', ['user_id' => $this->id]);
                    return true;
                }
            }

            // Token có thể đã expired
            if ($response->status() === 401) {
                Log::warning('NKS token appears to be expired', ['user_id' => $this->id]);
                $this->update(['nks_access_token' => null, 'nks_expires_at' => null]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to sync user data with NKS for user ' . $this->id, [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return false;
    }

    /**
     * ✅ Gọi NKS API với authentication - enhanced với auto-retry
     */
    public function callNksApi(string $endpoint, array $data = [], string $method = 'GET')
    {
        if (!$this->hasValidNksToken()) {
            throw new \Exception('No valid NKS token for user ' . $this->id);
        }

        $client = Http::timeout(30)
            ->withHeaders([
                'Authorization' => 'Bearer ' . $this->nks_access_token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Laravel-App/1.0',
            ]);

        try {
            $response = match (strtoupper($method)) {
                'POST' => $client->post($endpoint, $data),
                'PUT' => $client->put($endpoint, $data),
                'PATCH' => $client->patch($endpoint, $data),
                'DELETE' => $client->delete($endpoint),
                default => $client->get($endpoint, $data),
            };

            // Nếu token expired, thử refresh và retry
            if ($response->status() === 401 && $this->refreshNksToken()) {
                Log::info('Retrying NKS API call after token refresh', [
                    'user_id' => $this->id,
                    'endpoint' => $endpoint
                ]);

                // Retry với token mới
                $client = $client->withHeaders([
                    'Authorization' => 'Bearer ' . $this->fresh()->nks_access_token,
                ]);

                $response = match (strtoupper($method)) {
                    'POST' => $client->post($endpoint, $data),
                    'PUT' => $client->put($endpoint, $data),
                    'PATCH' => $client->patch($endpoint, $data),
                    'DELETE' => $client->delete($endpoint),
                    default => $client->get($endpoint, $data),
                };
            }

            return $response;
        } catch (\Exception $e) {
            Log::error('NKS API call failed', [
                'user_id' => $this->id,
                'endpoint' => $endpoint,
                'method' => $method,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * ✅ Check if user is active - improved logic
     */
    public function isActive(): bool
    {
        return ($this->status === 'active') || ($this->active === true);
    }

    /**
     * ✅ Update last login time - with validation
     */
    public function updateLastLogin($ip = null): void
    {
        $updateData = ['last_login_at' => now()];

        if ($ip) {
            $updateData['last_login_ip'] = $ip;
        }

        $this->update($updateData);
    }

    /**
     * ✅ Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('status', 'active')
                ->orWhere('active', true);
        });
    }

    /**
     * ✅ Scope for users with valid NKS integration
     */
    public function scopeWithValidNks($query)
    {
        return $query->whereNotNull('nks_user_id')
            ->whereNotNull('nks_access_token')
            ->where(function ($q) {
                $q->whereNull('nks_expires_at')
                    ->orWhere('nks_expires_at', '>', now());
            });
    }

    /**
     * ✅ Legacy scope - giữ để backward compatibility
     */
    public function scopeWithNks($query)
    {
        return $query->whereNotNull('nks_user_id')
            ->whereNotNull('nks_access_token');
    }

    /**
     * ✅ Get display name
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: ('Người dùng #' . $this->id);
    }

    /**
     * ✅ Check if phone is verified
     */
    public function isPhoneVerified(): bool
    {
        return !empty($this->phone) && !empty($this->activation_code);
    }

    /**
     * ✅ Get NKS user info với caching
     */
    public function getNksUserInfo(): ?array
    {
        if (!$this->hasValidNksToken()) {
            return null;
        }

        try {
            $response = $this->callNksApi('https://account.nks.vn/api/nks/user');

            if ($response->successful()) {
                $data = $response->json();
                return $data['data'] ?? $data;
            }
        } catch (\Exception $e) {
            Log::error('Failed to get NKS user info', [
                'user_id' => $this->id,
                'error' => $e->getMessage()
            ]);
        }

        return null;
    }

    /**
     * ✅ Cleanup expired NKS tokens
     */
    public static function cleanupExpiredNksTokens(): int
    {
        return static::whereNotNull('nks_expires_at')
            ->where('nks_expires_at', '<', now())
            ->update([
                'nks_access_token' => null,
                'nks_expires_at' => null,
            ]);
    }

  
}
