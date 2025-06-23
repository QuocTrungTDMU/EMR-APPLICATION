<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFcmToken extends Model
{
    use HasFactory;

    protected $table = 'user_fcm_tokens';

    protected $fillable = [
        'user_id',
        'fcm_token',
        'device',
        'platform',
        'browser',
        'source',
        'app_version',
        'is_active',
        'last_used_at',
        'expires_at',
        'metadata',
        'ip_address',
        'location',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_used_at' => 'datetime',
        'expires_at' => 'datetime',
        'metadata' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $dates = [
        'last_used_at',
        'expires_at',
        'created_at',
        'updated_at',
    ];

    /**
     * ✅ Relationship với User model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ✅ Scope for active tokens
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * ✅ Scope for non-expired tokens
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expires_at')
                ->orWhere('expires_at', '>', now());
        });
    }

    /**
     * ✅ Scope for specific device
     */
    public function scopeDevice($query, string $device)
    {
        return $query->where('device', $device);
    }

    /**
     * ✅ Scope for specific platform
     */
    public function scopePlatform($query, string $platform)
    {
        return $query->where('platform', $platform);
    }

    /**
     * ✅ Check if token is valid (active and not expired)
     */
    public function isValid(): bool
    {
        return $this->is_active &&
            (is_null($this->expires_at) || $this->expires_at->isFuture());
    }

    /**
     * ✅ Mark token as used
     */
    public function markAsUsed(): void
    {
        $this->update(['last_used_at' => now()]);
    }

    /**
     * ✅ Deactivate token
     */
    public function deactivate(): void
    {
        $this->update(['is_active' => false]);
    }
}
