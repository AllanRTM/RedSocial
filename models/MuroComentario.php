<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "muro_comentario".
 *
 * @property int $muro_id
 * @property int $comentario_id
 *
 * @property Comentario $comentario
 * @property Muro $muro
 */
class MuroComentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'muro_comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['muro_id', 'comentario_id'], 'required'],
            [['muro_id', 'comentario_id'], 'integer'],
            [['muro_id', 'comentario_id'], 'unique', 'targetAttribute' => ['muro_id', 'comentario_id']],
            [['comentario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comentario::className(), 'targetAttribute' => ['comentario_id' => 'id']],
            [['muro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Muro::className(), 'targetAttribute' => ['muro_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'muro_id' => 'Muro ID',
            'comentario_id' => 'Comentario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentario()
    {
        return $this->hasOne(Comentario::className(), ['id' => 'comentario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuro()
    {
        return $this->hasOne(Muro::className(), ['id' => 'muro_id']);
    }
}
