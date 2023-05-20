<?php

//require_once __DIR__ . '/../vendor/autoload.php';

const APP_DIR = __DIR__ . '/../src/';
const ROOT_DIR = __DIR__ . '/../';

define("ENV", $_SERVER['ENV']);

require_once __DIR__ . '/../src/Engine/bootstrap.php';






































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
