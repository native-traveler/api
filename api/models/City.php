<?php

namespace api\models;

use api\components\base\BaseModel;

class City extends BaseModel
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
     * @Column(type="string", length=200, nullable=false)
     */
    public $external_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(type="integer", length=32, nullable=false)
     */
    public $status_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("city");
        $this->hasMany('id', 'Hotel', 'city_id', ['alias' => 'Hotel']);
        $this->belongsTo('status_id', '\Status', 'id', ['alias' => 'Status']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'city';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return City[]|City|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return City|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
