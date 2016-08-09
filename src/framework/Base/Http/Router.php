<?php

namespace Framework\Base\Http;

use Framework\Base\Contracts\Http\ExternalRouterInterface as ExternalRouterInterface;
use Framework\Base\Contracts\Http\RouterContract;
use Framework\Base\Routing\Route;
use Klein\Klein;

class Router implements RouterContract
{
    protected $router;

    protected $routesMap = '';

    public function __construct($method = '', $path = '', callable $closure = null)
    {
        $this->router = new Klein(); //

        $this->mapRoutes(new Route());

        if (!$method)
        {
            $this->router->dispatch();

            return $this;
        }

        if ($method !== '' && $path !== '')
        {
            $this->$method($path, $closure);
        }

        $this->router->dispatch();

        return $this;
    }

    public function get($path, callable $closure = null)
    {
        $this->router->respond('GET', $path, $closure);
    }

    public function resolve($method = '', $path = '', callable $closure = null)
    {
        self::__construct($method, $path, $closure);
    }

    public function currentRoute()
    {
        return $this->router->request()->uri();
    }

    public function mapRoutes(Route $router)
    {
        call_user_func(function(Route $router)
        {
            require './src/App/routes.php';
        });
    }

}
