<?php

namespace Framework\Routing\Router\Contracts;

interface RouterContract
{
    public function boot($router);
    public function get($path, callable $closure = null);
    public function post($path, callable $closure = null);
    public function patch($path, callable $closure = null);
    public function delete($path, callable $closure = null);
    public function currentRoute();
}
