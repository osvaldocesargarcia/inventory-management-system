<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<br><br>

<style type="text/css">
.panel-header{
    height: 42px;
}


 h2{
    margin-bottom: 20px;
}

.panel-default img{
	-webkit-transition:-webkit-transform 0.3s ease-in-out 0.1s;
}

  .panel-default img:hover {
   -webkit-transform:scale(1.4);
     
  }
    
</style>

 <div class="row">
 <?php foreach($model as $row): ?>
<div class="option animated fadeInLeft">

   
 	<div class="col-sm-4"> 
    <di class="panel-default"   >
     <div class="panel-header" style="background-color: transparent;color: transparent;"> 
    
        
        </div>
        <div class="panel-body" style="background-color: transparent;color: black;">
            <a href="<?= Url::toRoute(["site/factivoupdate", "id_activo" => $row->id_activo]) ?>">
        	<?=Html::img('../../web/'. $row->logo, ["class" => "img-rounded","width"=>"100%px;","height"=>"250px;"])?>
        	</a>
   
    </div>
    <div class="footer" style="background-color: transparent;color: black; text-align: right;">
    <h6><span class="glyphicon glyphicon-tag">  </span> <?= $row->id_activo?></h6>  
    	
    </div>
    </div>
 </div>

 	<?php endforeach ?>
