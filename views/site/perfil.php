<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\FArea;
use app\models\FormArea;
?>







<p style="font-family: Georgia, serif;   border-bottom: 3px solid #cc9900;    color: #996600;font-size: 80px;">
				Perfil del usuario
			</p>

<div class="row">
	<div class="col-md-12" style="background-color: #f1f1f1;border: 3px solid rgba(0,0,0,0.2);">
		



<div class="row">
	<div class="col-md-3">
	<div class="option animated fadeInRight">
	<div class="panel-default" >
		
        
		<div class="panel-body" style="background-color: white;">
			<center>

		  <?= Html::img("../../web/".Yii::$app->user->identity->logo, ["class" => "img-circle","width"=>"60%;","height"=>"130px;"])?> 
		  <h2><?=Yii::$app->user->identity->username?>
		  	
		  </h2>
		   <a href="#">
		   <button type="button" class="btn btn-info">Foto</button> 
		   </a>
		   <a href="http://localhost/basic2/web/site/index">
		    <button type="button" class="btn btn-danger">Datos</button>

		    </a>
		    
		   
			</center>
			
			
			<br>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-7">
	<div class="option animated fadeInRight">
	
		  <h2 style="font-family: Georgia, serif;     color: #996600;">
			<center>	Datos Personales </center>
			</h2>
		

			<div class="panel-default" >
		
        
		<div class="panel-body" style="background-color: white;">
		<h4>Nombre : <?=Yii::$app->user->identity->username?></h4>
			
		</div>
		<div class="panel-body" style="background-color: #f1f1f1;">
			<h4>Correo : <?=Yii::$app->user->identity->email?></h4>
		</div>
		
		</div>
		<div class="panel-body" style="background-color: white;">
		<h4>Área : </h4>
			
		</div>
	

	
	</div>
	</div>
	
</div>
	</div>
	
</div>

