<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/vistapropiedades") ?>">Ir a la lista de propiedad</a>

<h1>Editar propiedad con id <?= Html::encode($_GET["id_propiedad"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_propiedad")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "propiedades")->input("text") ?>   
</div>



<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

