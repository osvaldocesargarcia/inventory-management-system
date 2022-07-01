<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property integer $id_area
 * @property integer $id_rol
 * @property string $nombre
 * @property string $contraseña
 * @property string $email
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario'], 'required'],
            [['id_usuario', 'id_area', 'id_rol'], 'integer'],
            [['nombre', 'contraseña', 'email'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_area' => 'Id Area',
            'id_rol' => 'Id Rol',
            'nombre' => 'Nombre',
            'contraseña' => 'Contrase�a',
            'email' => 'Email',
        ];
    }
}
