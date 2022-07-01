	<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Crear Rol de Usuario</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "nombre_rol")->input("text") ?>   
</div>


<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>