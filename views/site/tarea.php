

<style type="text/css">
  .panel-default:hover{
    background-color: rgba(0,0,0,0.2);
     border-bottom: 3px solid #cc9900;
  }
</style>

<script>
    /**
     * Array con las imagenes y enlaces que se iran mostrando en la web
     */
    var imagenes=new Array(
        ['../../web/css/Articulos/Asus.png','#'],
        ['../../web/css/Articulos/impresoraCanon.png','#'],
        ['../../web/css/Articulos/irlanda1a.png','#'],
        ['../../web/css/Articulos/lenovo.png','#'],
        ['../../web/css/Articulos/mesa2.png','#'],
        ['../../web/css/Articulos/mesaMadera.png','#'],
        ['../../web/css/Articulos/pc.png','#'],
        ['../../web/css/Articulos/plasma.png','#'],
        ['../../web/css/Articulos/silla1.png','#'],
        ['../../web/css/Articulos/sillaMadera.png','#'],
        ['../../web/css/Articulos/sillaPlastico.png','#']
    );
 
    /**
     * Funcion para cambiar la imagen y link
     */
    function rotarImagenes()
    {
        // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
        var index=Math.floor((Math.random()*imagenes.length));
 
        // cambiamos la imagen y la url
        
        document.getElementById("imagen").src=imagenes[index][0];
        document.getElementById("link").href=imagenes[index][1];
        $('#imagen').show(400).delay(5000).hide(1000);
        
    }
 
    /**
     * Función que se ejecuta una vez cargada la página
     */
    onload=function()
    {
        // Cargamos una imagen aleatoria
        rotarImagenes();
      //  $('#imagen').show(300).delay(1000).hide(300);
 
        // Indicamos que cada 5 segundos cambie la imagen
        setInterval(rotarImagenes,6400);
        
    }
</script>


<h1 style="
font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    "><?=Yii::t('app','Tasks')?></h1>
<div class="row" >
	<div class="col-md-4" >
	   <div class="option animated fadeInDown" style="height: 400px;">
		<a href="" id="link"><img src="../../web/css/Articulos/plasma.png" id="imagen" style="width:100%; max-width: 400px;height: 400px;"></a>
	   </div>	
	</div>
  <div class="col-md-1">
        
  </div>
  <div class="col-md-5" align="right" >
     
     <br><br>
     <em>
     <div class="option animated fadeInRight" id="primero" style=" -webkit-animation-delay: 0.1s;-webkit-animation-duration: 1.7s;">
    <h1><?=Yii::t('app','New Assets')?></h1>
    </div>
    <div class="option animated fadeInRight" id="segundo" style=" -webkit-animation-delay: 0.2s;-webkit-animation-duration: 1.7s;">
    <h1><?=Yii::t('app','Better inventory control')?></h1>
    </div>
    <div class="option animated fadeInRight" id="tercero" style=" -webkit-animation-delay: 0.4s;-webkit-animation-duration: 1.7s;">
    <h1><?=Yii::t('app','Efficient management')?></h1>
    </div>
    </em>
    <br>
     </div> 

  </div>
	
</div>
	<br>
<center><h1><span class="glyphicon glyphicon-check"></span></h1>
<h1><em><?=Yii::t('app','¿ What do you desire to do today ?')?></em></h1>
</center>
<br><br><br><br>
<div class="row">
      <div class="col-md-1">
        
      </div>
      <div class="col-md-3" >

            <div class="panel-default" ">
            <center> <h3><strong> <?=Yii::t('app','Areas')?> </strong> </h3>
          <a href="#">  <h1><span class="glyphicon glyphicon-map-marker"></span></h1></a>
            <br>
            <h4> <?=Yii::t('app','Check my area information')?>            
            </h4>

            </center>
              
               
                
            </div>
        
      </div>
      
      <div class="col-md-4" >
            <div class="panel-default" ">
            <center> <h3><strong><?=Yii::t('app','Mail')?></strong></h3>
            <a href="vistanotificaciones"><h1><span class="glyphicon glyphicon-envelope"></span></h1></a>
            <br>
            <h4><?=Yii::t('app','Check your mail. Contact whit users')?>
              
            </h4>

            </center>
              
               
                
            </div>
        
      </div>

      <div class="col-md-3" >
            <div class="panel-default" ">
            <center> <h3><strong><?=Yii::t('app','Assets')?></strong></h3>
           <a href="visualactivos"> <h1><span class="glyphicon glyphicon-pencil"></span></h1></a>
            <br>
            <h4> <?=Yii::t('app','List of actual assets in my area')?>
              
            </h4>

            </center>
              
               
                
            </div>
        
      </div>
      <div class="col-md-1">
        
      </div>
        
      </div>
<br><br><br><br><br><br><br><br><br>

<center><img src="../../web/css/Imagenes/claves.png" style="width: 60%;"></center>




	<br><br><br><br><br><br><br><br><br><br><br>