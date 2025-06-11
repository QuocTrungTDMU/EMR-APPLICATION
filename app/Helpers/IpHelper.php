<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IpHelper
{
    /**
     * Get real client IP address
     */
    public static function getRealClientIP(Request $request): string
    {
        // Danh sách headers có thể chứa IP thật
        $ipHeaders = [
            'HTTP_CF_CONNECTING_IP',     // Cloudflare
            'HTTP_CLIENT_IP',            // Proxy servers
            'HTTP_X_FORWARDED_FOR',      // Load balancers, reverse proxies
            'HTTP_X_FORWARDED',          // Proxies
            'HTTP_X_CLUSTER_CLIENT_IP',  // Cluster environments
            'HTTP_FORWARDED_FOR',        // Apache mod_proxy
            'HTTP_FORWARDED',            // RFC 7239
            'HTTP_X_REAL_IP',            // Nginx reverse proxy
            'REMOTE_ADDR'                // Standard CGI variable
        ];

        foreach ($ipHeaders as $header) {
            $ip = $request->server($header);

            if (!empty($ip)) {
                // Xử lý trường hợp có nhiều IP (separated by comma)
                if (strpos($ip, ',') !== false) {
                    $ips = array_map('trim', explode(',', $ip));
                    $ip = $ips[0]; // Lấy IP đầu tiên (thường là IP gốc)
                }

                // Validate IP address
                if (self::isValidPublicIP($ip)) {
                    Log::debug('Real IP detected', [
                        'ip' => $ip,
                        'header' => $header,
                        'all_ips' => $ips ?? [$ip]
                    ]);
                    return $ip;
                }
            }
        }

        // Fallback to Laravel's default method
        $fallbackIP = $request->ip();
        Log::debug('Using fallback IP', ['ip' => $fallbackIP]);

        return $fallbackIP;
    }

    /**
     * Check if IP is valid public IP
     */
    private static function isValidPublicIP(string $ip): bool
    {
        // Validate IP format
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            return false;
        }

        // Exclude private and reserved IP ranges
        if (filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === false) {
            return false;
        }

        return true;
    }

    /**
     * Get detailed IP information
     */
    public static function getDetailedIPInfo(Request $request): array
    {
        $realIP = self::getRealClientIP($request);

        return [
            'real_ip' => $realIP,
            'laravel_ip' => $request->ip(),
            'server_remote_addr' => $request->server('REMOTE_ADDR'),
            'http_x_forwarded_for' => $request->server('HTTP_X_FORWARDED_FOR'),
            'http_x_real_ip' => $request->server('HTTP_X_REAL_IP'),
            'http_cf_connecting_ip' => $request->server('HTTP_CF_CONNECTING_IP'),
            'user_agent' => $request->userAgent(),
            'is_local' => in_array($realIP, ['127.0.0.1', '::1', 'localhost']),
            'is_private' => !self::isValidPublicIP($realIP),
        ];
    }
}
