<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>



<h1> Agregar nuevo tipo de valor de propiedades</h1>
<h3><?=$msg ?></h3>

<?php
	$form =ActiveForm::begin([
		"method"=>"post",
		"enableClientValidation"=>true,
		]);
?>

<div class="form-group">
	<?= $form->field($model,"nombre_valor")->input("text")?>	
</div>



<?= Html::submitButton("Agregar",["class" =>"btn btn-primary"]) ?>

<?php $form->end()?>