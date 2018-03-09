<?php

use yii\db\Migration;

/**
 * Handles the creation of table `commentario`.
 */
class m180307_032008_create_comentario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comentario', [
            'id' => $this->primaryKey(),
            'alumno_id'=>$this->integer(),
            'comentario'=>$this->string(),
        ]);
        $this->addForeignKey('fk_comentario_alumno','comentario','alumno_id','alumnos','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comentario');
    }
}
