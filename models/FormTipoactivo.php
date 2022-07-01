<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormTipoactivo extends model{

public $nombre_activo;



public function rules()
 {
  return [
   ['nombre_activo', 'required', 'message' => Yii::t('app','Required field') ],
   ['nombre_activo', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' =>Yii::t('app','Only Letters')],
   ['nombre_activo', 'match', 'pattern' => '/^.{3,50}$/', 'message' =>Yii::t('app','Betwen 3 and 50 characters')],
   

  ];
 }

  public function attributeLabels()
    {
        return [
            'nombre_activo' => Yii::t('app','Asset name'),
            
        ];
    }
 
}