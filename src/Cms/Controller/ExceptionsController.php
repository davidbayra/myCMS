<?php

namespace App\Cms\Controller;

use App\Engine\Controller;
use App\Engine\DI\DI;

class ExceptionsController extends Controller
{
    public function page404(): void
    {
        echo 'page 404';
    }
}