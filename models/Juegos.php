<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juegos".
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $precio
 * @property string $dev
 * @property string $publisher
 * @property string $fecha_salida
 * @property int $portada
 *
 * @property Comentarios[] $comentarios
 * @property Galerias[] $galerias
 */
class Juegos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juegos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['descripcion'], 'string'],
            [['precio'], 'number'],
            [['fecha_salida'], 'safe'],
            [['portada'], 'default', 'value' => null],
            [['portada'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['dev', 'publisher'], 'string', 'max' => 32],
            [['titulo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'dev' => 'Dev',
            'publisher' => 'Publisher',
            'fecha_salida' => 'Fecha Salida',
            'portada' => 'Portada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['juego_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalerias()
    {
        return $this->hasMany(Galerias::className(), ['juego_id' => 'id']);
    }
}
