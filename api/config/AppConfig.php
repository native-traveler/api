<?php

namespace api\config;


use Phalcon\Exception;
use Phalcon\Mvc\Micro;

class AppConfig
{
    private $_app;

    public function __construct(Micro $app)
    {
        $this->_app = $app;
    }

    public function beforeResponse()
    {
        $app = $this->_app;
        $this->_app->after(function () use ($app) {
            // Getting the return value of method
            $return = $app->getReturnedValue();

            if (is_array($return)) {
                // Transforming arrays to JSON
                $app->response->setContent(json_encode($return));
            } elseif (!strlen($return)) {
                // Successful response without any content
                $app->response->setStatusCode('204', 'No Content');
            } else {
                // Unexpected response
                throw new Exception('Bad Response');
            }

            // Sending response to the client
            $app->response->send();
        });
    }

    public function addRoutes()
    {
        $routes = new RouteCollection();

        $this->_app->notFound(function () {
            throw new \Phalcon\Http\Response\Exception('Страница ненайдена');
        });


        $this->_app->mount($routes->defaultRoute());
        $this->_app->mount($routes->testRoute());
    }
}
