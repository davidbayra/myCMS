<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Engine\CMS;
use App\Engine\DI\DI;

const APP_DIR = __DIR__ . '/../src/';
const ROOT_DIR = __DIR__ . '/../';

define("ENV", $_SERVER['ENV']);

try {
    $di = new DI();
    $services = require_once __DIR__ . '/../src/Engine/Config/Service.php';

    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new CMS($di);
    $cms->run();

} catch(\ErrorException $e) {
    echo $e->getMessage();
}














//$router = new \App\Router();
//
//$router->get('/index', function (array $params = ['user' => 'Mahmut']) {
//    echo 'Home page: ' . $params;
//});
//
//$router->get('/about', function (array $params = ['user' => 'Mahmut']) {
//    echo 'About page: '. $params['user'];
//});
//
//$router->get('/contact', function () {
//        require_once __DIR__  . '/../temp/contact.phtml';
//    }
//);
//
//$router->post('/contact', function () {
//        var_dump($_POST);
//    }
//);
//
//$router->addNotFoundHandler(function () {
//    $title = 'Not Found';
//    require_once __DIR__ . '/../temp/template.phtml';
//});
//
//$router->run();



































//use Framework\Http\Kernel;
//use Framework\Http\Request;
//use Framework\Http\Response;

//try {
//
//    $config = require_once __DIR__ . '/../src/engine/Config/config.php';
//    $dsn = "mysql:host={$config['host']};dbname={$config['db_name']};charset=utf8";
//    $link = new PDO($dsn, $config['username'], $config['pass']);
//
////    $conn = new PDO("mysql:host=db;dbname=cms_db", "root", "");
//    echo "Database connection established";
//}
//catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}

//
//$request = Request::createFromGlobals();
//
//$kernel = new Kernel();
//$response = $kernel->handle($request);
//$response->send();
