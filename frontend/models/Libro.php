<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property int $Id_libro
 * @property string $Titulo
 * @property string $Imagen
 */
class Libro extends \yii\db\ActiveRecord
{
    public $archivo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Titulo'], 'required'],
            [['Titulo'], 'string', 'max' => 250],
            [['archivo'], 'file', 'extensions'=> 'jpg,png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_libro' => 'Id Libro',
            'Titulo' => 'Titulo',
            'archivo' => 'Imagen',
        ];
    }
}
