<?php

$this->router->add('home', '/', 'IndexController/indexAction');
$this->router->add('product', '/product', 'ProductController/indexAction');
$this->router->add('productId', '/product/(id:int)', 'ProductController/idAction');
