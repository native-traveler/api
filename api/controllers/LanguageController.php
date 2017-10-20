<?php

namespace api\controllers;

use api\components\base\BaseController;
use api\components\services\languageService\LanguageService;

class LanguageController extends BaseController
{
    public function getList()
    {
        return (new LanguageService())->getList();
    }
}