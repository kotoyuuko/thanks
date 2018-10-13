<?php

return [
    // Default app name
    'default_app' => 'default',

    // Base configuration
    'base' => [
        'debug' => false,
        'log' => [
            'name' => 'youzan',
            'file' => storage_path('logs/youzan.log'),
            'level'      => 'debug',
            'permission' => 0777,
        ]
    ],

    // Applications
    'apps' => [
        'default' => [
            'client_id' => env('YOUZAN_CLIENT_ID'),
            'client_secret' => env('YOUZAN_CLIENT_SECRET'),
            'kdt_id' => env('YOUZAN_STORE_ID'),
        ],
    ]
];
