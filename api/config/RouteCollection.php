<?php

namespace api\config;

use Phalcon\Mvc\Micro\Collection;

class RouteCollection
{
    public function defaultRoute()
    {
        $route = new Collection();
        $route->setHandler('api\controllers\MainController', true);
        $route->setPrefix('/');
        $route->get('/', 'index');

        return $route;
    }

    public function testRoute()
    {
        $route = new Collection();
        $route->setHandler('api\controllers\TestController', true);
        $route->setPrefix('/test');
        $route->get('/', 'index');

        return $route;
    }
}