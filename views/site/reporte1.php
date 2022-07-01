

<h1> Reporte 1</h1>



<table class="table table-bordered" >
    <tr style="background-color: #f1f1f1;">
        <th>Id Area</th>
        <th>Estado</th> 
        <th>fecha</th>
        <th>Tipo</th>
    
    </tr>
    <?php foreach($model as $row): ?>
    <tr style="background-color: #ffffff;">
        <td><?= $row->id_area ?></td>
        <td><?= $row->estado ?></td>
        <td><?= $row->fecha_adquisicion ?></td>
        <td><?= $row->id_tipo_activo?></td>
        
       
        
        
    </tr>
    <?php endforeach ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>