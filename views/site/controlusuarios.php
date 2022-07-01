<?php
use yii\helpers\Html;
use yii\helpers\Url;	
use yii\widgets\ActiveForm;
?>

<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("site/controlusuarios"),
    "enableClientValidation" => true,
]);
?>


<style type="text/css">
	body{
		background-color: rgb(0,0,0,0.1);
	}
</style>
<h1><?=Yii::t('app','Users');?></h1>


<?php foreach ($model as $user): ?>

<div class="row" style="height: 45px;">
<div class="col-md-1">

	
</div>
	
	<div class="col-md-9" style="background-color: rgba(0,0,0,0.2);">

		<div class="row">
		<div class="panel-default">			
			<div class="col-md-3">
			<h5><strong>Nombre :</strong> <?=$user->username?></h5>
				
			</div>
			<div class="col-md-5">
			<h5><strong>Email :</strong> <?=$user->email?></h5>
				
			</div>
				<div class="col-md-3">
			<h5><strong>Área :</strong> <?=$user->id?></h5>
				
			</div>
			</div>

		</div>
		
	</div>
	<div class="col-md-2">
 
 <a href="#" <?= $user->activate ? 'class="btn btn-danger"' :'class="btn btn-primary"' ;?> data-toggle="modal"           data-target="#id_<?= $user->id ?>"><?=$user->activate ? 'Deshabilitar':'Habilitar'; ?></a>
 
	</div>
	
</div>


            <div class="modal fade" role="dialog" aria-hidden="true" id="id_<?= $user->id ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title"><?=Yii::t('app','Remove Area')?></h4>
                              </div>
                              <div class="modal-body">
                                    <p><?=Yii::t('app','You really want to remove the area whit ID ')?><?= $user->id ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deshabilitaruser"), "POST") ?>
                                    <input type="hidden" name="id" value="<?= $user->id ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('app','Close')?></button>
                                    <button type="submit" class="btn btn-primary"><?=Yii::t('app','Remove')?></button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 

	
<?php endforeach ?>



         
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>