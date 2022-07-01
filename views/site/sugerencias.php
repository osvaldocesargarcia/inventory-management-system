
<?php
use yii\helpers\Html;
use yii\helpers\Url;	
use yii\widgets\ActiveForm;
?>

<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("site/sugerencias"),
    "enableClientValidation" => true,
]);
?>

<h1>Activos sugeridos</h1>
<h3><?=$msg?></h3>
<br>

<?php foreach ($model as $user): ?>
<div class="row">
	<div class="col-md-12" >

		<div class="col-md-3" align="right">
			
			<h3><?=$user->id_remitente?> -</h3>
		</div>
		<div class="col-md-6" style="background-color: rgba(0,0,0,0.2);" >
		<br>
			<center><h4><?=$user->nombre ?></h4></center>
			<h6 align="right"><?=$user->fecha?></h6>
		</div>

		<div class="col-md-3">
		<br>
			<a href="#" class="btn btn-primary"  data-toggle="modal"    data-target="#id_<?= $user->id_notificacion ?>">Acciones</a>
 
		</div>



	

	</div>
</div>
<div class="modal fade" role="dialog" aria-hidden="true" id="id_<?= $user->id_notificacion?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title"><?=Yii::t('app','Suggest')?></h4>
                              </div>
                              <div class="modal-body">
                                    <p><?=Yii::t('app','Choose beetwen accept or decline')?>?</p>
                              </div>
                              <div class="modal-footer">
                              	<div class="row">
                              		<div class="col-md-8">
                              			
                              		</div>
                              		<div class="col-md-1">
                             <?= Html::beginForm(Url::toRoute("site/creartiposugerido"), "POST") ?>
                              <input type="hidden" name="id" value="<?= $user->id_notificacion ?>">
                               <button type="submit" class="btn btn-primary">Aceptar</button>
                               <?= Html::endForm() ?>
                              		</div>
                              		<div class="col-md-1">
                              			
                              		</div>
                              		<div class="col-md-1">
                              			<?= Html::beginForm(Url::toRoute("site/deletenotificacion"), "POST") ?>
                                    <input type="hidden" name="id" value="<?= $user->id_notificacion ?>">
                                   
                                    <button type="submit" class="btn btn-danger"><?=Yii::t('app','Remove')?></button>
                                  
                              <?= Html::endForm() ?>
                              		</div>
                              		
                              	</div>
                              
                               <br>
                              
                             
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 

<br>
<?php endforeach ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>