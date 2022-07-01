<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormTipoactivo extends model{

public $nombre_activo;



public function rules()
 {
  return [
   ['nombre_activo', 'required', 'message' => 'Campo requerido'],
   ['nombre_activo', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nombre_activo', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   

  ];
 }
 
}