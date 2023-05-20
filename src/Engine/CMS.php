<?php

namespace App\Engine;

use App\Engine\Core\Router\DispatchedRoute;
use App\Engine\DI\DI;
use App\Engine\Helper\Common;
use App\Engine\Core\Router\Router;

class CMS
{
    public Router $router;

    public function __construct(private readonly DI $di)
    {
        $this->router = $this->di->get('router') ?? null;
    }

    public function run(): void
    {
        try {
            require_once __DIR__ . '/../' . $_SERVER['ENV'] . '/Routes.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());
            if (!$routerDispatch) {
                $routerDispatch = new DispatchedRoute('ExceptionsController/page404');
            }

            list($class, $action) = explode('/', $routerDispatch->getController(), 2);

            $controller = 'App\\'. $_SERVER['ENV'] . '\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();

            call_user_func_array([new $controller($this->di), $action], array_values($parameters));
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}
