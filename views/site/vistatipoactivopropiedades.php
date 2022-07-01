<?php
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/creartipoactivopropiedad") ?>">Crear un nuevo Activo</a>

<h3>Listado de Activos y sus Propiedades</h3>
<table class="table table-bordered">
    <tr>
        <th>Id </th>
          <th>Tipo Activo</th>
        <th>Propiedad</th>
      
        
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach($model as $row): ?>
    <tr>
        <td><?= $row->id_tipo_activo_propiedad ?></td>
         <td><?= $row->id_tipo_activo?></td>
        <td><?= $row->id_propiedad?></td>
       
        
        
       
        <td><a href="#">Editar</a></td>
        <td><a href="#">Eliminar</a></td>
    </tr>
    <?php endforeach ?>
</table>    
