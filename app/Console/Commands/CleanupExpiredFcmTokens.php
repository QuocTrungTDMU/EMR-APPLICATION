<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserFcmToken;

class CleanupExpiredFcmTokens extends Command
{
    protected $signature = 'fcm:cleanup {--dry-run : Show what would be deleted without actually deleting}';
    protected $description = 'Clean up expired and inactive FCM tokens';

    public function handle()
    {
        $dryRun = $this->option('dry-run');

        // Find tokens to cleanup
        $expiredTokens = UserFcmToken::where(function ($query) {
            $query->where('is_active', false)
                ->orWhere('last_used_at', '<', now()->subMonths(3))
                ->orWhere('expires_at', '<', now());
        });

        $count = $expiredTokens->count();

        if ($dryRun) {
            $this->info("Would delete {$count} expired/inactive FCM tokens");
            return;
        }

        if ($count > 0) {
            $expiredTokens->delete();
            $this->info("Deleted {$count} expired/inactive FCM tokens");
        } else {
            $this->info("No expired FCM tokens found");
        }
    }
}
