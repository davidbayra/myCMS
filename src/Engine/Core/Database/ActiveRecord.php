<?php

namespace App\Engine\Core\Database;

use \ReflectionClass;
use \ReflectionProperty;

trait ActiveRecord
{
    protected mixed $db;
    protected QueryBuilder $queryBuilder;

    public function __construct($id = 0)
    {
        global $di;

        $this->db = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function findOne()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->getQuery(),
            $this->queryBuilder->values
        );
        return $find[0] ?? null;
    }

    public function save(): int
    {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder
                        ->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->getQuery(),
                    $this->queryBuilder->values
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder
                        ->insert($this->getTable())
                        ->set($properties)
                        ->getQuery(),
                    $this->queryBuilder->values
                );
            }
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    private function getIssetProperties(): array
    {
        $properties = [];
        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }
        return $properties;
    }

    private function getProperties(): array
    {
        $reflection = new ReflectionClass($this);
        return $reflection->getProperties(ReflectionProperty::IS_PRIVATE);
    }
}
