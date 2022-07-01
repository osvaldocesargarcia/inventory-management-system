<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>



<h3>Listado de propiedades</h3>
<table class="table table-bordered">
    <tr>
        <th><center>Id</th>
        <th>Propiedades</th>
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><center><?= $row->id_propiedad ?></center></td>
        <td><?= $row->propiedades?></td>
       
         <td><a href="<?= Url::toRoute(["site/propiedadupdate", "id_propiedad" => $row->id_propiedad]) ?>">Editar</a></td>
        <td>
        <a href="#" data-toggle="modal" data-target="#id_propiedad_<?= $row->id_propiedad ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_propiedad_<?= $row->id_propiedad ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar propiedad</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar al propiedad con id <?= $row->id_propiedad ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deletepropiedad"), "POST") ?>
                                    <input type="hidden" name="id_propiedad" value="<?= $row->id_propiedad ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <?= Html::endForm() ?>
                              </div>
                            </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </td>
    </tr>
    <?php endforeach ?>
</table>
<a href="<?= Url::toRoute("site/crearpropiedad") ?>">Agregar nueva propiedad</a>

<br><br><br><br><br><br><br><br><br><br><br><br>