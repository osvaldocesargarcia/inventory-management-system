<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1 style="
    font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;">
<?= Yii::t('app', 'Register') ?>
</h1>
<?php
$form = ActiveForm::begin([
            'method' => 'post',
            'id' => 'formulario',
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
            'options' => ['enctype' => 'multipart/form-data']
        ]);
?>

<div class="row">
    <div class="col-md-3">
    </div>


    <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" style="background : #2b2b2b !important;
                 color : #996600 !important;
                 font-size: 25px;">
                <span class ="glyphicon glyphicon-user" aria-hidden="true"></span>  <?= Yii::t('app', 'Insert all the request data') ?>
            </div>
            <div class = "panel-body">
                <form class="form-horizontal" role="form">


                    <br>
                    <div class= "registro-datos">                 
                        <div class="form-group">
<?= $form->field($model, "username")->input("text") ?>   
                        </div>


                        <div class="form-group">
<?= $form->field($model, "email")->input("email") ?>   
                        </div>
                    </div>
                    <div class="form-group">

<?= $form->field($model, "password")->input("password") ?>   
                    </div>

                    <div class="form-group">
<?= $form->field($model, "password_repeat")->input("password") ?>   
                    </div>

                    <div class="form-group">

                        <?= $form->field($model, 'file')->fileInput(); ?>
                    </div>




                    <br> 
                    <div class="col-sm-5"></div>

                    <?= Html::submitButton(Yii::t('app','Sign up'), ["class" => "btn btn-primary"]) ?>




            </div>
            <center> 
                <a href="http://localhost/Proyecto/Probando/Inicio.php"><p style="font-size: 15px;"><?=Yii::t('app','Do you have an account? Access here')?></p> 
                </a>            
            </center>        





        </div>
    </div>	

</div>

</div>
</div>






<?php $form->end() ?>