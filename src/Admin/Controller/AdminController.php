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

        $this->auth = new Auth();

//        $this->checkAuthorization();

        if ($this->auth->hashUser() === null){
            header('Location: /login/'); exit;
        }
    }

    public function checkAuthorization(): void
    {
        if ($this->auth->hashUser() !== null){
            $this->auth->authorize($this->auth->hashUser());
        }

        if (!$this->auth->authorized()){
            // redirect
            header('Location: /login/'); exit;
        }
    }

    public function logout(): void
    {
        $this->auth->logOut();
        header('Location: /login/'); exit;
    }

}