<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\FArea;
use app\models\FTipoActivo;
use app\models\FActivo;

?>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
    'options' => ['enctype' => 'multipart/form-data']
]);
?>
<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 50px;">  nºInventario <?= Html::encode($_GET["id_activo"]) ?> </h1>


<br>

<div class="row">
	<div class="col-md-5" align="right">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#id_activo_<?=Html::encode($_GET["id_activo"]) ?>"><span class="glyphicon glyphicon-pencil"></span>Editar</a>
<br><br>
 <?=Html::img('../../web/'. $model->file, ["class" => "img-rounded","width"=>"100%px;","height"=>"280px;"])?>




</div>
<div class="col-md-6">
<br><br><br><br><br><br><br>
<h2><strong>Área : </strong><?=$model->nombre_area;?></h2>
<h2><strong>Estado :</strong> <?=$model->estado?></h2>
<h2><strong>Tipo de activo :</strong> <?=$model->nombre_activo?></h2>

<h2><strong>Fecha de adquisición : </strong><?=$model->fecha_adquisicion;?></h2>
<h2><strong>Propiedades : </strong><?=$model->propiedades;?></h2>
<h2><strong>Valores : </strong><?=$model->valores;?></h2>
  
</div>



		 <div class="modal fade" role="dialog" aria-hidden="true" id="id_activo_<?= Html::encode($_GET["id_activo"]) ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Editar activo</h4>
                              </div>
                              <div class="modal-body">

                             

</div>
<div class="form-group">
 <?= $form->field($model, "estado")->dropDownList(['operativo'=>'Operativo','ocioso'=>'Ocioso','desactivado'=>'Desactivado'],['prompt'=>'Seleccione un estado']) ?>   
</div>

<div class="form-group">

	<?= $form->field($model,'file')->fileInput();?>
</div>

<div class="botones" align="right">

<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<img src="">
<?php $form->end() ?>
</div>

<br>
                              </div>

                              
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
	<div class="col-md-6">
		
		
</div>


<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>









