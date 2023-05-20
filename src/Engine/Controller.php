<?php
declare(strict_types=1);

namespace App\Engine;

use App\Engine\DI\DI;
abstract class Controller
{
    protected mixed $view;
    protected mixed $config;
    protected mixed $request;
    protected mixed $db;
    protected mixed $load;

    public function __construct(protected DI $di)
    {
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load = $this->di->get('load');
    }
}
