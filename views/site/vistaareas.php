<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

?>


<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("site/vistaareas"),
    "enableClientValidation" => true,
]);
?>


 


<div class="form-group">
  <div class="row">
    <div class="col-md-9">
      <h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 80px;"><?=Yii::t('app','Areas')?></h1>
    </div>  
    <div class="col-md-3">
      <?= $f->field($form, "q")->input("search") ?>
      <div class="row">
        <div class="col-md-8">
          
        </div>
        <div class="col-md-3">
          
        </div>  
      </div>
      
      
    </div>  
  </div>

    
</div>



<?php $f->end() ?>

<h3><?= $search ?></h3>



<table class="table table-bordered" >
    <tr style="background-color: #f1f1f1;">
        <th><?=Yii::t('app','Area ID')?></th>
        <th><?=Yii::t('app','Name')?></th> 
        <th><?=Yii::t('app','Boss')?></th>
      
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr style="background-color: #ffffff;">
        <td><?= $row->id_area ?></td>
        <td><?= $row->nombre_area ?></td>
        <td><?= $row->jefe ?></td>
        
       
        <td><a href="<?= Url::toRoute(["site/fareaupdate", "id_area" => $row->id_area]) ?>"><?=Yii::t('app','Edit')?></a></td>
        <td>
         <a href="#" data-toggle="modal" data-target="#id_area_<?= $row->id_area ?>"><?=Yii::t('app','Remove')?></a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_area_<?= $row->id_area ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title"><?=Yii::t('app','Remove Area')?></h4>
                              </div>
                              <div class="modal-body">
                                    <p><?=Yii::t('app','You really want to remove the area whit ID ')?><?= $row->id_area ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deletearea"), "POST") ?>
                                    <input type="hidden" name="id_area" value="<?= $row->id_area ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('app','Close')?></button>
                                    <button type="submit" class="btn btn-primary"><?=Yii::t('app','Remove')?></button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->        </td>
    </tr>
    <?php endforeach ?>
</table>

<a href="<?= Url::toRoute("site/creararea") ?>"><?=Yii::t('app', 'Insert a new area')?></a>
