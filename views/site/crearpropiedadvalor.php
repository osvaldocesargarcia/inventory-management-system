<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Asignar un valor a una propiedad</h1>

<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "id_propiedad")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "id_valor")->input("text") ?>   
</div>


<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>