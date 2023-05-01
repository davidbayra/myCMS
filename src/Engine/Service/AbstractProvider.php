<?php

namespace App\Engine\Service;

use App\Engine\DI\DI;

abstract class AbstractProvider
{
    public function __construct(protected DI $di)
    {
    }

    abstract public function init();
}
