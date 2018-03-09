<?php

use yii\db\Migration;

/**
 * Handles the creation of table `alumnos`.
 */
class m180306_021255_create_alumnos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('alumnos', [
            'id' => $this->primaryKey(),
            'email'=>$this->string()->unique(),
            'password'=>$this->string(),
            'primer_nombre'=>$this->string(),
            'primer_apellido'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('alumnos');
    }
}
