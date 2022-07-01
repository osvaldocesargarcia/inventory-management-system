
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;"
    ><?= Html::encode($this->title) ?></h1>

    

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>



    <div class="row">
        <div class="col-md-3">
        </div>


            <div class = "col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background : #2b2b2b !important;
    color : #996600 !important;
    font-size: 25px;">
                        <span class ="glyphicon glyphicon-user" aria-hidden="true"></span> <?= Yii::t('app','Insert all the request data')?> 
                    </div>
                    <div class = "panel-body">
                    <form class="form-horizontal" role="form">


<br>
   <div class= "registro-datos">                 
    <div class="form-group">
<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
          <div class="form-group">
            <div class="col-lg-offset-5 col-lg-12">
                <?= Html::submitButton(  Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                
            </div>

        </div> <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-5 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>


       





        
      
   
</div>


        </div>


    </div>
   
                



                        
                    </div>
                </div>  
                
            </div>
            
        </div>
    </div>



    <?php ActiveForm::end(); ?>


       