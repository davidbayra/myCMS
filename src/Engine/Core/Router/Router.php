<?php

declare(strict_types=1);

namespace App\Engine\Core\Router;

class Router
{
    private array $routers = [];

    //    private string $host;

    //    public function __construct(string $host)
    //    {
    //        $this->host = $host;
    //    }

    public function add(string $key, string $pattern, string $controller, string $method = 'GET'): void
    {
        $this->routers[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch(string $method, string $uri): ?DispatchedRoute
    {
        $dispatcher = new UrlDispatcher();

        foreach ($this->routers as $router) {
            $dispatcher->register(
                $router['method'],
                $router['pattern'],
                $router['controller']
            );
        }

        return $dispatcher->dispatch($method, $uri);
    }
}
