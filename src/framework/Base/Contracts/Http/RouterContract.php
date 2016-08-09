<?php

namespace Framework\Base\Contracts;

interface RouterContract
{
    public function __construct($method, $path, callable $closure = null);
    public function get($path, callable $closure = null);
    public static function resolve($method = '', $path = '', callable $closure = null);
}
