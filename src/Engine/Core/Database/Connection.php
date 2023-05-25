<?php

namespace App\Engine\Core\Database;

use App\Engine\Core\Config\Config;
use Exception;
use PDO;

class Connection
{
    private PDO $link;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        return $this->connect();
    }

    /**
     * @throws Exception
     */
    private function connect(): static
    {
        $config = Config::file('database');
        $hostDbname = "mysql:host={$config['host']};dbname={$config['db_name']};charset=utf8";
        $this->link = new PDO($hostDbname, $config['username'], $config['pass']);

        return $this;
    }

    public function execute($sql, array $values = []): bool
    {
        $statement = $this->link->prepare($sql);

        return $statement->execute($values);
    }

    public function query($sql, array $values = []): bool|array
    {
        $statement = $this->link->prepare($sql);
        $statement->execute($values);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId(): false|string
    {
        return $this->link->lastInsertId();
    }
}
