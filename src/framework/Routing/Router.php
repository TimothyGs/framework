<?php

namespace Framework\Base\Routing;

use Framework\Base\Routing\Router\Contracts\RouterContract;
use Framework\Base\Routing\RouteResolvingTrait;

class Router
{
    use RouteResolvingTrait;

    protected $router;

    public function __construct($method = '', $uri = '', $action = null)
    {
        if ($method && $uri && $action)
        {
            $this->resolve($method, $uri, $action);
        }

        return $this;
    }

    public function setRouter(RouterContract $router)
    {
        $this->router = $router;

        return $this;
    }

    public function getRouter()
    {
        return $this->router;
    }
}
