<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_activo_material".
 *
 * @property integer $id_tipo_activo_material
 * @property integer $id_tipo_activo
 * @property integer $id_material
 */
class tipo_activo_material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_activo_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_activo', 'id_material'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_activo_material' => 'Id Tipo Activo Material',
            'id_tipo_activo' => 'Id Tipo Activo',
            'id_material' => 'Id Material',
        ];
    }
}
