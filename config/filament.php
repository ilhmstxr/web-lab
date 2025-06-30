<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | Uncomment and configure this section if you plan to use real-time
    | features such as notifications with Laravel Echo and Pusher.
    |
    */

    'broadcasting' => [

        // Example configuration (uncomment if used)
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This defines the disk Filament will use when dealing with file uploads.
    | Ensure 'public' exists in config/filesystems.php and linked with:
    | php artisan storage:link
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | Where Filament publishes its assets. Usually null is fine unless you're
    | customizing the path for CDN or asset management.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | Where Filament will cache its component registration metadata.
    | Leave as default unless you're doing advanced optimization.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | Determines how long to wait before showing a loading spinner.
    | Use 'default' (200ms) or 'none' (show immediately).
    |
    */

    'livewire_loading_delay' => 'default',

    /*
    |--------------------------------------------------------------------------
    | System Route Prefix
    |--------------------------------------------------------------------------
    |
    | Route prefix used for Filament system routes such as export/import.
    | You can change it but make sure it's not conflicting.
    |
    */

    'system_route_prefix' => 'filament',

    'auth' => [
        'pages' => [
            'login' => \Filament\Pages\Auth\Login::class,
        ],
    ],

];
