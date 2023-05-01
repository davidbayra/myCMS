<?php

namespace App\Admin\Controller;

use App\Engine\Controller;
use App\Engine\Core\Auth\Auth;
use App\Engine\DI\DI;

class AdminController extends Controller
{
    protected Auth $auth;

    public function __construct(DI $di)
    {
        parent::__construct($di);
        echo 'sdfsdf';
        $this->auth = new Auth();
        $this->checkAuthorization();
    }

    public function checkAuthorization(): void
    {
        if (!$this->auth->authorized()){
            // redirect
            header('Location: /login', true, 301);
            exit;
        }
    }
}