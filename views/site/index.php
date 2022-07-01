<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


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
   -webkit-transform:scale(1.1);
     box-shadow: 20px 20px 80px rgba(0,0,0, .5);
     
  }
    
</style>
<br><br>

<div class="site-index" >
<center>  <div class="option animated fadeInDown">
         <h1 style="margin-left:80px;color: gold;
    font-size: 160px; " value="fadeInDown">My-Inventory!</h1>
         </div>
         <div class="option animated fadeInRight">
         <h3>
         <p style="margin-left:80px; color:black;">


           <?= Yii::t('app','Manage your inventory in an efficient and easier way.') ?> 
         </p>
         </h3>
            
        </div>
</center>

 
    
</div>


<div class="container text-center">    

  <h2><?= Yii::t('app','Welcome') ?></h2><br>
  <div class="row">
  <div class="option animated fadeInLeft">

    <div class="col-sm-6">
    <div class="panel-default">
        <div class="panel-header" style="background-color: transparent;color:  black;">
        <h2> <span class="glyphicon glyphicon-bookmark">  </span> <?= Yii::t('app','What is My-Inventory?') ?></h2>  
        </div>
        <div class="panel-body" style="background-color: transparent;color: black;">
           <img   src="../../web/css/cabecera-01.jpg" class="img-responsive" style="width:100% " alt="Image" >
            
      <h3><p><?= Yii::t('app','It is our tool to reach the goals of the entity giving a touch of agility in our managements. If you look for more information enter here !') ?></p>
        </div>
      </h3>  
     
    </div>
    </div>
    </div>

     <div class="option animated fadeInRight">
    <div class="col-sm-6"> 
    <di class="panel-default"   >
     <div class="panel-header" style="background-color: transparent;color: black;"> 
        <h2> <span class="glyphicon glyphicon-plus">  </span>  <?= Yii::t('app','Areas we attend') ?></h2>  
        </div>
        <div class="panel-body" style="background-color: transparent;color: black;">
           <a href="vistaareas"><img   src="../../web/css/cabecera-02.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
      <h3><p><?= Yii::t('app','We count with different areas with its respectives assets to find the goals of the entity') ?>
</p>
        </div>
      </h3>      
    </div>
    </div>
    </div>
     <div class="option animated fadeInLeft">
    <div class="col-sm-12" style="width:50%;margin-left: 270px;">
    <div class="panel-default">
   <div class="panel-header" style="background-color: transparent;color: black;">
        <h2> <span class="glyphicon glyphicon-folder-open">  </span>  <?= Yii::t('app','No similar management of assets') ?> </h2>  
        </div>
        <div class="panel-body" style="background-color: transparent;color: black;">
        <a href="visualactivos"><img   src="../../web/css/cabecera-04.jpg" class="img-responsive" style="width:100%;" alt="Image"></a>
      <h3><p><?= Yii::t('app','We always look for a better management that improve itself everyday') ?>  .</p>
        </div>
      </h3>  
    </div>
    </div>
  </div>
   </div>
</div><br>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>