<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class UserMigration_100
 */
class UserMigration_101 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('user', [
                'columns' => [
                    new Column(
                        'id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'primary' => true,
                            'autoIncrement' => true,
                            'first' => true
                        ]
                    ),
                    new Column(
                        'login',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 255,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'password',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 60,
                            'after' => 'login'
                        ]
                    ),
                    new Column(
                        'status_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'after' => 'password'
                        ]
                    ),
                    new Column(
                        'type_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'after' => 'status_id'
                        ]
                    ),
                    new Column(
                        'created_date',
                        [
                            'type' => Column::TYPE_TIMESTAMP,
                            'default' => "CURRENT_TIMESTAMP",
                            'size' => 1,
                            'after' => 'type_id'
                        ]
                    ),
                    new Column(
                        'updated_date',
                        [
                            'type' => Column::TYPE_TIMESTAMP,
                            'default' => "CURRENT_TIMESTAMP",
                            'size' => 1,
                            'after' => 'created_date'
                        ]
                    ),
                    new Column(
                        'deleted_date',
                        [
                            'type' => Column::TYPE_TIMESTAMP,
                            'size' => 1,
                            'after' => 'updated_date'
                        ]
                    )
                ],
                'references' => [
                    new Reference(
                        'user_2_status',
                        [
                            'referencedTable' => 'status',
                            'columns' => ['status_id'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'SET NULL'
                        ]
                    ),
                    new Reference(
                        'user_2_type',
                        [
                            'referencedTable' => 'type',
                            'columns' => ['type_id'],
                            'referencedColumns' => ['id'],
                            'onUpdate' => 'CASCADE',
                            'onDelete' => 'SET NULL'
                        ]
                    )
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
