<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<h1>Validar Formulario</h1>

<?php $form =ActiveForm::begin(
	["method"=>"post",
	"enableClientValidation" =>true,
	]);

?>
	
	<div class ="form-group">
		<?= $form->field($model,"nombre")->input("text") ?>
	</div>

	<div class ="form-group">
		<?=$form->field($model,"email")->input("email") ?>
	</div>

	<?=Html::submitButton("Enviar",["class"=>"btn btn-primary"]) ?>

<?php $form ->end()?>