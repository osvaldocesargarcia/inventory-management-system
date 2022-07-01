<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormActivo extends model{


public $id_area;
public $fecha_adquisicion;
public $estado;
public $file;
public $id_tipo_activo;
public $nombre_activo;
public $nombre_area;
public $propiedades;
public $valores;


public function rules()
 {
  return [
   ['id_area', 'integer', 'message' => Yii::t('app','Wrong ID')],
   ['id_area', 'required', 'message' => Yii::t('app','An element sould be selected')],
   ['estado', 'required', 'message' => Yii::t('app','Required field')],
   ['estado', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => Yii::t('app','Only letters')],
   ['estado', 'match', 'pattern' => '/^.{6,14}$/', 'message' => Yii::t('app','Betwen 3 and 50 characters')],
   [['file'],'file'],
   
 
  
  ];
 }


 public function attributeLabels(){
 	return[
 		'file'=>Yii::t('app','Photo'),
 		'id_area'=>Yii::t('app','Area'),
 		'estado'=>Yii::t('app','State'),
 	];
 }
 
}