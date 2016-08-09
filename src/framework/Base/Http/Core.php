<?php

namespace Framework\Base\Http;

use Framework\Base\Contracts\Http\Core as CoreContract;
use Framework\Base\Contracts\Http\RouterContract;

class Core implements CoreContract
{
    protected $application;

    protected $router;

    protected $classMap = [
        'Framework\Base\Http\Router'
    ];

    public function __construct(RouterContract $router)
    {
        $this->router      = $router;
    }

    public function getRouter($method = '', $path = '', callable $closure = null)
    {
        return $this->router->__construct($method, $path, $closure);
    }

    public function bootstrap()
    {
        $this->application->boot($this->classMap);
    }
}
