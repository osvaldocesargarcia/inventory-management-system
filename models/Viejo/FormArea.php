<?php

namespace app\models;
use Yii;
use yii\base\model;
use yii\data\ActiveDataProvider;

class FormArea extends model{

public $id_area;
public $nombre_area;
public $jefe;


public function rules()
 {
  return [
   
   ['nombre_area', 'required', 'message' => Yii::t('app','Required field')],
   ['nombre_area', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => Yii::t('app','Only letters')],
   ['nombre_area', 'match', 'pattern' => '/^.{3,50}$/', 'message' => Yii::t('app','It must have between 3 and 50 letters')],
   ['jefe', 'required', 'message' => Yii::t('app','Required field')], 
 
  ];
 }


 public function attributeLabels()
    {
        return [
            'id_area' =>  Yii::t('app','Id Area') ,
            'nombre_area' => Yii::t('app','Area name'),
            'jefe' => Yii::t('app','Chief name'),
        ];
    }
 
}