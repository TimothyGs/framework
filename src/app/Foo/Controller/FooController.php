<?php
namespace App\Foo\Controller;

use App\Foo\Service\FooService;

class FooController
{
    /**
     * @var FooService $fooService
     */
    private $fooService;

    public function loadDependencies(FooService $fooService)
    {
        $this->fooService = $fooService;
    }

    public function indexAction()
    {
        return $this->fooService->findMyFoo(1);
    }
}
