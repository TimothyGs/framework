<?php
namespace Framework\Database;

use Framework\Database\Driver\Contracts\DriverContract;

class Connection
{
    protected $driver;

    public function __construct($params, DriverContract $driver)
    {
        $this->driver = $driver->connect($params);
    }

    public function getDriver()
    {
        return $this->driver;
    }
}
