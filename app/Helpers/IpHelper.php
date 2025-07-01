<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IpHelper
{
    /**
     * Danh sách headers có thể chứa IP thật (theo thứ tự ưu tiên)
     */
    private static array $ipHeaders = [
        'HTTP_CF_CONNECTING_IP',     // Cloudflare - Độ tin cậy cao
        'HTTP_TRUE_CLIENT_IP',       // Cloudflare Enterprise
        'HTTP_X_REAL_IP',            // Nginx reverse proxy
        'HTTP_X_FORWARDED_FOR',      // Load balancers, reverse proxies  
        'HTTP_X_CLUSTER_CLIENT_IP',  // Cluster environments
        'HTTP_CLIENT_IP',            // Proxy servers
        'HTTP_X_FORWARDED',          // Proxies
        'HTTP_FORWARDED_FOR',        // Apache mod_proxy
        'HTTP_FORWARDED',            // RFC 7239
        'REMOTE_ADDR'                // Standard CGI variable (cuối cùng)
    ];

    /**
     * ✅ Get real client IP address
     */
    public static function getRealClientIP(Request $request): string
    {
        $detectedIPs = [];

        foreach (self::$ipHeaders as $header) {
            $ip = $request->server($header);

            if (!empty($ip)) {
                // Xử lý trường hợp có nhiều IP (separated by comma/semicolon)
                $ips = self::parseMultipleIPs($ip);

                foreach ($ips as $singleIP) {
                    $cleanIP = self::cleanIP($singleIP);

                    if (self::isValidPublicIP($cleanIP)) {
                        $detectedIPs[] = [
                            'ip' => $cleanIP,
                            'header' => $header,
                            'priority' => array_search($header, self::$ipHeaders),
                            'is_trusted' => self::isTrustedProxy($cleanIP)
                        ];

                        Log::debug('Valid IP detected', [
                            'ip' => $cleanIP,
                            'header' => $header,
                            'original' => $ip
                        ]);

                        // Trả về IP đầu tiên từ header có độ ưu tiên cao nhất
                        return $cleanIP;
                    }
                }
            }
        }

        // Fallback: Sử dụng phương thức mặc định của Laravel
        $fallbackIP = $request->ip() ?? '127.0.0.1';

        Log::info('Using fallback IP', [
            'ip' => $fallbackIP,
            'detected_ips' => $detectedIPs,
            'user_agent' => $request->userAgent()
        ]);

        return $fallbackIP;
    }

    /**
     * ✅ Parse multiple IPs from header value
     */
    private static function parseMultipleIPs(string $ipString): array
    {
        // Split by comma, semicolon hoặc space
        $ips = preg_split('/[,;\s]+/', $ipString);

        return array_filter(array_map('trim', $ips), function ($ip) {
            return !empty($ip) && $ip !== 'unknown';
        });
    }

    /**
     * ✅ Clean and normalize IP address
     */
    private static function cleanIP(string $ip): string
    {
        // Remove port numbers (IPv4:port or [IPv6]:port)
        $ip = preg_replace('/:\d+$/', '', $ip);

        // Remove brackets from IPv6
        $ip = trim($ip, '[]');

        // Convert IPv4-mapped IPv6 to IPv4
        if (preg_match('/^::ffff:(\d+\.\d+\.\d+\.\d+)$/i', $ip, $matches)) {
            $ip = $matches[1];
        }

        return trim($ip);
    }

    /**
     * ✅ Check if IP is valid public IP
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

        // Additional checks for special cases
        if (self::isSpecialIP($ip)) {
            return false;
        }

        return true;
    }

    /**
     * ✅ Check for special/invalid IP addresses
     */
    private static function isSpecialIP(string $ip): bool
    {
        $specialIPs = [
            '0.0.0.0',
            '255.255.255.255',
            'unknown',
            'none'
        ];

        return in_array(strtolower($ip), array_map('strtolower', $specialIPs));
    }

    /**
     * ✅ Check if IP is from trusted proxy
     */
    private static function isTrustedProxy(string $ip): bool
    {
        $trustedProxies = config('trustedproxies.proxies', []);

        if (empty($trustedProxies)) {
            return false;
        }

        foreach ($trustedProxies as $proxy) {
            if ($proxy === '*' || $ip === $proxy) {
                return true;
            }

            // Check CIDR ranges
            if (strpos($proxy, '/') !== false && self::ipInRange($ip, $proxy)) {
                return true;
            }
        }

        return false;
    }

    /**
     * ✅ Check if IP is in CIDR range
     */
    private static function ipInRange(string $ip, string $cidr): bool
    {
        if (!str_contains($cidr, '/')) {
            return $ip === $cidr;
        }

        [$subnet, $mask] = explode('/', $cidr);

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return self::ipv4InRange($ip, $subnet, (int)$mask);
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return self::ipv6InRange($ip, $subnet, (int)$mask);
        }

        return false;
    }

    /**
     * ✅ Check if IPv4 is in range
     */
    private static function ipv4InRange(string $ip, string $subnet, int $mask): bool
    {
        return (ip2long($ip) & ~((1 << (32 - $mask)) - 1)) === ip2long($subnet);
    }

    /**
     * ✅ Check if IPv6 is in range
     */
    private static function ipv6InRange(string $ip, string $subnet, int $mask): bool
    {
        $ip = inet_pton($ip);
        $subnet = inet_pton($subnet);

        if (!$ip || !$subnet) {
            return false;
        }

        $byteCount = floor($mask / 8);
        $bitCount = $mask % 8;

        for ($i = 0; $i < $byteCount; $i++) {
            if ($ip[$i] !== $subnet[$i]) {
                return false;
            }
        }

        if ($bitCount > 0) {
            $mask = 0xFF << (8 - $bitCount);
            return (ord($ip[$byteCount]) & $mask) === (ord($subnet[$byteCount]) & $mask);
        }

        return true;
    }

    /**
     * ✅ Get detailed IP information
     */
    public static function getDetailedIPInfo(Request $request): array
    {
        $realIP = self::getRealClientIP($request);
        $isLocal = self::isLocalIP($realIP);
        $isPrivate = !self::isValidPublicIP($realIP);

        $info = [
            'real_ip' => $realIP,
            'laravel_ip' => $request->ip(),
            'headers' => [],
            'classification' => [
                'is_local' => $isLocal,
                'is_private' => $isPrivate,
                'is_public' => !$isPrivate,
                'is_trusted_proxy' => self::isTrustedProxy($realIP),
                'ip_version' => filter_var($realIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? 'IPv4' : 'IPv6'
            ],
            'request_info' => [
                'user_agent' => $request->userAgent(),
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'timestamp' => now()->toISOString()
            ]
        ];

        // Thu thập tất cả IP headers
        foreach (self::$ipHeaders as $header) {
            $value = $request->server($header);
            if (!empty($value)) {
                $info['headers'][$header] = $value;
            }
        }

        // Thêm geolocation nếu là public IP
        if (!$isPrivate && !$isLocal) {
            $info['geolocation'] = self::getGeolocation($realIP);
        }

        return $info;
    }

    /**
     * ✅ Check if IP is local
     */
    public static function isLocalIP(string $ip): bool
    {
        $localIPs = [
            '127.0.0.1',
            '::1',
            'localhost',
            '0.0.0.0'
        ];

        return in_array(strtolower($ip), array_map('strtolower', $localIPs));
    }

    /**
     * ✅ Get geolocation information
     */
    public static function getGeolocation(string $ip): ?array
    {
        if (self::isLocalIP($ip) || !self::isValidPublicIP($ip)) {
            return null;
        }

        $cacheKey = "geolocation_{$ip}";

        return Cache::remember($cacheKey, 86400, function () use ($ip) {
            try {
                // Sử dụng ip-api.com (free service)
                $response = Http::timeout(5)->get("http://ip-api.com/json/{$ip}", [
                    'fields' => 'status,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,query'
                ]);

                if ($response->successful()) {
                    $data = $response->json();

                    if ($data['status'] === 'success') {
                        return [
                            'country' => $data['country'] ?? null,
                            'country_code' => $data['countryCode'] ?? null,
                            'region' => $data['regionName'] ?? null,
                            'city' => $data['city'] ?? null,
                            'latitude' => $data['lat'] ?? null,
                            'longitude' => $data['lon'] ?? null,
                            'timezone' => $data['timezone'] ?? null,
                            'isp' => $data['isp'] ?? null,
                            'organization' => $data['org'] ?? null,
                            'as' => $data['as'] ?? null,
                            'source' => 'ip-api.com'
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Geolocation lookup failed', [
                    'ip' => $ip,
                    'error' => $e->getMessage()
                ]);
            }

            return null;
        });
    }

    /**
     * ✅ Get formatted location string
     */
    public static function getLocationString(string $ip): string
    {
        $geo = self::getGeolocation($ip);

        if (!$geo) {
            return self::isLocalIP($ip) ? 'Local' : 'Unknown';
        }

        $parts = array_filter([
            $geo['city'],
            $geo['region'],
            $geo['country']
        ]);

        return implode(', ', array_slice($parts, 0, 2)) ?: 'Unknown';
    }

    /**
     * ✅ Check if IP is in whitelist
     */
    public static function isWhitelisted(string $ip): bool
    {
        $whitelist = config('security.ip_whitelist', []);

        foreach ($whitelist as $allowedIP) {
            if ($ip === $allowedIP || (str_contains($allowedIP, '/') && self::ipInRange($ip, $allowedIP))) {
                return true;
            }
        }

        return false;
    }

    /**
     * ✅ Check if IP is blacklisted
     */
    public static function isBlacklisted(string $ip): bool
    {
        $blacklist = config('security.ip_blacklist', []);

        foreach ($blacklist as $blockedIP) {
            if ($ip === $blockedIP || (str_contains($blockedIP, '/') && self::ipInRange($ip, $blockedIP))) {
                return true;
            }
        }

        return false;
    }

    /**
     * ✅ Log IP activity
     */
    public static function logActivity(Request $request, string $event, array $context = []): void
    {
        $ip = self::getRealClientIP($request);

        Log::info("IP Activity: {$event}", array_merge([
            'ip' => $ip,
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'timestamp' => now()->toISOString(),
            'location' => self::getLocationString($ip)
        ], $context));
    }

    /**
     * ✅ Get rate limiting key for IP
     */
    public static function getRateLimitKey(Request $request, string $action = 'default'): string
    {
        $ip = self::getRealClientIP($request);
        return "rate_limit:{$action}:{$ip}";
    }

    /**
     * ✅ Anonymize IP for GDPR compliance
     */
    public static function anonymizeIP(string $ip): string
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            // Anonymize last octet of IPv4
            return preg_replace('/\.\d+$/', '.0', $ip);
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // Anonymize last 80 bits of IPv6
            $parts = explode(':', $ip);
            return implode(':', array_slice($parts, 0, 3)) . '::';
        }

        return $ip;
    }

    /**
     * ✅ Validate IP against security rules
     */
    public static function validateIPSecurity(string $ip): array
    {
        return [
            'is_valid' => filter_var($ip, FILTER_VALIDATE_IP) !== false,
            'is_public' => self::isValidPublicIP($ip),
            'is_local' => self::isLocalIP($ip),
            'is_whitelisted' => self::isWhitelisted($ip),
            'is_blacklisted' => self::isBlacklisted($ip),
            'is_trusted_proxy' => self::isTrustedProxy($ip),
            'should_allow' => !self::isBlacklisted($ip) && (self::isWhitelisted($ip) || !config('security.whitelist_only', false))
        ];
    }
}
