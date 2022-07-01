<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormTipoactivopropiedad extends model{

public $id_tipo_activo_propiedad;
public $id_tipo_activo;
public $id_propiedad;
public $listado;
     
public function rules()
 {
  return [
   
   ['id_tipo_activo', 'required', 'message' => 'Campo requerido'],
   ['id_tipo_activo', 'number', 'message' => 'Sólo números'],
   ['id_propiedad', 'required', 'message' => 'Campo requerido'],
   ['id_propiedad', 'number', 'message' => 'Sólo números'],
  ];
 }


 public function attributeLabels(){
 	return[
 		'id_tipo_activo'=>'Nombre del tipo de activo',
 		'id_propiedad'=>'Propiedades',

 	];
 }



}