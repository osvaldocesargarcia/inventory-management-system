<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property integer $id_area
 * @property string $nombre_area
 * @property integer $cant_jefes
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_area'], 'required'],
            [['id_area', 'cant_jefes'], 'integer'],
            [['nombre_area'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_area' => 'Id Area',
            'nombre_area' => 'Nombre Area',
            'cant_jefes' => 'Cant Jefes',
        ];
    }
}
