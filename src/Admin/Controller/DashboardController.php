<?php

namespace App\Admin\Controller;

use App\Engine\Controller;

class DashboardController extends Controller
{
    public function indexAction(): void
    {
        $this->view->render('dashboard');
    }
}