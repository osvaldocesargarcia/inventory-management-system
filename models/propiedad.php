<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propiedad".
 *
 * @property integer $id_propiedad
 * @property string $propiedades
 */
class propiedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propiedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propiedades'], 'required'],
            [['propiedades'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_propiedad' => 'Id Propiedad',
            'propiedades' => 'Propiedades',
        ];
    }
}
