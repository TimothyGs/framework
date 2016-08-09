<?php

namespace Framework\Base\Routing;

use Framework\Base\Http\Router;
use Framework\Base\Http\RouteResolvingTrait;

class Route
{
    protected $router;

    public function __construct($method = '', $uri = '', $action = '')
    {

    }

    public function setRouter(Router $router)
    {
        $this->router = $router;

        return $this;
    }

    public function __get($key)
    {
        echo $key;
        exit();
        return $this->parameter($key);
    }
}
