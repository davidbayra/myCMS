<?php

namespace App\Engine\Core\Router;

class Router
{
    private array $routers = [];
    private $host;
    private UrlDispatcher $dispatcher;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function add($key, $pattern, $controller, $method = 'GET'): void
    {
        $this->routers[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch($method, $uri): ?DispatchedRoute
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    public function getDispatcher(): UrlDispatcher
    {
        // if ($this->dispatcher == null){
        $this->dispatcher = new UrlDispatcher();

        foreach ($this->routers as $router) {
            $this->dispatcher->register(
                $router['method'],
                $router['pattern'],
                $router['controller']
            );
        }
        //}

        return $this->dispatcher;
    }
}
