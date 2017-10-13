<?php

namespace api\controllers;

use api\components\services\cacheService\CacheService;
use Phalcon\Mvc\Controller;

class TestController extends Controller
{
    public function index()
    {
        var_dump(CacheService::getStatusIdByName('inactive'));

        return ['Test page'];
    }
}