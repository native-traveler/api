<?php

return new \Phalcon\Config([
    'database' => [
        'adapter' => 'Sqlite',
        'dbname'=> __DIR__ . '/../../db/db.sqlite'
    ],
    'application' => [
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/',
        'baseUri' => '/',
    ],
]);