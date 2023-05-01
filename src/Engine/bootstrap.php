<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Engine\CMS;
use App\Engine\DI\DI;

try {
    $di = new DI();
    $services = require_once __DIR__ . '/Config/Service.php';

    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new CMS($di);
    $cms->run();

} catch(\ErrorException $e) {
    echo $e->getMessage();
}
