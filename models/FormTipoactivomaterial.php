<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormTipoactivomaterial extends model{

public $id_tipo_activo_material;
public $id_tipo_activo;
public $id_material;

     
public function rules()
 {
  return [
   
   ['id_tipo_activo', 'required', 'message' => 'Campo requerido'],
   ['id_tipo_activo', 'number', 'message' => 'Sólo números'],
   ['id_material', 'required', 'message' => 'Campo requerido'],
   ['id_material', 'number', 'message' => 'Sólo números'],
  ];
 }
 
}