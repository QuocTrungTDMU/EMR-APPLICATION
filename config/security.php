<?php

return [
    /*
    |--------------------------------------------------------------------------
    | IP Security Settings
    |--------------------------------------------------------------------------
    */

    // IP Whitelist - chỉ cho phép các IP này truy cập
    'ip_whitelist' => [
        // '192.168.1.0/24',
        // '10.0.0.0/8',
        // '172.16.0.0/12',
    ],

    // IP Blacklist - chặn các IP này
    'ip_blacklist' => [
        // '192.168.1.100',
        // '10.0.0.50/32',
    ],

    // Chỉ cho phép IP trong whitelist (strict mode)
    'whitelist_only' => false,

    // Trusted proxy networks
    'trusted_proxies' => [
        '127.0.0.1',
        '192.168.1.0/24',
        // Cloudflare IPs
        '173.245.48.0/20',
        '103.21.244.0/22',
        '103.22.200.0/22',
        // Add more as needed
    ],
];
