<?php

namespace api\components\base;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

use app\components\base\StatuseModelInterface;

class BaseModel extends Model implements StatuseModelInterface
{
    public function initialize()
    {
        $this->addBehavior(
            new Timestampable(
                [
                    'beforeCreate' => [
                        'field'  => 'updated_date',
                        'format' => "Y-m-d H:i:s",
                    ]
                ]
            )
        );
    }
}