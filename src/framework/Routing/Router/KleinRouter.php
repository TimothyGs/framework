<?php

namespace Framework\Base\Routing\Router;

use Framework\Base\Routing\Router\Contracts\RouterContract;
use Klein\Klein;
use Framework\Base\Routing\Router;

class KleinRouter implements RouterContract
{
    protected $router;

    protected $routesMap = '';

    public function __construct(Klein $router)
    {
        $this->router = $router;

        $this->router->dispatch();

        return $this;
    }

    public function boot($router)
    {
        self::__construct($router);
    }

    public function get($path, callable $closure = null)
    {
        $this->router->respond('GET', $path, $closure);
    }

    public function post($path, callable $closure = null)
    {
        $this->router->respond('POST', $path, $closure);
    }

    public function patch($path, callable $closure = null)
    {
        $this->router->respond('PATCH', $path, $closure);
    }

    public function delete($path, callable $closure = null)
    {
        $this->router->respond('DELETE', $path, $closure);
    }

    public function currentRoute()
    {
        return $this->router->request()->uri();
    }

    public function mapRoutes(Router $router)
    {
    }

}
