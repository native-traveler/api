<?php

namespace api\models;

use api\components\base\BaseModel;

class User extends BaseModel
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
     * @Column(type="string", length=255, nullable=false)
     */
    public $login;

    /**
     *
     * @var string
     * @Column(type="string", length=60, nullable=false)
     */
    public $password;

    /**
     *
     * @var integer
     * @Column(type="integer", length=32, nullable=false)
     */
    public $status_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=32, nullable=false)
     */
    public $type_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $created_date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $updated_date;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $deleted_date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("user");
        $this->belongsTo('status_id', '\Status', 'id', ['alias' => 'Status']);
        $this->belongsTo('type_id', '\Type', 'id', ['alias' => 'Type']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]|User|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
