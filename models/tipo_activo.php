<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_activo".
 *
 * @property integer $id_tipo_activo
 * @property string $nombre_activo
 * @property integer $id_activo
 */
class tipo_activo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_activo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_activo'], 'required'],
            [['id_tipo_activo', 'id_activo'], 'integer'],
            [['nombre_activo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_activo' => 'Id Tipo Activo',
            'nombre_activo' => 'Nombre Activo',
            'id_activo' => 'Id Activo',
        ];
    }
}
