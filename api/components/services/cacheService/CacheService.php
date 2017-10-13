<?php

namespace api\components\services\cacheService;


use api\components\exceptions\UserException;
use api\components\helpers\ArrayHelper;
use api\models\Status;

class CacheService
{
    private static $_statuses = [];

    private static function setStatuses()
    {
        self::$_statuses = ArrayHelper::map(Status::find()->toArray(), 'id', 'name');
    }


    public static function getStatusIdByName($name)
    {
        if (empty(self::$_statuses)) {
            self::setStatuses();
        }

        if (($foundId = array_search($name, self::$_statuses))) {

            return $foundId;

        } else {

            throw new UserException('Статус с именем "' . $name . '" не найден.');
        }
    }
}
