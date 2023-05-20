<?php

$this->router->add('index', '/', 'DashboardController/indexAction', 'GET');
$this->router->add('login', '/login/', 'LoginController/loginAction', 'GET');
$this->router->add('auth', '/auth/', 'LoginController/authAdmin', 'POST');
$this->router->add('logout', '/logout/', 'AdminController/logout', 'GET');

