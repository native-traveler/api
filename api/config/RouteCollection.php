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

    public function languageRoute()
    {
        $route = new Collection();
        $route->setHandler('api\controllers\LanguageController', true);
        $route->setPrefix('/language');
        $route->get('/get-list', 'getList');

        return $route;
    }
}