<?php

namespace Framework\Base\Injector;

use ReflectionClass;

class Injector
{
    private static $map;

    public function bind($string, $class = null)
    {
        $string = $this->normalize($string);
        $class  = $this->normalize($class);

        $this->map[$string] = $class;
    }

    public function getByName($string)
    {
        $string = $this->normalize($string);
        return new ReflectionClass($this->map[$string]);
    }

    protected function normalize($service)
    {
        return is_string($service) ? ltrim($service, '\\') : $service;
    }

}
