<?php
namespace App\Foo\Service;

use App\Foo\Repository\FooRepository;

class FooService
{
    private $fooRepository;

    public function __construct(FooRepository $fooRepository)
    {
        $this->fooRepository = $fooRepository;
    }

    public function findMyFoo($id)
    {
        return $this->fooRepository->findOneById($id);
    }
}
