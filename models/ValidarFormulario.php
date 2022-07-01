<?php
namespace app\models;
use Yii;
use yii\base\model;

	class ValidarFormulario extends model{
		public $nombre;
		public $email;

		public function rules(){
			return [
			['nombre','required','message' => 'Campo requerido'],
			['nombre','match','pattern' => "/^.{3,50}$/",'message'=>'entre 3 y 50 caracteres'], 
			['nombre','match','pattern' => "/^[0-9a-z]+$/i",'message'=>'Solo letras y numeros'],   
			['email','required','message'=>'Campo requerido'],
			['email','match','pattern' =>"/^.{5,80}$/",'message' =>'Entre 5 y 80 caracteres'],
			['email','email','message'=>'Formato no valido'],
			       ];
		}
	

		public function attributeLabels(){
			return [
			'nombre'=>'Nombre : ',
			'email' =>'Email : ',
			];

		}

}

?>