<?php

declare(strict_types=1);

namespace App\Engine\Core\Router;

class DispatchedRoute
{
    public function __construct(private string $controller, private array $parameters = []){}

    public function getController(): string
    {
        return $this->controller;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
