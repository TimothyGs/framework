<?php

namespace Framework\Base\Contracts;

interface RouterContract
{
    public function __construct($method, $path, $closure = '');
    public function get($path, callable $closure);
}
