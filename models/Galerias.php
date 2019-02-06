<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galerias".
 *
 * @property int $id
 * @property string $imagen
 * @property int $juego_id
 *
 * @property Juegos $juego
 */
class Galerias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galerias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagen'], 'required'],
            [['imagen'], 'string'],
            [['juego_id'], 'default', 'value' => null],
            [['juego_id'], 'integer'],
            [['juego_id'], 'exist', 'skipOnError' => true, 'targetClass' => Juegos::className(), 'targetAttribute' => ['juego_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imagen' => 'Imagen',
            'juego_id' => 'Juego ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJuego()
    {
        return $this->hasOne(Juegos::className(), ['id' => 'juego_id']);
    }
}
