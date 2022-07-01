<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activo".
 *
 * @property integer $id_activo
 * @property string $fecha_adquisicion
 * @property string $estado
 * @property integer $id_area
 */
class Activo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_activo'], 'required'],
            [['id_activo', 'id_area'], 'integer'],
            [['fecha_adquisicion'], 'safe'],
            [['estado'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_activo' => 'Id Activo',
            'fecha_adquisicion' => 'Fecha Adquisicion',
            'estado' => 'Estado',
            'id_area' => 'Id Area',
        ];
    }
}
