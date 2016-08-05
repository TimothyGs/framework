<?php

namespace Framework\Base\Injector;

use ReflectionClass;

class Injector
{
    private $map;

    private $resolved = [];

    public function bind($alias, $contract = null)
    {
        $this->map[$alias] = $contract;
    }

    public function build($contract)
    {
        $reflector = new ReflectionClass($contract);

        if (!$reflector->isInstantiable())
        {
            throw new Exception('u wat mate');
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor))
        {
            $class = new $contract;
            return $class;
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    public function getMap()
    {
        return $this->map;
    }

    public function getDependencies($parameters)
    {
        $dependencies = [];

        foreach ($parameters as $parameter)
        {
            $dependency = $parameter->getClass();

            if (is_null($dependency))
            {
                $dependencies[] = $this->resolveNonClass($parameter);
            }
            else
            {
                if (in_array($dependency->name, $this->resolved)){
                    throw new \RuntimeException('Unresolvable circular dependencies detected');
                }
                $this->resolved[] = $dependency->name;

                if (isset($this->map[$dependency->name]))
                {
                    $dependencies[] = $this->build($this->map[$dependency->name]);
                }
                else{
                    $dependencies[] = $this->build($dependency->name);
                }
            }
        }

        return $dependencies;
    }

    public function resolveNonClass($parameter)
    {
        if ($parameter->isDefaultValueAvailable())
        {
            return $parameter->getDefaultValue();
        }

        throw new Exception('pls no');
    }

    public function instance($alias)
    {
        if (isset($this->map[$alias]))
        {
            return $this->build($this->map[$alias]);
        }
    }
}
