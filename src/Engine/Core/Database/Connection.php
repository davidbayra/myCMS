<?php

namespace App\Engine\Core\Database;

use App\Engine\Core\Config\Config;
use PDO;

class Connection
{
    private $link;

    public function __construct()
    {
        return $this->connect();
    }

    private function connect(): static
    {

        $config = Config::file('database');
        $hostDbname = "mysql:host={$config['host']};dbname={$config['db_name']};charset=utf8";
        $this->link = new PDO($hostDbname, $config['username'], $config['pass']);

        return $this;
    }
    private function execute($sql)
    {
        $statement = $this->link->prepare($sql);

        return $statement->execute();
    }

    public function query($sql)
    {
        $statement = $this->link->prepare($sql);
        $statement->execute($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?? [];
    }
}
