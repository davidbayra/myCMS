<?php

$this->router->add('dashboard', '/', 'DashboardController/indexAction', 'GET');
$this->router->add('login', '/login', 'LoginController/loginAction', 'GET');
$this->router->add('auth-admin', '/auth', 'LoginController/authAdmin', 'POST');
$this->router->add('logout', '/logout', 'AdminController/logout', 'GET');

$this->router->add('pages', '/pages', 'PageController/listing', 'GET');
$this->router->add('page-create', '/pages/create', 'PageController/create', 'GET');
$this->router->add('page-add', '/page/add', 'PageController/add', 'POST');
$this->router->add('page-update', '/page/update', 'PageController/update', 'POST');
$this->router->add('page-edit', '/pages/edit/(id:int)', 'PageController/edit', 'GET');
