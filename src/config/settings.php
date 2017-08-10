<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => false,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../../logs/info.log',
            'level' => \Monolog\Logger::DEBUG,
            'maxFiles' => '5'
        ],

        'database' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'dialever',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

        // Mailer
        'mailer' => [
            'smtp' => 'smtp.com.br',
            'port' => '587',
            'encrypt' => 'ssl',
            'user' => 'com.br',
            'pass' => 'curitiba7777',
        ],
    ],
];
