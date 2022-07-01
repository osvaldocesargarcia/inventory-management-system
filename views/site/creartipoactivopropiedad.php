<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\FTipoActivo;
use app\models\FPropiedad;
use app\models\FTipoactivopropiedad;
?>

<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 60px;">Asignar propiedad </h1>
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
                        <span class ="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Asigne propiedades a un tipo de activo.
                    </div>
                    <div class = "panel-body">
                    <form class="form-horizontal" role="form">


<br>
   <div class= "registro-datos">                 
    <div class="form-group">

<div class="form-group">


	<?=	
	 
               
              
		$form->field($model,"id_tipo_activo")->dropDownList(
		ArrayHelper::map(FTipoActivo::findBySql("SELECT * FROM tipo_activo ")->all(),'id_tipo_activo','nombre_activo')
	
		)?>
</div>


<div class="form-group" >

	<?=	
		$form->field($model,"id_propiedad")->dropDownList(
		ArrayHelper::map(FPropiedad::findBySql("SELECT * FROM propiedad")->all(),'id_propiedad','propiedades')
		)?>
</div>





        <br> 
       <div class="col-sm-4"></div>
      
      

<?= Html::submitButton("Asignar propiedad", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>




    </div>




                        
                    </div>

                </div>  
                
            </div>
            
        </div>






