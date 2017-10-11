<?php

namespace api\config;

use Phalcon\Mvc\Micro\Collection;

class RouteCollection
{
    public function defaultRoute()
    {
        $route = new Collection();
        $route->setHandler('api\controllers\IndexController', true);
        $route->setPrefix('/api-internal');
        $route->get('/', 'index');

        return $route;
    }

    public function testRoute()
    {
        $route = new Collection();
        $route->setHandler('api\controllers\TestController', true);
        $route->setPrefix('/api-internal/test');
        $route->get('/', 'index');

        return $route;
    }
}