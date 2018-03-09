<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property int $id
 * @property int $alumno_id
 * @property string $comentario
 *
 * @property Alumnos $alumno
 * @property MuroComentario[] $muroComentarios
 * @property Muro[] $muros
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id'], 'integer'],
            [['comentario'], 'string', 'max' => 255],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::className(), 'targetAttribute' => ['alumno_id' => 'id']],
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
            'comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumnos::className(), ['id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuroComentarios()
    {
        return $this->hasMany(MuroComentario::className(), ['comentario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuros()
    {
        return $this->hasMany(Muro::className(), ['id' => 'muro_id'])->viaTable('muro_comentario', ['comentario_id' => 'id']);
    }
}
