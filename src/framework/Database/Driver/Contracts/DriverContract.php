<?php

namespace Framework\Database\Driver\Contracts;

interface DriverContract
{
    public function connect($params);
    public function query($query);
    public function select($value = false);
    public function update($match, ...$values);
    public function join($value = false, $on = false);
    public function where($value = false, $where = false);
    public function limit($limit);
    public function order($order = 50);
}
