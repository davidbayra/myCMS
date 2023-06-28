<?php

declare(strict_types=1);

namespace App\Engine\Core\Router;

class UrlDispatcher
{
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    private array $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function routes(string $method): array
    {
        return $this->routes[$method];
    }

//    public function dispatch(string $method, string $uri): ?DispatchedRoute
//    {
//        foreach ($this->routes($method) as $route => $controller) {
//            $pattern = sprintf("#^%s\$#s", $route);
//            if (preg_match($pattern, $uri, $parameters)) {
//                return new DispatchedRoute($controller, $parameters);
//            }
//        }
//
//        return null;
//    }

    private function processParam($parameters): mixed
    {
        foreach($parameters as $key => $value) {
            if(is_int($key)) {
                unset($parameters[$key]);
            }
        }

        return $parameters;
    }

    public function dispatch($method, $uri): ?DispatchedRoute
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri): ?DispatchedRoute
    {
        foreach($this->routes($method) as $route => $controller) {
            $pattern = sprintf("#^%s\$#s", $route);

            if(preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
        return null;
    }

    public function register(mixed $method, mixed $pattern, mixed $controller): void
    {
        $convertPattern = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convertPattern] = $controller;
    }

    private function convertPattern(string $pattern): array|string|null
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
