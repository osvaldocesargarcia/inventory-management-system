<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormNotificacion extends model{

public $id_notificacion;
public $id_remitente;
public $id_destinatario;
public $id_area;
public $nombre;
public $logo;
public $fecha;

public function rules()
 {
  return [
  
   
  ['id_destinatario','required','message'=>Yii::t('app','Required field')],
   ['nombre', 'match', 'pattern' => '/^.{3,1000}$/', 'message' => 'Mínimo 3 máximo 1000 caracteres'],
 
  
  ];
 }
 
}

