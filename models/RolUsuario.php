<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_usuario".
 *
 * @property integer $id_rol
 * @property string $nombre_rol
 */
class RolUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rol'], 'required'],
            [['id_rol'], 'integer'],
            [['nombre_rol'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rol' => 'Id Rol',
            'nombre_rol' => 'Nombre Rol',
        ];
    }
}
