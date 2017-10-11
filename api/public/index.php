<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;

use api\config\AppConfig;
use api\config\AppFactory;

try {
    $loader = new Loader();
    $loader->registerDirs(
        [
            __DIR__ . '/../controllers/',
            __DIR__ . '/../models/',
        ]
    )->registerNamespaces(
        [
            'api' => __DIR__ . '/../',
        ]
    )->register();

    $app = new Micro((new AppFactory()));
    $appConfig = new AppConfig($app);
    $appConfig->beforeResponse();
    $appConfig->addRoutes();

    $app->handle();

} catch(\Exception $e) {

    echo "PhalconException: ", $e->getMessage();

} catch(\Error $e) {

    echo "PhalconException: ", $e->getMessage();
}
