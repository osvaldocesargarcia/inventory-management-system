<?php

namespace app\models;
use Yii;
use yii\base\model;
use app\models\Users;

class FormRegister extends model{
 
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $file;
   
    
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','User Name'),
            'password' => Yii::t('app','Password'),
            'password_repeat' => Yii::t('app','Repeat Password'),
            'file'=>Yii::t('app','Photo'),
        ];
    }


    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required', 'message' => Yii::t('app','Required field')],
            ['username', 'match', 'pattern' => "/^.{3,50}$/", 'message' => Yii::t('app','Betwen 3 and 50 characters')],
            ['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => Yii::t('app','Only letters and numbers')],
            ['username', 'username_existe'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' =>Yii::t('app','Betwen 5 and 50 characters')],
            ['email', 'email', 'message' => Yii::t('app','Wrong Format')],
            ['email', 'email_existe'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => Yii::t('app','Betwen 6 and 16 characters')],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app','Passwords do not match')],
            [['file'],'file'],
             
        ];
    }
    
    public function email_existe($attribute, $params)
    {
  
  //Buscar el email en la tabla
  $table = Users::find()->where("email=:email", [":email" => $this->email]);
  
  //Si el email existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, Yii::t('app','Selected email is already used'));
  }
    }
 
    public function username_existe($attribute, $params)
    {
  //Buscar el username en la tabla
  $table = Users::find()->where("username=:username", [":username" => $this->username]);
  
  //Si el username existe mostrar el error
  if ($table->count() == 1)
  {
                $this->addError($attribute, Yii::t('app','Selected username is already used'));
  }
    }
 
}