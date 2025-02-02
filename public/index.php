<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();
