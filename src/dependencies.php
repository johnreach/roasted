<?php
// DIC configuration
use Respect\Validation\Validator as v;

v::with('Roasted\\Validation\\Rules\\');

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// Register twig view
$container['view'] = function ($container) {
    
    $settings = $container->get('settings')['renderer'];
    
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => false
    ]);
    //$view->setCache(false);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};


$container['csrf'] = function($container) {
    
    return new Slim\Csrf\Guard;
};

$container['HomeController'] = function($container) {
    
    return new \Roasted\Controllers\HomeController($container);
};

$container['AuthController'] = function($container) {
    
    return new \Roasted\Controllers\Auth\AuthController($container);
};

$container['validator'] = function($container) {
    
    return new \Roasted\Validation\Validator;
};