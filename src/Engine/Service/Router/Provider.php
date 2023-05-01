<?php

namespace App\Engine\Service\Router;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    public string $serviceName = 'router';

    public function init(): void
    {
        $router = new Router('localhost/index');
        $this->di->set($this->serviceName, $router);
    }
}
