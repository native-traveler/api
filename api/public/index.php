<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Config\Adapter\Ini as ConfigIni;

use api\config\AppConfig;
use api\config\AppFactory;

try {

    $config = new ConfigIni(__DIR__ . '/../config/config.ini', INI_SCANNER_RAW);
    $configLocal = new ConfigIni(__DIR__ . '/../config/config.local.ini', INI_SCANNER_RAW);
    $config->merge($configLocal);

    $loader = new Loader();
    $loader->registerDirs(
        [
            __DIR__ . $config->phalcon->controllersDir,
            __DIR__ . $config->phalcon->modelsDir,
        ]
    )->registerNamespaces(
        [
            'api' => __DIR__ . $config->phalcon->nameSpace,
        ]
    )->register();

    $app = new Micro((new AppFactory($config)));
    $appConfig = new AppConfig($app);
    $appConfig->beforeResponse();
    $appConfig->addRoutes();

    $app->handle();

} catch(\Exception $e) {

    echo "PhalconException: ", $e->getMessage();

} catch(\Error $e) {

    echo "PhalconException: ", $e->getMessage();
}
