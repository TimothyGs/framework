<?php
namespace App\Foo\Model;

class Foo
{
    private $id;

    private $name;

    public function __construct($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }
}
