<?php

namespace Framework\Injector;

use ReflectionClass;
use Exception;

class Injector
{
    private $map;

    private $resolved = [];

    public function bind($alias, $binding = null)
    {
        $this->map[$alias] = $binding;
    }

    public function build($contract)
    {
        $reflector = new ReflectionClass($contract);

        if (!$reflector->isInstantiable())
        {
            throw new Exception('Object is not instantiable');
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

    public function map($classmap)
    {
        foreach ($classmap as $alias => $binding)
        {
            $this->map[$alias] = $binding;
        }
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
            /**
             * @var ReflectionClass $dependency
             */
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
                    if (($dependency->isAbstract() || $dependency->isInterface()))
                    {
                        continue;
                    }
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
