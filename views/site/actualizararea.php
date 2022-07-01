<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/vistaareas") ?>"><?=Yii::t('app','Go to Areas')?></a>

<h1><?=Yii::t('app','Edit Area ')?> <?= Html::encode($_GET["id_area"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, Yii::t('app','Area ID'))->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombre_area")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "cant_jefes")->input("text") ?>   
</div>

<?= Html::submitButton(Yii::t('app','Update'), ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

