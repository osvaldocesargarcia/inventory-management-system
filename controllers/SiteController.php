<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarFormulario;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

use app\models\FormArea;
use app\models\FArea;

use app\models\FormValor;
use app\models\FValor;

use app\models\FormActivo;
    use app\models\FActivo;
use app\models\FormAuxiliarActivo;

use app\models\FormPropiedad;
use app\models\FPropiedad;

use app\models\FormRolusuario;
use app\models\FRolusuario;

use app\models\FormTipoactivo;
use app\models\FTipoactivo;

use app\models\FormTipoactivomaterial;
use app\models\FTipoactivomaterial;

use app\models\FormTipoactivopropiedad;
use app\models\FTipoactivopropiedad;

use app\models\FormAreaSearch;
use yii\helpers\Html;

use app\models\Alumnos;
use app\models\FormAlumnos;

use app\models\FormRegister;
use app\models\Users;

use app\models\FPropiedadValor;
use app\models\FormPropiedadValor;

use app\models\FNotificacion;
use app\models\FormNotificacion;
use app\models\FormCrearNotificacion;


use yii\web\Session;
use app\models\FormRecoverPass;
use app\models\FormResetPass;
use app\models\User;
use yii\data\Pagination;
use Mpdf\Mpdf;




class SiteController extends Controller
{


public function actionCreartiposugerido(){

  if(Yii::$app->request->post())
        {
            $id_notificacion = Html::encode($_POST["id"]);
            $notificacion = FNotificacion::find()->where(["id_notificacion"=>$id_notificacion])->one();
            $tipo= new FTipoActivo;
            $tipo->nombre_activo=$notificacion->nombre;

            if($tipo->insert()){

            if((int) $id_notificacion)
            {
                if(FNotificacion::deleteAll("id_notificacion=:id_notificacion", [":id_notificacion" => $id_notificacion]))
                {
                    echo "notificacion con id $id_notificacion eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar , redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar , redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
            }              

            }

        }
        else
        {
            return $this->redirect(["site/sugerencias"]);
        } 
/*
if(Yii::$app->request->post())
        {
            $id_notificacion = Html::encode($_POST["id"]);
            $notificacion = FNotificacion::find()->where(["id_notificacion"=>$id_notificacion])->one();
            $tipo= new FTipoActivo;
            $tipo->nombre_activo=$notificacion->nombre;

            if($tipo->insert()){

            if((int) $id_notificacion)
            {
                if(FNotificacion::deleteAll("id_notificacion=:id_notificacion", [":id_notificacion" => $id_notificacion]))
                {
                    echo "notificacion con id $id_notificacion eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
                }
                else

                {
                    echo "Ha ocurrido un error al eliminar , redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar , redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
            }              

            }

        }
        else
        {
            return $this->redirect(["site/sugerencias"]);
        } 
*/

}


  public function actionDeletenotificacion(){

 if(Yii::$app->request->post())
        {
            $id_notificacion = Html::encode($_POST["id"]);
            if((int) $id_notificacion)
            {
                if(FNotificacion::deleteAll("id_notificacion=:id_notificacion", [":id_notificacion" => $id_notificacion]))
                {
                    echo "notificacion con id $id_notificacion eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar , redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar , redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/sugerencias")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/sugerencias"]);
        }  }


  public function actionSugerencias(){

$msg =null;
      $area=0;
      $destinatario =Yii::$app->user->identity->id;
      $query = "SELECT * FROM notificacion WHERE id_area = ";
      $query .=$area;
      $query .=" AND id_destinatario =";
      $query .=$destinatario;
      $query .="  ORDER BY fecha";
  

      $table = new FNotificacion;


      $model = $table->findBySql($query)->all();

   
$cant = 0;

    foreach ($model as $key ) {
$cant = $cant+1;
$usuario = Users::find()->where(["id"=>$key->id_remitente])->one();
$key->id_remitente = $usuario->username;
      # code...
    }
    if($cant==0){
      $msg="No hay mensajes";
    }else{
      $msg="Tienes ".$cant." mensaje(s)";
    }




    return $this->render('sugerencias',["model"=>$model,"msg"=>$msg]);

    return $this->render('sugerencias');
  }



  public function actionSugerirtipoactivo(){
    $model = new FormCrearNotificacion;
$msg = null;
     if($model->load(Yii::$app->request->post()))
        {
          $msg="algo";
$area = FArea::find()->where(["id_area"=>Yii::$app->user->identity->id_area])->one();
 if(   $area->jefe==Yii::$app->user->identity->username){

            if($model->validate())
            { 
              
               $table = new FNotificacion;
              $table->id_area = 0;
              $table->id_remitente= Yii::$app->user->identity->id;
              $table->id_destinatario = 1;
              $table->nombre = $model->nombre;
              $table->logo = "";
              $table->fecha= date('Y-m-d h:m:s');
             

         if ($table->insert())
                {
                    $msg = "Sugerencia enviada.";
                 $table->id_area=null;
                  $table->id_remitente=null;
                    $table->id_destinatario=null;
                        $table->nombre = null;
                        $table->fecha=null;
                        $table->logo=null;
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al enviar la sugerencia";
                }
  
            }
            else
            {
                $model->getErrors();
            }

 }else{
  return $this->render("vistapermiso");
 }

        }
      

    return $this->render('sugerirtipoactivo',["model"=>$model,"msg"=>$msg]);
  }




  public function actionVistanotificaciones(){
      $msg =null;
      $area=0;
      $destinatario =Yii::$app->user->identity->id;
      $query = "SELECT * FROM notificacion WHERE id_area != ";
      $query .=$area;
      $query .=" AND id_destinatario =";
      $query .=$destinatario;
      $query .="  ORDER BY fecha";
  

      $table = new FNotificacion;


      $model = $table->findBySql($query)->all();

   
$cant = 0;

    foreach ($model as $key ) {
$cant = $cant+1;
$usuario = Users::find()->where(["id"=>$key->id_remitente])->one();
$key->id_remitente = $usuario->username;
      # code...
    }
    if($cant==0){
      $msg="No hay mensajes";
    }else{
      $msg="Tienes ".$cant." mensaje(s)";
    }




    return $this->render('vistanotificaciones',["model"=>$model,"msg"=>$msg]);
  }



  public function actionNuevomensaje(){
    $model = new FormNotificacion;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            { 
               $table = new FNotificacion;
              $table->id_area = Yii::$app->user->identity->id_area;
              $table->id_remitente= Yii::$app->user->identity->id;
              $table->id_destinatario=$model->id_destinatario;
              $table->nombre = $model->nombre;
              $table->logo = Yii::$app->user->identity->logo;
              $table->fecha= date('Y-m-d h:m:s');
             

         if ($table->insert())
                {
                    $msg = "Mensaje enviado.";
                 $table->id_area=null;
                  $table->id_remitente=null;
                    $table->id_destinatario=null;
                        $table->nombre = null;
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al enviar el mensaje";
                }
  
            }
            else
            {
                $model->getErrors();
            }
        }
      







    return $this->render('nuevomensaje',["model"=>$model, 'msg' => $msg]);
  }


  public function actionDeshabilitaruser(){
    if(Yii::$app->request->post())
        {
            $id = Html::encode($_POST["id"]);
            if((int) $id)
            {
             $usuario = Users::find()->where(["id"=>$id])->one();
             if($usuario->activate){
              $usuario->activate = 0;
             }else{
              $usuario->activate=1;
             }             
             if($usuario->update()){

                echo "Usuario modificado correctamente, redireccionando ...";
                echo "<meta http-equiv='refresh' content='2; ".Url::toRoute("site/controlusuarios")."'>";
             }
              else{
              echo "Ha ocurrido un error al modificar el usuario, redireccionando ...";
                echo "<meta http-equiv='refresh' content='2; ".Url::toRoute("site/controlusuarios")."'>";
             }


            }
            else
            {
                echo "Ha ocurrido un error al modificar el usuario, redireccionando ...";
                echo "<meta http-equiv='refresh' content='2; ".Url::toRoute("site/controlusuarios")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/controlusuarios"]);
        }
        
  
  }


   


    public function actionControlusuarios(){

      $model=Users::find()->all();
      foreach ($model as $key ) {
        $area = FArea::find()->where(["id_area"=>$key->id_area])->one();
        if($area){
        $key->id_area=$area->nombre_area;  
      }else{
        $key->id_area='('.$key->id_area.') No existe';
      }
        

        # code...
      }
      return $this->render("controlusuarios",["model"=>$model]);
    }




    public function actionVistapropiedadvalor(){
        $table = new FPropiedadValor;

        $model = $table->find()->all();

      foreach ($model as $key ) {
        $propiedad = FPropiedad::find()->where(["id_propiedad"=>$key->id_propiedad])->one();
        $valor = FValor::find()->where(["id_valor"=>$key->id_valor])->one();
        if($propiedad){
        $key->id_propiedad=$propiedad->propiedades;  
        $key->id_valor = $valor->nombre_valor;

        }
        
        # code...
      }



      return $this->render("vistapropiedadvalor",["model"=>$model]);
    }


    public function actionExportlike(){
        $mpdf = new Mpdf();
           
      $area = 2;
      $model = FActivo::find()->where(["id_area"=>$area])->all();

      foreach ($model as $key ) {

        $tipo = FTipoactivo::find()->where(["id_tipo_activo"=>$key->id_tipo_activo])->one();
        if($tipo){
        $key->id_tipo_activo = $tipo->nombre_activo;
        }
        else{
          $key->id_tipo_activo = "No existe";
        }
        # code...
      }
      


      
        $mpdf->WriteHTML($this->renderPartial('reporte1', ["model" => $model]));
        $mpdf->Output('reporte1'.'.pdf','I');
    }


    public function actionReporte1(){
      
      $area = 2;
      if(!Yii::$app->user->isGuest){
        $area= Yii::$app->user->identity->id_area;

      }
      $query = "SELECT * FROM activo WHERE id_area = ";
      $query .=$area;
      $query .=" ORDER BY estado";
  

      $table = new FActivo;


      $model = $table->findBySql($query)->all();

      foreach ($model as $key ) {

        $tipo = FTipoactivo::find()->where(["id_tipo_activo"=>$key->id_tipo_activo])->one();
        if($tipo){
        $key->id_tipo_activo = $tipo->nombre_activo;
        }
        else{
          $key->id_tipo_activo = "No existe";
        }
        # code...
      }
      




      return $this->render("reporte1",["model"=>$model]);
    }





public function actionAdministracion(){

   if (!Yii::$app->user->isGuest) {
             if (User::isUserAdmin(Yii::$app->user->identity->id)){
 return $this->render('administracion');

             }else{
              return $this->render('vistapermiso');

             }
           }else{
return $this->render('vistapermiso');
           }



 
  
  
}

public function actionTarea(){


  return $this->render('tarea');
}


public function actionLanguage()
    {
        if(isset($_GET['lang']) && Yii::$app->language != $_GET['lang']){
            Yii::$app->session->set('langSelected', $_GET['lang']);
        }
    }







	public function actionCrearauxiliaractivo(){

 $model = new FormAuxiliarActivo;
        $msg = null;

        if($model ->load(Yii::$app->request->post())){
            if($model->validate()){
                $table = new FActivo;
                
                //se obtiene la instancia de el archivo subido
               
                $table->id_area = $model->id_area;
                $table->fecha_adquisicion = date('Y-m-d h:m:s');
                $table->id_tipo_activo=$model->id_tipo_activo;
                $table->estado = $model->estado;

                 $Tipo= FTipoActivo::find()->where(["id_tipo_activo" => $model->id_tipo_activo])->one();
                $imageName = $model->id_area . $Tipo->nombre_activo;
                


                $model->file = UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                $w = $model->file->extension;
                
                //guardar la ruta en la bd
                $model->file='uploads/'.$imageName.'.'.$w;
                $table->logo=$model->file;


                if($table->insert()){
                    $msg="Activo agregado satisfactoriamente";
                  
                    $model->id_area = null;
                    $model->fecha_adquisicion = null;
                    $model ->estado=null;
                }
                else{
                    $msg="Ha ocurrido un error al intentar insertar el nuevo Activo";
                }
            }
            else{
                $model->getErrors();
            }

        }

		return $this->render('crearauxiliaractivo',['model'=>$model]);
	}


	public function actionPerfil(){

		$table = Users::findOne(Yii::$app->user->identity->id);
        $model = $table;

$table = new FArea;
   $model = $table->find(Yii::$app->user->identity->id_area)->one();

		return $this->render('perfil');
	}




  public function actionRecoverpass()
 {
  //Instancia para validar el formulario
  $model = new FormRecoverPass;
  
  //Mensaje que será mostrado al usuario en la vista
  $msg = null;
  
  if ($model->load(Yii::$app->request->post()))
  {
   if ($model->validate())
   {
    //Buscar al usuario a través del email
    $table = Users::find()->where("email=:email", [":email" => $model->email]);
    
    //Si el usuario existe
    if ($table->count() == 1)
    {
     //Crear variables de sesión para limitar el tiempo de restablecido del password
     //hasta que el navegador se cierre
     $session = new Session;
     $session->open();
     
     //Esta clave aleatoria se cargará en un campo oculto del formulario de reseteado
     $session["recover"] = $this->randKey("abcdef0123456789", 200);
     $recover = $session["recover"];
     
     //También almacenaremos el id del usuario en una variable de sesión
     //El id del usuario es requerido para generar la consulta a la tabla users y 
     //restablecer el password del usuario
     $table = Users::find()->where("email=:email", [":email" => $model->email])->one();
     $session["id_recover"] = $table->id;
     
     //Esta variable contiene un número hexadecimal que será enviado en el correo al usuario 
     //para que lo introduzca en un campo del formulario de reseteado
     //Es guardada en el registro correspondiente de la tabla users
     $verification_code = $this->randKey("abcdef0123456789", 8);
     //Columna verification_code
     $table->verification_code = $verification_code;
     //Guardamos los cambios en la tabla users
     $table->save();
     
     //Creamos el mensaje que será enviado a la cuenta de correo del usuario
     $subject = "Recuperar password";
     $body = "<p>Copie el siguiente código de verificación para restablecer su password ... ";
     $body .= "<strong>".$verification_code."</strong></p>";
     $body .= "<p><a href='http://yii.local/index.php?r=site/resetpass'>Recuperar password</a></p>";

     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($model->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();
     
     //Vaciar el campo del formulario
     $model->email = null;
     
     //Mostrar el mensaje al usuario
     $msg = "Le hemos enviado un mensaje a su cuenta de correo para que pueda resetear su password";
    }
    else //El usuario no existe
    {
     $msg = "Ha ocurrido un error";
    }
   }
   else
   {
    $model->getErrors();
   }
  }
  return $this->render("recoverpass", ["model" => $model, "msg" => $msg]);
 }
 




 public function actionVisualactivos(){


         $table = new FActivo;


        $model = $table->find()->where(["id_area" => Yii::$app->user->identity->id_area])->all();

        foreach ($model as $key ) {
          $tipo = FTipoactivo::find()->where(["id_tipo_activo"=>$key->id_tipo_activo])->one();
          if($tipo){
          $key->fecha_adquisicion=$tipo->nombre_activo;
        }else{
          $key->fecha_adquisicion="No especificado";
          # code...
        }
        }


              if (Yii::$app->user->isGuest) {
             return $this->redirect(["site/vistapermiso"]);
   }
         
          
    else{
     return $this->render("visualactivos", ["model" => $model]);   
    }

        
        return $this->render('visualactivos');
    }     


    public function actionFactivoupdate(){

    	$model = new FormActivo;
        $msg = null;
        
         if (!Yii::$app->user->isGuest) {
           if (Yii::$app->request->get("id_activo"))
        {
            $id_activo = Html::encode($_GET["id_activo"]);
            if ((int) $id_activo)
            {
                $table = FActivo::findOne($id_activo);
                if($table)
                 
                {   $area = FArea::findOne($table->id_area);
                    $tipo = FTipoActivo::findOne($table->id_tipo_activo);
                    $model->id_area = $table->id_area;
                    $model->fecha_adquisicion=$table->fecha_adquisicion;
                    $model->estado = $table->estado;
                    $model->file = $table->logo;
                    $model->id_tipo_activo=$table->id_tipo_activo;


                  
                     $value = "";
                     if($tipo){
        $arrayTP = FTipoactivopropiedad::find()->where(["id_tipo_activo"=>$tipo->id_tipo_activo])->all();
        $valorProp="";
        foreach ($arrayTP as $TP ) {
          $prop=FPropiedad::find()->where(["id_propiedad"=>$TP->id_propiedad])->one();
          if($prop){
            $valorProp=$valorProp.' '.$prop->propiedades;
          }
          
          
          # code...
        }
        
          foreach ($arrayTP as $key ) {

     /*     $key->propiedades= $key->propiedades." : what ".$i;
          $i=$i+1;*/
          $arrayPV=FPropiedadValor::find()->where(["id_propiedad"=>$key->id_propiedad])->all();
         
          foreach ($arrayPV as $PV ) {
            # code...
            $valor = FValor::find()->where(["id_valor"=>$PV->id_valor])->one();
            $value = $value.'  '.$valor->nombre_valor;

          }
            if($value==""){
              $value = "---";
            }
           
          # code...
        }

                    $model->valores=$value;
                    $model->propiedades=$valorProp;
                  }else{
                    $model->propiedades="Especifique un tipo de activo";
                    $model->valores="Tipo de activo sin especificar";
                  }





                  if($tipo){
                    $model->nombre_activo=$tipo->nombre_activo;
         
                  }else{

                      $model->nombre_activo="No especificado";
                  }
                  if($area){
                    $model->nombre_area=$area->nombre_area;
                  }else{
                    $model->nombre_area = "Área no especificada";
                  }
                  
                

                }
                else
                {
                    return $this->redirect(["site/visualactivos"]);
                }
            }
            else
            {
                return $this->redirect(["site/visualactivos"]);
            }
        }
        else
        {
            return $this->redirect(["site/visualactivos"]);
        }


$area = FArea::find()->where(["id_area"=>$model->id_area])->one();


          if($model->load(Yii::$app->request->post()))
        {

          if(   $area->jefe==Yii::$app->user->identity->username){
            if($model->validate())
            {
                $table = FActivo::findOne(Html::encode($_GET["id_activo"]));
                if($table)
                {

                   $table->id_area  = $model->id_area;
                   $table->fecha_adquisicion =$model->fecha_adquisicion;
                    $table->estado =$model->estado ;
                   
                
                    
                   // $table->logo = "uploads/".$model->file;

                   $imageName = Html::encode($_GET["id_activo"]);
                   
                    $file = UploadedFile::getInstance($model,'file');
                    if($file){
                      $model->file=$file;
                             $w = $model->file->extension;
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
          //guardar la ruta en la bd
                    $model->file='uploads/'.$imageName.'.'.$w;
                    }
                   // $model->file = UploadedFile::getInstance($model,'file');
              
                    $table->logo=$model->file;

                    if ($table->update())
                    {
                        $msg = "El Activo ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El Activo no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El Activo seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }


          }else{
            return $this->render("vistapermiso");
          }
            
        }
        

        return $this->render('factivoupdate',["model" => $model]);

         }else{
          return $this->render("vistapermiso");
         }
        
       
    }
    



 public function actionResetpass()
 {
  //Instancia para validar el formulario
  $model = new FormResetPass;
  
  //Mensaje que será mostrado al usuario
  $msg = null;
  
  //Abrimos la sesión
  $session = new Session;
  $session->open();
  
  //Si no existen las variables de sesión requeridas lo expulsamos a la página de inicio
  if (empty($session["recover"]) || empty($session["id_recover"]))
  {
   return $this->redirect(["site/index"]);
  }
  else
  {
   
   $recover = $session["recover"];
   //El valor de esta variable de sesión la cargamos en el campo recover del formulario
   $model->recover = $recover;
   
   //Esta variable contiene el id del usuario que solicitó restablecer el password
   //La utilizaremos para realizar la consulta a la tabla users
   $id_recover = $session["id_recover"];
   
  }
  
  //Si el formulario es enviado para resetear el password
  if ($model->load(Yii::$app->request->post()))
  {
   if ($model->validate())
   {
    //Si el valor de la variable de sesión recover es correcta
    if ($recover == $model->recover)
    {
     //Preparamos la consulta para resetear el password, requerimos el email, el id 
     //del usuario que fue guardado en una variable de session y el código de verificación
     //que fue enviado en el correo al usuario y que fue guardado en el registro
     $table = Users::findOne(["email" => $model->email, "id" => $id_recover, "verification_code" => $model->verification_code]);
     
     //Encriptar el password
     $table->password = crypt($model->password, Yii::$app->params["salt"]);
     
     //Si la actualización se lleva a cabo correctamente
     if ($table->save())
     {
      
      //Destruir las variables de sesión
      $session->destroy();
      
      //Vaciar los campos del formulario
      $model->email = null;
      $model->password = null;
      $model->password_repeat = null;
      $model->recover = null;
      $model->verification_code = null;
      
      $msg = "Enhorabuena, password reseteado correctamente, redireccionando a la página de login ...";
      $msg .= "<meta http-equiv='refresh' content='5; ".Url::toRoute("site/login")."'>";
     }
     else
     {
      $msg = "Ha ocurrido un error";
     }
     
    }
    else
    {
     $model->getErrors();
    }
   }
  }
  
  return $this->render("resetpass", ["model" => $model, "msg" => $msg]);
  
 }    
  
 
 private function randKey($str='', $long=0)
    {
        $key = null;
        $str = str_split($str);
        $start = 0;
        $limit = count($str)-1;
        for($x=0; $x<$long; $x++)
        {
            $key .= $str[rand($start, $limit)];
        }
        return $key;
    }
  
 public function actionConfirm()
 {
    $table = new Users;
    if (Yii::$app->request->get())
    {
   
        //Obtenemos el valor de los parámetros get
        $id = Html::encode($_GET["id"]);
        $authKey = $_GET["authKey"];
    
        if ((int) $id)
        {
            //Realizamos la consulta para obtener el registro
            $model = $table
            ->find()
            ->where("id=:id", [":id" => $id])
            ->andWhere("authKey=:authKey", [":authKey" => $authKey]);
 
            //Si el registro existe
            if ($model->count() == 1)
            {
                $activar = Users::findOne($id);
                $activar->activate = 1;
                if ($activar->update())
                {
                    echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
                }
             }
            else //Si no existe redireccionamos a login
            {
                return $this->redirect(["site/login"]);
            }
        }
        else //Si id no es un número entero redireccionamos a login
        {
            return $this->redirect(["site/login"]);
        }
    }
 }
 
 public function actionRegister()
 {
  //Creamos la instancia con el model de validación
  $model = new FormRegister;
   
  //Mostrará un mensaje en la vista cuando el usuario se haya registrado
  $msg = null;
   
  //Validación mediante ajax
  if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
   
  //Validación cuando el formulario es enviado vía post
  //Esto sucede cuando la validación ajax se ha llevado a cabo correctamente
  //También previene por si el usuario tiene desactivado javascript y la
  //validación mediante ajax no puede ser llevada a cabo
  if ($model->load(Yii::$app->request->post()))
  {
   if($model->validate())
   {
    //Preparamos la consulta para guardar el usuario
    $table = new Users;
    $imageName= $model->username;
    $model->file = UploadedFile::getInstance($model,'file');
    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

    $model->file='uploads/'.$imageName.'.'.$model->file->extension;
    $table->logo = $model->file;





    $table->username = $model->username;
    $table->email = $model->email;
    $table->id_area = 1;
    //Encriptamos el password
    $table->password = crypt($model->password, Yii::$app->params["salt"]);
    //Creamos una cookie para autenticar al usuario cuando decida recordar la sesión, esta misma
    //clave será utilizada para activar el usuario
    $table->authKey = $this->randKey("abcdef0123456789", 200);
    //Creamos un token de acceso único para el usuario
    $table->accessToken = $this->randKey("abcdef0123456789", 200);

    // PARA QUE ESTE ACTIVADO DESDE EL PRINCIPIO ------> MODIFICAR DESPUES OJO OJO OJO OJO
    $table->activate = 1;



      
    

    if ($table->insert())
    {
     //Nueva consulta para obtener el id del usuario
     //Para confirmar al usuario se requiere su id y su authKey
     $user = $table->find()->where(["email" => $model->email])->one();
     $id = urlencode($user->id);
     $authKey = urlencode($user->authKey);
      
     $subject = "Confirmar registro";
     $body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
     $body .= "<a href='http://localhost/index/site/confirm&id=".$id."&authKey=".$authKey."'>Confirmar</a>";
      
     //Enviamos el correo
     Yii::$app->mailer->compose()
     ->setTo($user->email)
     ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
     ->setSubject($subject)
     ->setHtmlBody($body)
     ->send();
     
     $model->username = null;
     $model->email = null;
     $model->password = null;
     $model->password_repeat = null;
     
     $msg = "Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo";
    }
    else
    {
     $msg = "Ha ocurrido un error al llevar a cabo tu registro";
    }
     
   }
   else
   {
    $model->getErrors();
   }
  }
  return $this->render("register", ["model" => $model, "msg" => $msg]);
 }



        public function actionVistapermiso(){

             return $this->render("vistapermiso");

        }



         public function actionPropiedadupdate()
    {
        $model = new FormPropiedad;
        $msg = null;

            if (Yii::$app->request->get("id_propiedad"))
        {
            $id_propiedad = Html::encode($_GET["id_propiedad"]);
            if ((int) $id_propiedad)
            {
                $table = FPropiedad::findOne($id_propiedad);
                if($table)
                {
                    
                    $model->propiedades = $table->propiedades;
                   
                }
                else
                {
                    return $this->redirect(["site/vistapropiedades"]);
                }
            }
            else
            {
                return $this->redirect(["site/vistapropiedades"]);
            }
        }
        else
        {
            return $this->redirect(["site/vistapropiedades"]);
        }
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = FPropiedad::findOne($model->id_propiedad);
                if($table)
                {
                    $table->propiedades = $model->propiedades;
                   
                    if ($table->update())
                    {
                        $msg = "El propiedad ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El propiedad no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El propiedad seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }

        
        
    
        return $this->render("propiedadupdate", ["model" => $model, "msg" => $msg]);
    }




            public function actionUpdata()
    {
        $model = new FormAlumnos;
        $msg = null;
        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Alumnos::findOne($model->id_alumno);
                if($table)
                {
                    $table->nombre = $model->nombre;
                    $table->apellidos = $model->apellidos;
                    $table->clase = $model->clase;
                    $table->nota_final = $model->nota_final;
                    if ($table->update())
                    {
                        $msg = "El Alumno ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El Alumno no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El alumno seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if (Yii::$app->request->get("id_alumno"))
        {
            $id_alumno = Html::encode($_GET["id_alumno"]);
            if ((int) $id_alumno)
            {
                $table = Alumnos::findOne($id_alumno);
                if($table)
                {
                    $model->id_alumno = $table->id_alumno;
                    $model->nombre = $table->nombre;
                    $model->apellidos = $table->apellidos;
                    $model->clase = $table->clase;
                    $model->nota_final = $table->nota_final;
                }
                else
                {
                    return $this->redirect(["site/listaalumnos"]);
                }
            }
            else
            {
                return $this->redirect(["site/listaalumnos"]);
            }
        }
        else
        {
            return $this->redirect(["site/listaalumnos"]);
        }
        return $this->render("updata", ["model" => $model, "msg" => $msg]);
    }



    

          public function actionFareaupdate()
    {
         $model = new FormArea;
         $msg = null;
          
           if (!Yii::$app->user->isGuest) {
             if (User::isUserAdmin(Yii::$app->user->identity->id)){
              if (Yii::$app->request->get("id_area"))
        {
            $id_area = Html::encode($_GET["id_area"]);

            if ((int) $id_area)
            {

                $table = FArea::findOne($id_area);
                if($table)
                {
                  
                    $model->id_area = $table->id_area;
                    $model->nombre_area = $table->nombre_area;
                   
                }
                else
                {
                    return $this->redirect(["site/vistaareas"]);
                }
            }
            else
            {
                return $this->redirect(["site/vistaareas"]);
            }
        }
        else
        {
            return $this->redirect(["site/vistaareas"]);
        }


        
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = FArea::findOne($model->id_area);
                if($table)
                {
                    $table->nombre_area = $model->nombre_area;
                    $usuario = Users::find()->where(["id"=>$model->jefe])->one();
                    $table->jefe = $usuario->username;
                   
                    if ($table->update())
                    {
                        $msg = "El Area ha sido actualizado correctamente";
                    }
                    else
                    {
                        $msg = "El Area no ha podido ser actualizado";
                    }
                }
                else
                {
                    $msg = "El area seleccionado no ha sido encontrado";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        

        return $this->render("fareaupdate", ["model" => $model, "msg" => $msg]);
   

             }else{
              return $this->render("vistapermiso");
             }
           }  return $this->render("vistapermiso");

   }


    public function actionDeletepropiedad()
        {
            if(Yii::$app->request->post())
        {
            $id_propiedad = Html::encode($_POST["id_propiedad"]);
            if((int) $id_propiedad)
            {
                if(FPropiedad::deleteAll("id_propiedad=:id_propiedad", [":id_propiedad" => $id_propiedad]))
                {
                    echo "area con id $id_propiedad eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistapropiedades")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el propiedad, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistapropiedades")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el propiedad, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistapropiedades")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/vistapropiedades"]);
        }
    }

public function actionDeletematerial()
        {
            if(Yii::$app->request->post())
        {
            $id_material = Html::encode($_POST["id_material"]);
            if((int) $id_material)
            {
                if(FMaterial::deleteAll("id_material=:id_material", [":id_material" => $id_material]))
                {
                    echo "area con id $id_material eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el material, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el material, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/view"]);
        }
    }

public function actionDeletetipoactivo()
        {
            if(Yii::$app->request->post())
        {
            $id_tipo_activo = Html::encode($_POST["id_tipo_activo"]);
            if((int) $id_tipo_activo)
            {
                if(FTipoactivo::deleteAll("id_tipo_activo=:id_tipo_activo", [":id_tipo_activo" => $id_tipo_activo]))
                {
                    echo "area con id $id_tipo_activo eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistatipoactivo")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el tipo de activo, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistatipoactivo")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el tipo de activo, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistatipoactivo")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/vistatipoactivo"]);
        }
    }




public function actionDeleterolusuario()
        {
            if(Yii::$app->request->post())
        {
            $id_rol = Html::encode($_POST["id_rol"]);
            if((int) $id_rol)
            {
                if(FRolusuario::deleteAll("id_rol=:id_rol", [":id_rol" => $id_rol]))
                {
                    echo "area con id $id_rol eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistarolusuarios")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el rol, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistarolusuarios")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el rol, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistarolusuarios")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/vistarolusuarios"]);
        }
    }



public function actionDeleteactivo()
        {
            if(Yii::$app->request->post())
        {
            $id_activo = Html::encode($_POST["id_activo"]);
            if((int) $id_activo)
            {
                if(FActivo::deleteAll("id_activo=:id_activo", [":id_activo" => $id_activo]))
                {
                    echo "area con id $id_activo eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaactivos")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el activo, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaactivos")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el activo, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaactivos")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/vistaactivos"]);
        }
    }



    public function actionDeletearea()
        {
            if(Yii::$app->request->post())
        {
            $id_area = Html::encode($_POST["id_area"]);
            if((int) $id_area)
            {
                if(FArea::deleteAll("id_area=:id_area", [":id_area" => $id_area]))
                {
                    echo "area con id $id_area eliminado con éxito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaareas")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el area, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaareas")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el area, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/vistaareas")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/vistaareas"]);
        }
    }



      public function actionVistatipoactivopropiedades()
    {
        $table = new FTipoactivopropiedad;
        $model = $table->find()->all();
        foreach ($model as $key ) {
          # code...
          $propiedades=FPropiedad::find()->where(["id_propiedad"=>$key->id_propiedad])->one();
          $tipoactivo=FTipoActivo::find()->where(["id_tipo_activo"=>$key->id_tipo_activo])->one();
          if($tipoactivo){
          $key->id_tipo_activo=$tipoactivo->nombre_activo;
          }else{
            $key->id_tipo_activo="---";
          }
          if($propiedades){
          $key->id_propiedad=$propiedades->propiedades;  
          }else{
            $key->id_propiedad="---";
          }
          
        }

        return $this->render("vistatipoactivopropiedades", ["model" => $model]);
    }
    public function actionVistatipoactivomaterial()
    {
        $table = new FTipoactivomaterial;
        $model = $table->find()->all();
        return $this->render("vistatipoactivomaterial", ["model" => $model]);
    }
     public function actionVistatipoactivo()
    {
        $table = new FTipoactivo;
        $model = $table->find()->all();
        return $this->render("vistatipoactivo", ["model" => $model]);
    }

     public function actionVistarolusuarios()
    {
        $table = new FRolusuario;
        $model = $table->find()->all();
        return $this->render("vistarolusuarios", ["model" => $model]);
    }

 public function actionVistaactivos()
    {


        $table = new FActivo;
        
        $model = $table->find()->all();
        foreach ($model as $key) {
          $area = FArea::find()->where(["id_area"=>$key->id_area])->one();
          $tipo = FTipoactivo::find()->where(["id_tipo_activo"=>$key->id_tipo_activo])->one();
          if($area){

          $key->id_area=$area->nombre_area;
          # code... 
          }else{
           $key->id_area=" Área nº". $key->id_area." no encontrada";
          }
          if($tipo){
            $key->id_tipo_activo=$tipo->nombre_activo;
          }else{
            $key->id_tipo_activo="no especificado";
          }
        }

      
                               
              if (Yii::$app->user->isGuest) {
             return $this->redirect(["site/vistapermiso"]);
   }
         
          
    else{
     return $this->render("vistaactivos", ["model" => $model]);   
    }

        
    }

 public function actionVistapropiedades()
    {
        $table = new FPropiedad;

        $model = $table->find()->all();
        
        
        foreach ($model as $key ) {

     /*     $key->propiedades= $key->propiedades." : what ".$i;
          $i=$i+1;*/
          $arrayPV=FPropiedadValor::find()->where(["id_propiedad"=>$key->id_propiedad])->all();
          $value = "";
          foreach ($arrayPV as $PV ) {
            # code...
            $valor = FValor::find()->where(["id_valor"=>$PV->id_valor])->one();
            $value = $value.'  '.$valor->nombre_valor;

          }
            if($value==""){
              $value = "---";
            }
            $key->propiedades=$key->propiedades.' : '.$value; 
          # code...
        }

        return $this->render("vistapropiedades", ["model" => $model]);
    }

    public function actionVistaareas()
    {
        $table = new FArea;
        $model = $table->find()->all();

        $form = new FormAreaSearch;
        $search = null;
        if (Yii::$app->user->isGuest) {
             return $this->redirect(["site/vistapermiso"]);
   }
         
          
    else    if($form->load(Yii::$app->request->get()))
        {

  if ($form->validate() )
            {
                $search = Html::encode($form->q);
                $query = "SELECT * FROM area WHERE id_area LIKE '%$search%' OR ";
                $query .= "nombre_area LIKE '%$search%' ";
                $model = $table->findBySql($query)->all();
                 
            }

            else
            {
                $form->getErrors();
            }
        }
        return $this->render("vistaareas", ["model" => $model, "form" => $form, "search" => $search]);
     
    }
    
    public function actionListado(){
      $model = new FormTipoactivopropiedad;
      $model->listado = FTipoactivopropiedad::find()->where(["id_tipo_activo" => $model->id_tipo_activo])->all();

        return $this->redirect(["site/listado"],['model' => $model]);

    }


     public function actionCreartipoactivopropiedad()
    {
        $model = new FormTipoactivopropiedad;

        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            { 
               $table = new FTipoactivopropiedad;

                 


                $activo = $table->find()->all();
                $cant = 0;
                foreach ($activo as $actual ) {
                    if($actual->id_tipo_activo == $model->id_tipo_activo && $actual->id_propiedad==$model->id_propiedad){


                  $cant = $cant+1; 
                    }
                }
                if($cant==0){

                $table->id_tipo_activo = $model->id_tipo_activo;
                $table->id_propiedad = $model->id_propiedad;

                 

                
                if ($table->insert())
                {
                    $msg = "Se ha asignado correctamente la propiedad.";
                   $model->id_tipo_activo=null;
                   $model->id_propiedad=null;
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
              }else{
                $msg="<span style='color:red;'>Ya existe tal asignación. Revise las propiedades actuales de este activo </span> <a href='#'>Aqui</a>";
              }

               
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("creartipoactivopropiedad", ['model' => $model, 'msg' => $msg]);
    }





     public function actionCreartipoactivomaterial()
    {
        $model = new FormTipoactivomaterial;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new FTipoactivomaterial;
                $table->id_tipo_activo = $model->id_tipo_activo;
                $table->id_material = $model->id_material;

                 

                
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                   $model->id_tipo_activo=null;
                   $model->id_material=null;
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("creartipoactivomaterial", ['model' => $model, 'msg' => $msg]);
    }




    public function actionCreartipoactivo()
    {
        $model = new FormTipoactivo;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new FTipoactivo;
                $table->nombre_activo = $model->nombre_activo;
                
                 
                 

                
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                   $model->nombre_activo=null;
                  
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("creartipoactivo", ['model' => $model, 'msg' => $msg]);
    }



      public function actionCrearrolusuario()
    {
        $model = new FormRolusuario;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new FRolusuario;
                $table->nombre_rol = $model->nombre_rol;
                
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                    $model->nombre_rol = null;
                   
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("crearrolusuario", ['model' => $model, 'msg' => $msg]);
    }

      public function actionCrearpropiedadvalor(){

        $model = new FormPropiedadValor;

        return $this->render("crearpropiedadvalor",["model"=>$model]);
      }





	 public function actionCrearpropiedad()
    {
        $model = new FormPropiedad;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new FPropiedad;
                $table->propiedades = $model->propiedades;
               
                if ($table->insert())
                {
                    $msg = "Propiedad registrada, si desea agregarle valores toque <a href='#' >aquí</a>";
                  
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("crearpropiedad", ['model' => $model, 'msg' => $msg]);
    }


	
     public function actionView()
    {
        $table = new FMaterial;
        $model = $table->find()->all();
        return $this->render("view", ["model" => $model]);
    }



    public function actionCrearactivo(){

        $model = new FormActivo;
        $msg = null;

        if($model ->load(Yii::$app->request->post())){
            if($model->validate()){
                $table = new FActivo;
                
                //se obtiene la instancia de el archivo subido
                $imageName = $model->id_area;
                


                $model->file = UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                $w = $model->file->extension;
                
                //guardar la ruta en la bd
                $model->file='uploads/'.$imageName.'.'.$w;
                $table->logo=$model->file;
                $table->id_area = $model->id_area;
                $table->fecha_adquisicion = date('Y-m-d h:m:s');
                $table->estado = $model->estado;
                $table->id_tipo_activo = 1;

                if($table->insert()){
                    $msg="Activo agregado satisfactoriamente";
                  
                    $model->id_area = null;
                    $model->fecha_adquisicion = null;
                    $model ->estado=null;
                }
                else{
                    $msg="Ha ocurrido un error al intentar insertar el nuevo Activo";
                }
            }
            else{
                $model->getErrors();
            }

        }
		return $this->render("crearactivo",['model'=>$model,'msg'=>$msg]);
	}

    public function actionCreararea()
    {
        if (!Yii::$app->user->isGuest) {
             if (User::isUserAdmin(Yii::$app->user->identity->id))
   {
    $model = new FormArea;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new FArea;
                $id=$model->jefe;
                $nombre = Users::find()->where(["id" => $id])->one();
                $table->nombre_area = $model->nombre_area;
                $table->jefe = $nombre->username;
                
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                    
                    $model->nombre_area = null;
                    $model->jefe = null;
                    
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("creararea", ['model' => $model, 'msg' => $msg]);
   }
   else
   {
    return $this->redirect(["site/vistapermiso"]);
   }
        }
else{
    $this->redirect(["site/vistapermiso"]);
}
       
        
    }


 

        public function actionVistamateriales()
    {
        $table = new FormMaterial;
        $model = $table->find()->all();
        return $this->render("vistamateriales", ["model" => $model]);
    }






	public function actionCrearvalor(){

        $model = new FormValor;
        $msg = null;

        if($model ->load(Yii::$app->request->post())){
            if($model->validate()){
                $table = new FValor;
                
                $table->nombre_valor = $model->nombre_valor;

                if($table->insert()){
                    $msg="valor agregado satisfactoriamente";
                  
                    $model->nombre_valor = null;
                }
                else{
                    $msg="Ha ocurrido un error al intentar insertar el nuevo valor";
                }
            }
            else{
                $model->getErrors();
            }

        }
		return $this->render("crearvalor",['model'=>$model,'msg'=>$msg]);
	}




	public function actionFormulario($mensaje = null){

		return $this->render("formulario",["mensaje"=>$mensaje]);

	}
	



	public function actionRequest(){

		$mensaje = null;

		if(isset($_REQUEST["nombre"])){

		$mensaje = "Datos insertados/enviados whatever" . $_REQUEST["nombre"];
	
		}
		$this->redirect(["site/formulario","mensaje" => $mensaje]); 
		}


	public function actionValidarformulario(){

		$model = new ValidarFormulario;
		if($model->load(Yii::$app->request->post())){
			if($model->validate()){
				// consultar BD o algo etcc....
			}
			else{
				$model->getErrors();
			}
		}
		return $this->render("validarformulario",["model"=> $model]);
	}



        public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'user', 'admin'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'admin'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout', 'user'],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                ],
            ],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionLogin()
    {
        
 
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
   
            if (User::isUserAdmin(Yii::$app->user->identity->id))
   {
    return $this->redirect(["site/index"]);
   }
   else
   {
    return $this->redirect(["site/index"]);
   }
   
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
