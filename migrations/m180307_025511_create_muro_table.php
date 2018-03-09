<?php

use yii\db\Migration;

/**
 * Handles the creation of table `muro`.
 */
class m180307_025511_create_muro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('muro', [
            'id' => $this->primaryKey(),
            'alumno_id'=>$this->integer(),
            'image_id'=>$this->integer(),
            'content'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('muro');
    }
}
