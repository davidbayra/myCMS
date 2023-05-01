<?php

namespace App\Cms\Controller;

use App\Engine\Controller;
use App\Engine\DI\DI;

class ProductController extends Controller
{
    public function indexAction(): void
    {
        echo 'Product';
    }

    public function idAction($id): void
    {
        echo 'Product: ' . $id;
    }
}
