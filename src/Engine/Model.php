<?php

namespace App\Engine;

use App\Engine\Core\Database\QueryBuilder;
use App\Engine\DI\DI;

abstract class Model
{
    protected $db;
    protected $config;
    protected $queryBuilder;
    public function __construct(protected DI $di)
    {
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');
        $this->queryBuilder = new QueryBuilder();
    }
}