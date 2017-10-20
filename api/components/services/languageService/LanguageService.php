<?php

namespace api\components\services\languageService;


use api\components\helpers\ArrayHelper;
use api\models\Language;

class LanguageService
{
    public function getList()
    {
        $languages = Language::find(['order' => 'title'])->toArray();

        $return = [];
        foreach ($languages as $language) {

            $return[] = [
                'id' => $language['id'],
                'title' => $language['name'],
            ];
        }

        return $return;
    }
}
