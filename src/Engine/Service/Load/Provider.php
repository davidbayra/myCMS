<?php

namespace App\Engine\Service\Load;

use App\Engine\Load;
use App\Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public string $serviceName = 'load';

    public function init(): void
    {
        $load = new Load();
        $this->di->set($this->serviceName, $load);
    }
}