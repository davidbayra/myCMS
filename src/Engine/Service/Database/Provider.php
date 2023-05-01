<?php

namespace App\Engine\Service\Database;

use App\Engine\Core\Database\Connection;
use App\Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public string $serviceName = 'db';

    public function init(): void
    {
        $db = new Connection();
        $this->di->set($this->serviceName, $db);
    }
}
