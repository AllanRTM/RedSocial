<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m180307_025758_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'url'=>$this->string(),
        ]);
        $this->addColumn('alumnos', 'image_id', $this->integer());
        $this->addForeignKey('fk_alumnos_image','alumnos','image_id','image','id');
        $this->addForeignKey('fk_muro_image','muro','image_id','image','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('image');
    }
}
