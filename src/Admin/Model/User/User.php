<?php

namespace App\Admin\Model\User;

use App\Engine\Core\Database\ActiveRecord;
use App\Engine\Model;

class User
{
    use ActiveRecord;

    protected string $table = 'user';
    private int $id;
    private string $name;
    private string $email;
    private string $pass;
    private mixed $dateRegistration;
    private string $role;
    private string $hash;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->pass;
    }

    public function setPassword(string $pass): void
    {
        $this->pass = $pass;
    }

    public function getDateRegistration(): mixed
    {
        return $this->dateRegistration;
    }

    public function setDateRegistration(mixed $dateRegistration): void
    {
        $this->dateRegistration = $dateRegistration;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

}