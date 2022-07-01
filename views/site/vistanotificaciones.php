<?php
use yii\helpers\Html;
use app\models\User;
?>

<h1>Mensajería</h1>
<h3><?=$msg?></h3>
<br>
<h4 align="right">
<a href="<?= !User::isUserAdmin( Yii::$app->user->identity->id ) ?
'sugerirtipoactivo' :
'#';
?>" class="btn btn-danger"><span class="glyphicon glyphicon-comment"></span>
 <?=!User::isUserAdmin( Yii::$app->user->identity->id ) ?
 'Sugerir activo':
 'Sugerencias de activos';
  ?></a>
 <a href="nuevomensaje" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Enviar mensaje</a></h4>
<h4 align="right"> </h4>


<?php foreach ($model as $user): ?>
<div class="row">
	<div class="col-md-12" >

		<div class="col-md-3" align="right">
			
			<h3><?=$user->id_remitente?> -</h3>
		</div>
		<div class="col-md-6" style="background-color: rgba(0,0,0,0.2);" >
		<br>
			<center><h4><?=$user->nombre ?></h4></center>
			<h6 align="right"><?=$user->fecha?></h6>
		</div>




	

	</div>
</div>
<br>
<?php endforeach ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>