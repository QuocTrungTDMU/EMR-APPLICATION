<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',              // Thêm phone từ API register
        'password',
        'nks_user_id',
        'nks_access_token',
        'activation_code',    // Thêm từ API response
        'status',             // Thêm để track trạng thái user
        'last_login_at',      // Track last login
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'nks_access_token',
        'activation_code',    // Ẩn activation code
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Kiểm tra xem user có token NKS hợp lệ không
     */
    public function hasValidNksToken(): bool
    {
        return !empty($this->nks_access_token);
    }

    /**
     * Refresh NKS access token
     */
    public function refreshNksToken(): bool
    {
        try {
            // Gọi API refresh token nếu cần
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->nks_access_token,
                ])
                ->post('https://account.nks.vn/api/nks/auth/refresh');

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['access_token'])) {
                    $this->update([
                        'nks_access_token' => $data['access_token']
                    ]);
                    return true;
                }
            }
        } catch (\Exception $e) {
            Log::error('Failed to refresh NKS token for user ' . $this->id, [
                'error' => $e->getMessage()
            ]);
        }

        return false;
    }

    /**
     * Sync user data với NKS API
     */
    public function syncWithNks(): bool
    {
        if (!$this->hasValidNksToken()) {
            return false;
        }

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->nks_access_token,
                ])
                ->get('https://account.nks.vn/api/nks/user/profile');

            if ($response->successful()) {
                $userData = $response->json()['data'] ?? [];

                $this->update([
                    'name' => $userData['name'] ?? $this->name,
                    'email' => $userData['email'] ?? $this->email,
                    'phone' => $userData['phone'] ?? $this->phone,
                    'status' => $userData['status'] ?? $this->status,
                ]);

                return true;
            }
        } catch (\Exception $e) {
            Log::error('Failed to sync user data with NKS for user ' . $this->id, [
                'error' => $e->getMessage()
            ]);
        }

        return false;
    }

    /**
     * Gọi NKS API với authentication
     */
    public function callNksApi(string $endpoint, array $data = [], string $method = 'GET')
    {
        if (!$this->hasValidNksToken()) {
            throw new \Exception('No valid NKS token');
        }

        $response = Http::timeout(30)
            ->withHeaders([
                'Authorization' => 'Bearer ' . $this->nks_access_token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]);

        switch (strtoupper($method)) {
            case 'POST':
                return $response->post($endpoint, $data);
            case 'PUT':
                return $response->put($endpoint, $data);
            case 'DELETE':
                return $response->delete($endpoint);
            default:
                return $response->get($endpoint, $data);
        }
    }

    /**
     * Check if user is active
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Update last login time
     */
    public function updateLastLogin(): void
    {
        $this->update(['last_login_at' => now()]);
    }

    /**
     * Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for users with NKS integration
     */
    public function scopeWithNks($query)
    {
        return $query->whereNotNull('nks_user_id')
            ->whereNotNull('nks_access_token');
    }

    /**
     * Get display name
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: 'Người dùng #' . $this->id;
    }

    /**
     * Check if phone is verified
     */
    public function isPhoneVerified(): bool
    {
        return !empty($this->phone) && !empty($this->activation_code);
    }
}
