<?php

namespace api\models;

use api\components\base\BaseModel;

class Status extends BaseModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=32, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $title;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("status");
        $this->hasMany('id', 'City', 'status_id', ['alias' => 'City']);
        $this->hasMany('id', 'Hotel', 'status_id', ['alias' => 'Hotel']);
        $this->hasMany('id', 'Language', 'status_id', ['alias' => 'Language']);
        $this->hasMany('id', 'User', 'status_id', ['alias' => 'User']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'status';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Status[]|Status|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Status|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
