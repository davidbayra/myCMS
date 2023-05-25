<?php

namespace App\Cms\Controller;

use App\Engine\Controller;

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
