<?php

namespace App\Engine\Core\Database;

class QueryBuilder
{
    protected array $sql = [];
    public array $values = [];

    public function select($fields = '*'): static
    {
        $this->reset();
        $this->sql['select'] = "SELECT {$fields} ";
        return $this;
    }

    public function from($table): static
    {
        $this->sql['from'] = "FROM {$table} ";
        return $this;
    }

    public function where($column, $value, $operator = "="): static
    {
        $this->sql['where'][] = "{$column} {$operator} ?";
        $this->values[] = $value;
        return $this;
    }

    public function orderBy($field, $order): static
    {
        $this->sql['order_by'] = "ORDER BY {$field} {$order}";
        return $this;
    }

    public function limit($number): static
    {
        $this->sql['limit'] = " LIMIT {$number}";
        return $this;
    }

    public function update($table): static
    {
        $this->reset();
        $this->sql['update'] = "UPDATE {$table} ";
        return $this;
    }

    public function insert($table): static
    {
        $this->reset();
        $this->sql['insert'] = "INSERT INTO {$table} ";
        return $this;
    }

    public function set(array $data = []): static
    {

        $this->sql['set'] = "SET ";

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->sql['set'] .= "{$key} = ?";
                if (next($data)) {
                    $this->sql['set'] .= ", ";
                }
                $this->values[] = $value;
            }
        }

        return $this;
    }

    public function getQuery(): string
    {
        $sql = '';

        if (!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                if ($key === 'where') {
                    $sql .= ' WHERE ';
                    foreach ($value as $where) {
                        $sql .= $where;
                        if (count($value) > 1 and next($value)) {
                            $sql .= ' AND ';
                        }
                    }
                } else {
                    $sql .= $value;
                }
            }
        }

        return $sql;
    }

    public function reset(): void
    {
        $this->sql = [];
        $this->values = [];
    }

}
