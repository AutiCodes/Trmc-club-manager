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
            '96x96' => [
                'path' => '/media/images/TRMC_LOGO.png',
                'purpose' => 'any'
            ]
        ],
        'splash' => [
            '750x1334' => '/media/images/TRMC_LOGO.png',

        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/media/images/TRMC_LOGO.png",
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
