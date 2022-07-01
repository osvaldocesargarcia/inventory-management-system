<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormPropiedad extends model{

public $id_propiedad;
public $propiedades;
public function rules()
 {
  return [
   
   ['propiedades', 'required', 'message' => 'Campo requerido'],
   ['propiedades', 'match', 'pattern' => '/^[a-záéíóúñ\s]+$/i', 'message' => 'Sólo se aceptan letras'],
   ['propiedades', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mínimo 3 máximo 50 caracteres'],
   
  ];
 }
 
}