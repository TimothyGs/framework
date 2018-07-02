<?php

namespace Framework;

use Framework\Routing\Router\Contracts\RouterContract as Router;

class Application
{
    protected $publicPath;

    protected $router;

    protected $files = [];

    public function __construct($publicPath = '/', Router $router)
    {
        $this->publicPath = $publicPath;
        $this->router     = $router;
    }

    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    public function getCurrentRoute()
    {
        return $this->router->currentRoute();
    }

    public static function path($path)
    {
       return __DIR__ . '../../' . $path;
    }

    public static function config($name, $key = '')
    {
        $configuration = require self::path('config') . $name . '.php';

        if ($configKey = array_get($configuration, $key, false))
        {
            $configuration = $configKey;
        }

        return $configuration;
    }
}
