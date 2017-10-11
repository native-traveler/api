<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class UserMigration_100
 */
class UserMigration_100 extends Migration
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
                        "id",
                        [
                            "type"          => Column::TYPE_INTEGER,
                            "size"          => 10,
                            "unsigned"      => true,
                            "notNull"       => true,
                            "autoIncrement" => true,
                            "first"         => true,
                        ]
                    ),
                    new Column(
                        "login",
                        [
                            "type"          => Column::TYPE_VARCHAR,
                            "size"          => 100,
                            "notNull"       => true,
                        ]
                    ),
                    new Column(
                        "password",
                        [
                            "type"          => Column::TYPE_VARCHAR,
                            "size"          => 64,
                            "notNull"       => true,
                        ]
                    ),
                    new Column(
                        "create",
                        [
                            "type"          => Column::TYPE_DATETIME,
                        ]
                    ),
                ],
                "indexes" => [
                    new Index(
                        "PRIMARY",
                        [
                            "id",
                        ]
                    ),
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
