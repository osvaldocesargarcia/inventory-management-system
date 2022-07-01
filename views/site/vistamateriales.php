<?php
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/crearmaterial") ?>">Agregar nuevo Material</a>

<h3>Listado de materiales</h3>
<table class="table table-bordered">
    <tr>
        <th>Id Material</th>
        <th>Nombre</th>
       
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_alumno ?></td>
        <td><?= $row->nombre ?></td>
       
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>
    </tr>
    <?php endforeach ?>
</table>