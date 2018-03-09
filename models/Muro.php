<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "muro".
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $image_id
 * @property string $content
 *
 * @property Image $image
 * @property MuroComentario[] $muroComentarios
 * @property Comentario[] $comentarios
 */
class Muro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'muro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'image_id'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alumno_id' => 'Alumno ID',
            'image_id' => 'Image ID',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuroComentarios()
    {
        return $this->hasMany(MuroComentario::className(), ['muro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['id' => 'comentario_id'])->viaTable('muro_comentario', ['muro_id' => 'id']);
    }
}
