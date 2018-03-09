<?php

use yii\db\Migration;

/**
 * Handles the creation of table `muro_comentario`.
 * Has foreign keys to the tables:
 *
 * - `muro`
 * - `comentario`
 */
class m180307_032703_create_junction_muro_and_comentario_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('muro_comentario', [
            'muro_id' => $this->integer(),
            'comentario_id' => $this->integer(),
            'PRIMARY KEY(muro_id, comentario_id)',
        ]);

        // creates index for column `muro_id`
        $this->createIndex(
            'idx-muro_comentario-muro_id',
            'muro_comentario',
            'muro_id'
        );

        // add foreign key for table `muro`
        $this->addForeignKey(
            'fk-muro_comentario-muro_id',
            'muro_comentario',
            'muro_id',
            'muro',
            'id',
            'CASCADE'
        );

        // creates index for column `comentario_id`
        $this->createIndex(
            'idx-muro_comentario-comentario_id',
            'muro_comentario',
            'comentario_id'
        );

        // add foreign key for table `comentario`
        $this->addForeignKey(
            'fk-muro_comentario-comentario_id',
            'muro_comentario',
            'comentario_id',
            'comentario',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `muro`
        $this->dropForeignKey(
            'fk-muro_comentario-muro_id',
            'muro_comentario'
        );

        // drops index for column `muro_id`
        $this->dropIndex(
            'idx-muro_comentario-muro_id',
            'muro_comentario'
        );

        // drops foreign key for table `comentario`
        $this->dropForeignKey(
            'fk-muro_comentario-comentario_id',
            'muro_comentario'
        );

        // drops index for column `comentario_id`
        $this->dropIndex(
            'idx-muro_comentario-comentario_id',
            'muro_comentario'
        );

        $this->dropTable('muro_comentario');
    }
}
