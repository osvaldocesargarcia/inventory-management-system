<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormRolusuario extends model{

public $id_rol;
public $nombre_rol;


public function rules()
 {
  return [
  
   ['nombre_rol', 'required', 'message' => 'Campo requerido'],
   ['nombre_rol', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nombre_rol', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   
  ];
 }
 
}