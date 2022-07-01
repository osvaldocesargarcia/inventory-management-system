
<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>



<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;"><?=Yii::t('app','Assets')?></h1>
    
 <?= Html::a('<i class="fa fa-file"></i>  PDF' ,['exportlike'],['class'=>'btn btn-danger'],
        ['target'=>'_blank']);?>
<table class="table table-bordered">
    <tr style="background-color: #f1f1f1;">
        <th><?=Yii::t('app','Asset Id')?></th>
        <th><?=Yii::t('app','Area ID')?></th>
        <th><?=Yii::t('app','Date of buy')?></th>
        <th><?=Yii::t('app','Type')?></th>
        <th><?=Yii::t('app','State')?></th>
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_activo ?></td>
        <td><?= $row->id_area?></td>
        <td><?= $row->fecha_adquisicion?></td>
         <td><?= $row->id_tipo_activo?></td>
        <td><?= $row->estado?></td>
       
        <td><a href="#"><?=Yii::t('app','Edit')?></a></td>
        <td>
            <a href="#" data-toggle="modal" data-target="#id_activo_<?= $row->id_activo ?>"><?=Yii::t('app','Remove')?></a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_activo_<?= $row->id_activo ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title"><?=Yii::t('app','Remove Asset')?></h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar al activo con id <?= $row->id_activo ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deleteactivo"), "POST") ?>

                                    <input type="hidden" name="id_activo" value="<?= $row->id_activo ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('app','Close')?></button>
                                    <button type="submit" class="btn btn-primary"><?=Yii::t('app','Remove')?></button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </td>
    </tr>
    <?php endforeach ?>
</table>
<a href="<?= Url::toRoute("site/crearactivo") ?>"><?=Yii::t('app','Insert a new asset')?></a>



<br><br><br><br><br><br><br><br><br><br><br>