<?php

namespace App\Engine\Service\Request;

use App\Engine\Core\Request\Request;
use App\Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public string $serviceName = 'request';

    public function init(): void
    {
        $request = new Request();
        $this->di->set($this->serviceName, $request);
    }
}