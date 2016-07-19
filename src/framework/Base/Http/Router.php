<?php

namespace Framework\Base\Http;

use Framework\Base\Contracts\RouterContract;
use Klein\Klein;

class Router implements RouterContract
{
    protected $router;

    public function __construct($method = '', $path = '', $closure = '')
    {
        $this->router = new Klein();

        if (!$method)
        {
            return $this;
        }

        $this->$method($path, $closure);

        $this->router->dispatch();
    }

    public function get($path, callable $closure)
    {
        $this->router->respond('GET', $path, $closure);
    }
}
