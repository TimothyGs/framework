<?php
namespace Framework\Database\Driver;

use Framework\Database\Driver\Contracts\DriverContract;

class DbalDriver implements DriverContract
{
    private $driverInstance;

    public function __construct($driverInstance)
    {
        $this->driverInstance = $driverInstance;
    }

    public function connect($params)
    {
        // TODO: Implement connect() method.
    }

    public function query($query)
    {
        // TODO: Implement query() method.
    }

    public function select($value = false)
    {
        // TODO: Implement select() method.
    }

    public function update($match, ...$values)
    {
        // TODO: Implement update() method.
    }

    public function join($value = false, $on = false)
    {
        // TODO: Implement join() method.
    }

    public function where($value = false, $where = false)
    {
        // TODO: Implement where() method.
    }

    public function limit($limit)
    {
        // TODO: Implement limit() method.
    }

    public function order($order = 50)
    {
        // TODO: Implement order() method.
    }
}
