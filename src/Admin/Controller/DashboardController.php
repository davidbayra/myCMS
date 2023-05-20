<?php

namespace App\Admin\Controller;

use App\Engine\Controller;
use stdClass;

class DashboardController extends Controller
{
    public function indexAction(): void
    {
        echo '<pre>';

        $userModel = $this->load->model('user');
        var_dump($userModel);

        $userModel->repository->getUsers();

        $this->view->render('dashboard');

//        $stdClass = new stdClass();
//        $stdClass->repo = \App\Admin\Model\User\UserRepository::class;
//        var_dump($stdClass);
//        print_r($stdClass->repo->getName());


    }

}