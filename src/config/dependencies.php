<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c['settings']['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\RotatingFileHandler($settings['path'], $settings['maxFiles'], $settings['level']));
    return $logger;
};

// Service factory for the ORM
$container['database'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['database']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// twig
$container['view'] = function ($c) {
    $path = $c['settings']['renderer']['template_path'];
    $view = new \Slim\Views\Twig($path, [
        'cache' => false
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));
    return $view;
};

// 404 error
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $c['logger']->info("Not found: " . $request->getMethod() . " on " . $request->getUri());
        return $c['response']
            ->withStatus(404)
            ->withJson('Page not found');
    };
};

// 500 error
$c['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        $c['logger']->info("Something went wrong: when " . $request->getMethod() . " on " . $request->getUri()." Error: " . $error);
        return $c['response']
            ->withStatus(500)
            ->withJson('Error: ' . $error);
    };
};