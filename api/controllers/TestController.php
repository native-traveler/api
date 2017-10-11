<?php

namespace api\controllers;


use Phalcon\Mvc\Controller;

class TestController extends Controller
{
    public function index()
    {
        $this->db->connect();

        return ['Test page'];
    }
}