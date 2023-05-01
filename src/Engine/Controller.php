<?php

namespace App\Engine;

use App\Engine\DI\DI;
abstract class Controller
{
    protected DI $di;
    protected $view;
    protected $config;
    protected $request;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');

    }
}
