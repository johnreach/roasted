<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        
        // Database settings
        'db' => [
            'connection_string' => 'mysql:host=localhost;dbname=roasted',
            'username' => 'root',
            'password' => 'causeytestarehard'
        ]
    ]
];
