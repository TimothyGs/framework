<?php

namespace Framework\Base\Contracts\Http;

use Klein\Klein;

interface RouterContract
{
    public function __construct($method, $path, callable $closure = null);
    public function get($path, callable $closure = null);
    public function resolve($method = '', $path = '', callable $closure = null);
    public function currentRoute();
}
