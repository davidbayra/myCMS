<?php

namespace App\Engine\Service\Config;

use App\Engine\Service\AbstractProvider;
use App\Engine\Core\Config\Config;
use Exception;

class Provider extends AbstractProvider
{
    public string $serviceName = 'config';

    /**
     * @throws Exception
     */
    public function init(): void
    {
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');
        $this->di->set($this->serviceName, $config);
    }
}