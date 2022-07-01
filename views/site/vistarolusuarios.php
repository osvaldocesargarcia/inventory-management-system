<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<a href="<?= Url::toRoute("site/crearrolusuario") ?>">Crear un nuevo Rol de Usuario</a>

<h3>Listado de Roles de Usuarios</h3>
<table class="table table-bordered">
    <tr>
        <th>Id Rol</th>
        <th>Nombre del Rol</th>
        
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_rol ?></td>
        <td><?= $row->nombre_rol?></td>
        
       
        <td><a href="#">Editar</a></td>
        <td>
        <a href="#" data-toggle="modal" data-target="#id_rol_<?= $row->id_rol ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="id_rol_<?= $row->id_rol ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar rol</h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar al rol con id <?= $row->id_rol ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <?= Html::beginForm(Url::toRoute("site/deleterolusuario"), "POST") ?>
                                    <input type="hidden" name="id_rol" value="<?= $row->id_rol ?>">
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