	<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users;
use yii\helpers\ArrayHelper;


?>

<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
 'options'=>['enctype'=>'multipart/form-data']
]);
?>

	<h1>Enviar mensaje</h1>
<h2><?=$msg?></h2>

<div class="row">
	<div class="col-md-12">
		
		<div class="row">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-3">
				<h3> Elija un destinatario :</h3>
			</div>
			<div class="col-md-3">
			<div class="form-group">

	<?=	


		$form->field($model,"id_destinatario")->dropDownList(
		ArrayHelper::map(Users::find()->all(),'id','username'),
		['prompt'=>Yii::t('app','Seleccione un usuario')] // OJO -> SIN TRADUCIR!!!!!!!!!!!!!!!!!!1
		)->label('')?>

</div>


				
			</div>

		

			
		</div>
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
 <?= $form->field($model, "nombre")->textarea(['rows' => 10])->label('Redacte su mensaje') ?>  
</div>
<p align="right"><?= Html::submitButton(Yii::t('app',"Enviar") , ["class" => "btn btn-primary"]) ?></p>

				</div>
				
			</div>

	</div>
	
</div>











	<br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br>

<?php $form->end() ?>