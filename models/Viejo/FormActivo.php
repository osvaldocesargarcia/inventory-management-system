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
   ['id_area', 'integer', 'message' => 'Id incorrecto'],
   ['id_area', 'required', 'message' => 'Debe seleccionar un elemento'],

   ['estado', 'required', 'message' => 'Campo requerido'],
   ['estado', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['estado', 'match', 'pattern' => '/^.{6,14}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],

   [['file'],'file' ],

   
 
  
  ];
 }


 public function attributeLabels(){
 	return[
 		'file'=>'Foto',
 	];
 }
 
}