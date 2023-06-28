<?php

namespace App\Admin\Controller;

use App\Engine\Controller;

class DashboardController extends AdminController
{
    public function indexAction(): void
    {
//                $userModel = $this->load->model('user');
//                $userModel->repository->testChangeUser();
        //
        //        echo '<pre>';
        //        var_dump($userModel->repository->getUsers());
        $this->view->render('dashboard');
    }
}
