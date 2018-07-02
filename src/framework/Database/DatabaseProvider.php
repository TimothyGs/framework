<?php
namespace Framework\Database;

use Framework\Core\Provider;

class DatabaseProvider extends Provider
{
    public function register()
    {
        $this->app->bind();
    }
}
