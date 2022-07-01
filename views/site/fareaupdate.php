<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Users;
?>


<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;">Editar Área #<?= Html::encode($_GET["id_area"]) ?></h1>

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
    					<span class ="glyphicon glyphicon-user" aria-hidden="true"></span>  Ingrese todos los datos solicitados.
    				</div>
    				<div class = "panel-body">
    				<form class="form-horizontal" role="form">


<br>
   <div class= "registro-datos">                 
    <div class="form-group">
<div class="form-group">

<?= $form->field($model, "id_area")->input("hidden")->label(false) ?>

<div  class="form-group">
 <?= $form->field($model, "nombre_area")->input("text") ?>   
</div>

<?= 
        $form->field($model,"jefe")->dropDownList(
        ArrayHelper::map(Users::find()->where(["id_area"=>$model->id_area])->all(),'id','username')
        )?>
</div>



        <br> 
       <div class="col-sm-4"></div>
        <div class="col-sm-3">
      
<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

        </div>


    </div>




    					
    				</div>
    			</div>	
    			
    		</div>
    		
    	</div>
    	<a href="<?= Url::toRoute("site/vistaareas") ?>">Ir a la lista de areas</a>

    </div>






<?php $form->end() ?>

