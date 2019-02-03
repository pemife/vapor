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
 * @property string $imagen
 * @property string $dev
 * @property string $publisher
 * @property string $fecha_salida
 *
 * @property Comentarios[] $comentarios
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
            [['descripcion', 'imagen'], 'string'],
            [['precio'], 'number'],
            [['fecha_salida'], 'safe'],
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
            'imagen' => 'Imagen',
            'dev' => 'Dev',
            'publisher' => 'Publisher',
            'fecha_salida' => 'Fecha Salida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['juego_id' => 'id']);
    }
}
