<?php

declare(strict_types=1);

namespace App\Engine;

use App\Engine\Core\Database\QueryBuilder;
use App\Engine\DI\DI;

abstract class Model
{
    protected mixed $db;
    protected mixed $config;
    protected QueryBuilder $queryBuilder;
    public function __construct(protected DI $di)
    {
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');
        $this->queryBuilder = new QueryBuilder();
    }
}