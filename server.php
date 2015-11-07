<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\Slim(array(
    'templates.path' => __DIR__ . '/app/views',
));

$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('SkeletalFramework');
    $log->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__ . '/app/logs/skeletal.log', \Monolog\Logger::DEBUG));
    return $log;
});

$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
//    'cache' => realpath(__DIR__ . '/app/views/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

require __DIR__ . '/app/routes.php';

$app->run();
