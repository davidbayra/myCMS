<?php

namespace App\Temp;

use PDO;
class ProductRepository
{
    protected $pdo;
    protected function getPDO(): PDO
    {
        if ($this->pdo === null){
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            try{
                $config = require_once __DIR__ . '/../src/Engine/Config/config.php';
                $hostDbname = "mysql:host={$config['host']};dbname={$config['db_name']};charset=utf8";
                $this->pdo = new PDO($hostDbname, $config['username'], $config['pass'], $options);
            } catch (\PDOException $PDOException) {
                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }

        return $this->pdo;
    }

    public function fetchProducts(): array
    {
       return $this->getPDO()->prepare('SELECT * FROM cms_db.users')->fetchAll(PDO::FETCH_ASSOC);
    }
}