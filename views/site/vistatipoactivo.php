<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<a href="<?= Url::toRoute("site/creartipoactivo") ?>">Crear un nuevo Activo</a>

<h3>Listado de los diferentes Activos</h3>
<table class="table table-bordered">
    <tr>
        <th>Id Tipo Activo</th>
  
        <th>Nombre</th>
               
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_tipo_activo?></td>
        
        <td><?= $row->nombre_activo?></td>
      
       
        <td><a href="#">Editar</a></td>
        <td>
        <a href="#" data-toggle="modal" data-target="#id_tipo_activo_<?= $row->id_tipo_activo ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_tipo_activo_<?= $row->id_tipo_activo ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar tipo de activo</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar al tipo de activo con id <?= $row->id_tipo_activo ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deletetipoactivo"), "POST") ?>
                                    <input type="hidden" name="id_tipo_activo" value="<?= $row->id_tipo_activo ?>">
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