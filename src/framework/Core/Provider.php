<?php
namespace Framework\Core;

abstract class Provider
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
}
