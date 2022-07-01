<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 60px;"> <?=Yii::t('app','Kind of asset')?></h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
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
                        <span class ="glyphicon glyphicon-user" aria-hidden="true"></span> <?=Yii::t('app',"Insert the asset's name")?>
                    </div>
                    <div class = "panel-body">
                    <form class="form-horizontal" role="form">


<br>
   <div class= "registro-datos">                 
    <div class="form-group">
<div class="form-group">
 <?= $form->field($model, "nombre_activo")->input("text") ?>   
</div>



        <br> 
       <div class="col-sm-4"></div>
      
      

<?= Html::submitButton(Yii::t('app',"Insert kind of asset") , ["class" => "btn btn-primary"]) ?>

       


    </div>




                        
                    </div>
                </div>  
                
            </div>
            
        </div>
    </div>

<center>
    <h4><span class="glyphicon glyphicon-hand-right"></span><?=Yii::t('app','Do you want to add properties to an existent asset?')?><a href=""> <?=Yii::t('app','Click here')?></a></h4> 
</center>    
<?php $form->end() ?>