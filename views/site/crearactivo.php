<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\FArea;
use yii\helpers\ArrayHelper;

use app\models\FTipoActivo;
?>

<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;"><?=Yii::t('app','Create Asset')?></h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
 'options'=>['enctype'=>'multipart/form-data']
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
    					<span class ="glyphicon glyphicon-user" aria-hidden="true"></span><?=Yii::t('app','Insert the requested information')?>
    				</div>
    				<div class = "panel-body">
    				<form class="form-horizontal" role="form">


<br>
   <div class= "registro-datos">                 
    <div class="form-group">
<div class="form-group">

	<?=	
		$form->field($model,"id_area")->dropDownList(
		ArrayHelper::map(FArea::find()->all(),'id_area','nombre_area'),
		['prompt'=>Yii::t('app','Select an area')]
		)?>
</div>



<div class="form-group">
 <?= $form->field($model, "estado")->dropDownList(['ocioso'=>'Ocioso','activo'=>'Activo'],['prompt'=>Yii::t('app','Select an state')]) ?>   
</div>


<div class="form-group">

    <?= 
        $form->field($model,"id_tipo_activo")->dropDownList(
        ArrayHelper::map(FTipoActivo::find()->all(),'id_tipo_activo','nombre_activo'),
        ['prompt'=>Yii::t('app','Select the kind of asset')]    
        )->label(Yii::t('app','Select the kind of asset'))?>

        <a href="#"><?=Yii::t('app','Insert a new kind of asset')?></a>
</div>


<div class="form-group">

    <?= 
        $form->field($model,'file')->fileInput();?>
</div>



        <br> 
       <div class="col-sm-4"></div>
        <div class="col-sm-3">
       <?= Html::submitButton(Yii::t('app','Create Asset'), ["class" => "btn btn-primary"]) ?>


        </div>


    </div>




    					
    				</div>
    			</div>	
    			
    		</div>
    		
    	</div>
    </div>






<?php $form->end() ?>