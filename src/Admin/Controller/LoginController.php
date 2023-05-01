<?php

namespace App\Admin\Controller;

use App\Engine\Controller;

class LoginController extends Controller
{
    public function indexAction(): void
    {
        echo 'login';
        $this->view->render('login');
    }

}