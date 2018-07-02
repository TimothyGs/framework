<?php
namespace App\Foo\Repository;

use App\Foo\Model\Foo;

class FooRepository
{
    public function findOneById($id)
    {
        return new Foo($id, ['My first app']);
    }
}
