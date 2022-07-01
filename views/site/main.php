<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Dropdown;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>



</head>
<body>
<?=$msg?>
<?php
        $this->registerJs(
            "
            $('.language').on('click', function(){
                var lang = $(this).attr('id'); // se asigna a la variable lang el valor del atributo id
                $.get('/basic2/web/site/language', {'lang' : lang}, // se obtiene la variable language y se le asigna lang
                function(data){
                    location.reload(); // se recarga la página actual para hacer efectivos los cambios
                })
            });
            "
        );
        ?>

        <div class="encabezado" >

<br>
    
        <br>
        <div class="row" style="background-color: rgba(0,0,0,0.7);">
  <div class="col-sm-1"></div>

  <div class="col-sm-6"><h3 style="background-color:transparent;"><label><img src="../../web/css/logo.png"> <label></h3></div>
<h3></h3>

 
  <div class="col-sm-4" style="text-align: right;">
    <h4>
    <label>
   <a href="#"><span class="glyphicon glyphicon-calendar" style="color: white;margin-left: 0px;"></span></a> 
   <a href="#"><span class="glyphicon glyphicon-bell" style="color: white;margin-left: 0px;"><span class="badge badge-warning" style="background-color:gold; ">4</span></span></a> 
   <a href="#"><span class="glyphicon glyphicon-envelope" style="color: white;margin-right: 0px;"><span class="badge badge-warning" style="background-color:red; ">1</span></span></a> 
      <span class="glyphicon glyphicon-enveloe" style="color: white;margin-left: 0px;"></span>



      
    </label>
    </h4>
</div>
 


        

            <?php $f = ActiveForm::begin([
  
]);
?>

 
   <?=
   Yii::$app->user->isGuest ?
    Html::img("../../web/css/prfil.png", ["class" => "img-circle","width"=>"40px;","height"=>"40px;"]) :
      Html::img("../../web/".Yii::$app->user->identity->logo, ["class" => "img-circle","width"=>"40px;","height"=>"40px;"]) 

       ?>




<?php $f->end() ?>
            
                    
       
    
</div>








<div class="wrp">

    <?php
    NavBar::begin([
        'brandLabel' => 'My Inventory',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);




    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
  Yii::$app->user->isGuest ?
            ['label' => Yii::t('app','Register'), 'url' => ['/site/register']]  :
             ['label' => Yii::t('app',''), 'url' => ['#']],///site/perfil
            ['label' => Yii::t('app','Management'),'items'=>[['label' => Yii::t('app','Areas'), 'url' => ['/site/vistaareas']],
            ['label' =>Yii::t('app','Assets'),'url'=>['/site/vistaactivos']],
            ['label' =>Yii::t('app','Materials'),'url'=>['/site/vistaactivos']]],
],
           
          


             Yii::$app->user->isGuest ?
             ['label' => 'whatever', 'url' => ['/site/index']]:
            !User::isUserAdmin( Yii::$app->user->identity->id )?

            ['label' => Yii::t('app','Tasks'), 'url' => ['/site/tarea']] :
            ['label' => Yii::t('app','Administration'), 'url' => ['/site/administracion']],
           
   
     
 
  
 
           
           
            Yii::$app->user->isGuest ?

                ['label' => 'Login', 'url' => ['/site/login']] :


                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],


   ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
           
            
                              
        ],

    ]);
    NavBar::end();
    ?>

    <div class="container">
        
        <?= $content ?>
    </div>
</div>


      <style>
          footer{
              background-image: url(../../web/css/Imagenes/bgBeforFooter.png);
              
          }
          footer img{
            width:35px;
          }
          footer h4{
            color:white;
          }
      </style>
      
<footer >
   <?php
   
   echo '<button class="language" id="es">'.Yii::t('app', 'Spanish').'</button>';
   echo '<button class="language" id="en">'.Yii::t('app', 'English').'</button>';
   ?>
<br>
   <center >
   <h4>Nos encontramos en una de las más bellas universidades : <span class="glyphicon glyphicon-heart"></span> La Cujae</h3>
   <h4>Puedes visitarnos en las redes sociales</h3>
   <a href="#"><img src="../../web/css/Imagenes/ico-facebook.png"></a>
   <a href="#"><img src="../../web/css/Imagenes/ico-twitter.png"></a>
   <a href="#"><img src="../../web/css/Imagenes/ico-youtube.png"></a>
   </center>
   <br>
    
    
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



