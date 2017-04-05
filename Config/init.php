<?php

return [

    'app' => [
        'blocks' => [
            'NavigationModule' => [
                'path' => 'src/Modules/Navigation/',
                'namespace' => '\\Jet\\Modules\\Navigation',
                'view_dir' => 'src/Modules/Navigation/Views/',
                'prefix' => 'admin',
            ],
        ],
        'fixtures' => [
            'src/Modules/Navigation/Fixtures/'
        ],
        'settings' => [
            'custom_field_type' => [
                'content' => [
                    'values' => [
                        ['navigation', 'Navigation' , 'Navigation@navigationCustomField' , 'Navigation@navigationRenderCustomField']
                    ]
                ]
            ],
            'custom_field_callback' => [
                'navigation' => '\\Jet\\Modules\\Navigation\\Controllers\\FrontNavigationController@renderField'
            ],
            'navigation' => [
                'page' => [
                    'id' => 'page',
                    'name' => 'Page',
                    'plural' => 'Pages',
                    'all' => '\\Jet\\AdminBlock\\Controllers\\PageController@listStaticPages',
                    'get_url' => '\\Jet\\AdminBlock\\Controllers\\PageController@getStaticPageRoute'
                ],
            ],
        ]
    ]
];