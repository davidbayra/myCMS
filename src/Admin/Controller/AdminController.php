<?php

namespace App\Admin\Controller;

use App\Engine\Controller;
use App\Engine\Core\Auth\Auth;
use App\Engine\DI\DI;
use JetBrains\PhpStorm\NoReturn;

class AdminController extends Controller
{
    protected array $data = [];
    protected Auth $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();
        if ($this->auth->hashUser() === null) {
            header('Location: /login');
            exit;
        }
    }

    #[NoReturn] public function logout(): void
    {
        $this->auth->logOut();
        header('Location: /login');
        exit;
    }

}
