<?php

require_once  __DIR__ . '/../vendor/autoload.php';

$container = new \Framework\Core\Injector();

$mappings = [
    Framework\Routing\Router\Contracts\RouterContract::class => \Framework\Routing\Router\KleinRouter::class
];

$container->map($mappings);

/**
 * @var \Framework\Routing\Router\Contracts\RouterContract $router
 */
$app = $container->build(\Framework\Application::class);
