<?php
error_reporting(E_ALL);

require_once  __DIR__ . '/../vendor/autoload.php';

$container = new \Framework\Core\Injector();

$mappings = [
    Framework\Routing\Router\Contracts\RouterContract::class => \Framework\Routing\Router\KleinRouter::class
];

$container->map($mappings);

/**
 * @var \Framework\Application $app
 */
$app = $container->build(\Framework\Application::class);
