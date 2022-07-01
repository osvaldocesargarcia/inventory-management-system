<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<a href="<?= Url::toRoute("site/crearmaterial") ?>">Crear un nuevo material</a>

<h3>Lista de materiales</h3>
<table class="table table-bordered">
    <tr>
        <th>Id Material</th>
        <th>Nombre del material</th>
     
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_material ?></td>
        <td><?= $row->nombre_material ?></td>
        
        <td><a href="#">Editar</a></td>
        <td>
        <a href="#" data-toggle="modal" data-target="#id_material_<?= $row->id_material ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_material_<?= $row->id_material ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar material</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar al material con id <?= $row->id_material ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deletematerial"), "POST") ?>
                                    <input type="hidden" name="id_material" value="<?= $row->id_material ?>">
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