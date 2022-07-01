<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/vistaareas") ?>">Ir a la lista de areas</a>

<h1>Editar area con id <?= Html::encode($_GET["id_area"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_area")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombre_area")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "cant_jefes")->input("text") ?>   
</div>





<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
