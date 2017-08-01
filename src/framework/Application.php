<?php

namespace Framework;

use Framework\Routing\Router\Contracts\RouterContract as Router;

class Application
{
    protected $publicPath;

    protected $router;

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
}
