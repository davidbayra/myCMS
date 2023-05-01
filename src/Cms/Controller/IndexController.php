<?php

namespace App\Cms\Controller;

use App\Engine\Controller;

class IndexController extends Controller
{
    public function indexAction(): void
    {
        $data = [
            'name' => 'dave'
        ];
        $this->view->render('Index', $data);
    }
}
