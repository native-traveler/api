<?php

namespace api\config;


use Phalcon\Db\Adapter\Pdo\Postgresql;
use Phalcon\DI\FactoryDefault;
use Phalcon\Security;
use Phalcon\Http\Response\Cookies;
use Phalcon\Session\Adapter\Files;
use Phalcon\Crypt;
use Phalcon\Http\Response;

class AppFactory extends FactoryDefault
{
    private $_config;

    public function __construct($config)
    {
        parent::__construct();

        $this->_config = $config;

        $this->setDb();
        $this->setSecur();
        $this->setCrypt();
        $this->setCoockie();
        $this->setSession();
        $this->handleResponse();
    }

    private function setDb()
    {
        $this->set(
            "db",
            function () {

                return new Postgresql((array) $this->_config->database);
            }
        );
    }

    private function handleResponse()
    {
        $this->setShared(
            'response',
            function () {
                $response = new Response();
                $response->setContentType('application/json', 'utf-8');

                return $response;
            }
        );
    }

    private function setSecur()
    {
        $this->setShared(
            'security',
            function (){
                $security = new Security();
                $security->setWorkFactor(12);

                return $security;
        });
    }

    private function setCoockie()
    {
        $this->set(
            'cookies',
            function () {
                $cookies = new Cookies();
                $cookies->useEncryption(true);

                return $cookies;
        });
    }

    private function setCrypt()
    {
        $this->set(
            'crypt',
            function () {
                $crypt = new Crypt();
                $crypt->setMode(MCRYPT_MODE_CFB);
                $crypt->setKey('vJ4RIGAGg6vJ9lAD');

                return $crypt;
        });
    }

    private function setSession()
    {
        $this->setShared(
            'session',
            function () {
                $session = new Files();
                $session->start();

                return $session;
        });
    }
}