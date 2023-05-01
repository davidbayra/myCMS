<?php

namespace App\Engine\Service\View;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    public string $serviceName = 'view';

    public function init(): void
    {
        $view = new View();
        $this->di->set($this->serviceName, $view);
    }
}