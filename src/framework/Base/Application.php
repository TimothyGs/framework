<?php

namespace Framework\Base;

use Framework\Base\Http\Core;
use Framework\Base\Injector\Injector;

class Application extends Injector
{
    protected $publicPath;

    protected $router;

    protected $httpCore;

    public function __construct($publicPath, Core $core)
    {
        $this->httpCore   = $core;
        $this->publicPath = $publicPath;
    }

    public function getHttpCore()
    {
        return $this->httpCore;
    }

    public function mapEntities()
    {

    }

    public function build($contract)
    {
        parent::build($contract);
    }

}
