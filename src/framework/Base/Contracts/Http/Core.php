<?php

namespace Framework\Base\Contracts\Http;

interface Core
{
    public function __construct(RouterContract $router);
    public function getRouter($method = '', $path = '', callable $closure = null);
    public function bootstrap();
}
