<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormFValor extends model{

public $nombre_valor;

public function rules()
 {
  return [
  
   ['nombre_valor', 'required', 'message' => 'Campo requerido'],
   ['nombre_valor', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['nombre_valor', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
  
  ];
 }
 
}

