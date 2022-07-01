<?php
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/creartipoactivomaterial") ?>">Crear un nuevo Activo</a>

<h3>Listado de Activos y sus Materiales</h3>
<table class="table table-bordered">
    <tr>
        <th>Id Tipo-Activo-Material</th>
        <th>Id Material</th>
        <th>Id Tipo Activo</th>
        
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_tipo_activo_material ?></td>
        <td><?= $row->id_material?></td>
        <td><?= $row->id_tipo_activo?></td>
        
        
       
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>
    </tr>
    <?php endforeach ?>
</table>    





