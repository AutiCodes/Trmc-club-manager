<?php

return [
    'name' => 'Club manager',
    'manifest' => [
        'name' => 'Club manager',
        'short_name' => 'TRMC club',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/media/images/TRMC_LOGO.png',
            '750x1334' => '/media/images/TRMC_LOGO.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/media/images/TRMC_LOGO.png',
            '1242x2208' => '/media/images/TRMC_LOGO.png',
            '1242x2688' => '/media/images/TRMC_LOGO.png',
            '1536x2048' => '/media/images/TRMC_LOGO.png',
            '1668x2224' => '/media/images/TRMC_LOGO.png',
            '1668x2388' => '/media/images/TRMC_LOGO.png',
            '2048x2732' => '/media/images/TRMC_LOGO.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
