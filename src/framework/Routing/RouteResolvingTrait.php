<?php

namespace Framework\Routing;

use Framework\Routing\Router\Contracts\RouterContract;

trait RouteResolvingTrait
{
    /**
     * @var RouterContract $router
     */
    protected $router;

    public function resolve($method = '', $path = '', callable $closure = null)
    {
        $this->router->{$method}($path, $closure);
    }
}
