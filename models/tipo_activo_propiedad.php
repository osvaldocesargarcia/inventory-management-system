<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_activo_propiedad".
 *
 * @property integer $id_tipo_activo_propiedad
 * @property integer $id_tipo_activo
 * @property integer $id_propiedad
 */
class tipo_activo_propiedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_activo_propiedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_activo', 'id_propiedad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_activo_propiedad' => 'Id Tipo Activo Propiedad',
            'id_tipo_activo' => 'Id Tipo Activo',
            'id_propiedad' => 'Id Propiedad',
        ];
    }
}
