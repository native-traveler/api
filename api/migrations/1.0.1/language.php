<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class LanguageMigration_100
 */
class LanguageMigration_101 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('language', [
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
                        'status_id',
                        [
                            'type' => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'after' => 'id'
                        ]
                    ),
                    new Column(
                        'code',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 15,
                            'after' => 'status_id'
                        ]
                    ),
                    new Column(
                        'name',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 100,
                            'after' => 'code'
                        ]
                    ),
                    new Column(
                        'title',
                        [
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 100,
                            'after' => 'name'
                        ]
                    )
                ],
                'references' => [
                    new Reference(
                        'language_2_status',
                        [
                            'referencedTable' => 'status',
                            'columns' => ['status_id'],
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
        $this->batchInsert('language', ['code', 'name', 'title']);
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
