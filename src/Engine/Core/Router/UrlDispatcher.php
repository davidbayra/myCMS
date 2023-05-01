<?php

namespace App\Engine\Core\Router;
class UrlDispatcher
{
    private array $methods = [
        'GET',
        'POST'
    ];

    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    private array $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function routes($method)
    {
        return $this->routes[$method] ?? [];
    }

    public function addPatterns($key, $pattern): void
    {
        $this->patterns[$key] = $pattern;
    }

    public function dispatch($method, $uri): ?DispatchedRoute
    {
        $routes = $this->routes(strtoupper($method));

//        if (array_key_exists($uri, $routes)){
//            return new DispatchedRoute($routes[$uri]);
//        }

        return $this->doDispatch($method, $uri);
    }

    public function doDispatch($method, $uri)
    {
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = sprintf("#^%s\$#s", $route);
            if (preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $parameters);
            }

        }

    }

    public function register(mixed $method, mixed $pattern, mixed $controller): void
    {
        $convertPattern = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convertPattern] = $controller;
    }

    public function convertPattern($pattern)
    {
        return strpos($pattern, '(')
            ? preg_replace_callback('/\((\w+):(\w+)\)/', [$this, 'replacePattern'], $pattern)
            : $pattern;
    }

    private function replacePattern($matches): string
    {
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
    }
}
