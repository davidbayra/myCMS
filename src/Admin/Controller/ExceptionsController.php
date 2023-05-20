<?php

namespace App\Admin\Controller;

use App\Engine\Controller;
use App\Engine\DI\DI;

class ExceptionsController extends AdminController
{
    public function page404(): void
    {
        echo 'page 404';
    }
}