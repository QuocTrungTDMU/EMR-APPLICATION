<?php

return [
    'credentials' => [
        'file' => env('FIREBASE_CREDENTIALS'),
    ],
    'database' => [
        'url' => env('FIREBASE_DATABASE_URL'),
    ],
    'messaging' => [
        'server_key' => env('FIREBASE_SERVER_KEY'),
    ],
];
