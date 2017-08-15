<?php
// DIC configuration

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\RotatingFileHandler($settings['path'], $settings['maxFiles'], $settings['level']));
    return $logger;
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
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $c['logger']->info("Not found: " . $request->getMethod() . " on " . $request->getUri());
        return $c['response']->withJson('Page not found', 404);
    };
};

// 500 error
$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        $c['logger']->info("Something went wrong: when " . $request->getMethod() . " on " . $request->getUri()." Error: " . $exception);
        return $c['response']->withJson('Error: ' . $exception, 500);
    };
};

// Service factory for the ORM
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['database']);

// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
