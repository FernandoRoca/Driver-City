<?php
$latitud=0;
$longitud=0;
if( base64_decode(@$_GET['latitud'])!="")
 $latitud=base64_decode(@$_GET['latitud']);
else
 $latitud= "-17.78143396654841";  
if( base64_decode(@$_GET['longitud'])!="")
$longitud=base64_decode(@$_GET['longitud']);
else
$longitud="-63.17617781981198";    
$zoom= "15";
$tipo_mapa = "ROADMAP";


// LONGITUD Y LATITUD SI ESTAN COMO PARAMETROS LOS COJO
if (isset($_GET["lon"])) $longitud= $_GET["lon"];
if (isset($_GET["lat"])) $latitud= $_GET["lat"];

// ZOOM ENTRE 0 y 19
if (isset($_GET["zoom"])) {$zoom= $_GET["zoom"];}
if (($zoom<=0) || ($zoom>=20)){ $zoom= "17";}


// TIPO DE MAPA
if (isset($_GET["tipo"])) $tipo_mapa= strtoupper($_GET["tipo"]);

// COMPRUEBO QUE EL TIPO ES UNO DE LOS QUE ACEPTA GOOGLE
if ($tipo_mapa == "SATELLITE") $error=0;
else
  if ($tipo_mapa == "ROADMAP") $error=0;
  else
    if ($tipo_mapa == "TERRAIN")$error=0;
    else $tipo_mapa = "HYBRID";




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" name="viewport" content="initial-scale=1.0; user-scalable=no,text/html; charset=UTF-8" />
<?php
include_once('Helper.php');
include_once('Mapa.php');
?>
</head>
<body  >
    <?php
include_once('Menu.php');
?>

  <div class="container">


   <div align="center"> </br></div>

  <hr>




        <a name="mundial"> <div class="content_adm" align="center"></a>


           <h1>Gestionar Negocio</h1>
                        <?php
                        
                        $id_negocio=  base64_decode(@$_GET['id_negocio']);
                        $id_principal=  base64_decode(@$_GET['id_principal']);
                        $nombre=  base64_decode(@$_GET['nombre']);
                        $direccion=base64_decode(@$_GET['direccion']);
                        $descripcion=base64_decode(@$_GET['descripcion']);
                         $web=base64_decode(@$_GET['web']);
                         $logo=base64_decode(@$_GET['logo']);
                         $Fecha_Inicio= base64_decode(@$_GET['fecha_inicio']);
                        $Fecha_Final=base64_decode(@$_GET['fecha_final']);

                        


                        ?>
    <form name="form_mapa" method="post" enctype="multipart/form-data" style="text-align: center">
        <p> Tipo Principal:</p>
        <select id="Principal" name="Principal">
           <?php
           require('../../Negocio/Negocio_Principal.php');
            $objN_Principal=new Negocio_Principal();
             $objN_Principal->Combo_Principal($id_principal);
           ?>
        </select>
         <p> Nombre:</p>

        <input type="text" value="<?php echo $nombre ?>" name="Nombre" />
        <p> Direccion:</p>

        <input type="text" value="<?php echo $direccion ?>" name="Direccion"/>
        <p> Descripcion:</p>
        <textarea name="Descripcion" id="Descripcion"><?php echo $descripcion ?></textarea>
        <p> WEB:</p>

        <input type="text" value="<?php echo $web ?>" name="WEB" />
          <p> Logo:</p>
        <input name="archivo" type="file" class="casilla" id="archivo" style="color: #ffffff;" size="35" value="<?php echo $logo ?>"/>

         <?php
      if($logo!=""){
      ?>
     
         <p>  Mantener Imagen:</p>
        <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" /> <p>      <?php echo $logo ?></p> <img src="../../img/Logo_Negocio/<?php echo $logo ?>"/>

         <?php
      }
      ?>
        <p> Fecha Inicio:

        </p>
        <input type="text" name="TFechaI" class="tcal" value="<?php echo $Fecha_Inicio ?>"  readonly="readonly" />

        <p>Fecha Final:

        </p>
        <input type="text" name="TFechaF" class="tcal" value="<?php echo $Fecha_Final ?>"  readonly="readonly" />
        <p >Latitud:</p>
        <input type="text" name="latitud" value="<?php echo $latitud;?>"  />

         <p >Longitud:</p>
	   <input type="text" name="longitud" value="<?php echo $longitud;?>" />
	   <br><br>


        <input type="button" value="Ubicar" onclick="codeLatLon()">


       <br><br>
      <?php
    if($id_negocio>0 && $nombre!=""){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" />
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Negocio" />
      <?php
      }

      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
        <input name="action" type="hidden" value="upload" />    
</form>

        </div>
               </div>

    <div  id="mapCanvas"></div>

<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Negocio.php';</script>";
 }
require('../../Negocio/Negocio_Negocio.php');
$objN_Negocio=new Negocio_Negocio();
   if($id_negocio>0 && $nombre==""){

     $objN_Negocio->Eliminar_logo_Negocio($id_negocio);
 }
  if (@$_REQUEST['Modificar'] == "Modificar"){
     
     
     if((isset($_POST["Mantener_Imagen"]))) 
 {         
         
   $objN_Negocio->Modificar_Sin_Logo_Negocio($id_negocio,$_POST["Principal"],$_POST["Nombre"],$_POST["Direccion"],$_POST["Descripcion"],$_POST["WEB"],$_POST["latitud"],$_POST["longitud"],$_POST["TFechaI"],$_POST["TFechaF"]);     
 }  
    else{ 
     
     
      
                                    $status = "";
                                    $direccion_img ="";

                                    // obtenemos los datos del archivo 
                                    $tamano = $_FILES["archivo"]['size'];
                                    $tipo = $_FILES["archivo"]['type'];
                                    $archivo = $_FILES["archivo"]['name'];
                                    $prefijo = substr(md5(uniqid(rand())),0,6);

                                    if ($archivo != "") {
                                    // guardamos el archivo a la carpeta files
                                    $destino =  "../../img/Logo_Negocio/".$prefijo."_".$archivo;
                                    $direccion_img="".$prefijo."_".$archivo;
                                    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
                                    $status = "Archivo subido: <b>".$archivo."</b>";
                                    } else {
                                    $status = "Error al subir el archivo";
                                    }
                                    } else {
                                    $status = "Error al subir archivo";
                                    }

 
 $objN_Negocio->Modificar_Logo_Negocio($id_negocio,$_POST["Principal"],$_POST["Nombre"],$_POST["Direccion"],$_POST["Descripcion"],$_POST["WEB"],$direccion_img,$_POST["latitud"],$_POST["longitud"],$_POST["TFechaI"],$_POST["TFechaF"]);
         
    }   
 }
if (@$_REQUEST['enviar'] == "Subir Negocio"){
      
        $status = "";
        $direccion_img ="";
if ($_POST["action"] == "upload") {
  // obtenemos los datos del archivo 
  $tamano = $_FILES["archivo"]['size'];
  $tipo = $_FILES["archivo"]['type'];
  $archivo = $_FILES["archivo"]['name'];
  $prefijo = substr(md5(uniqid(rand())),0,6);
  
  if ($archivo != "") {
    // guardamos el archivo a la carpeta files
    $destino =  "../../img/Logo_Negocio/".$prefijo."_".$archivo;
                $direccion_img="".$prefijo."_".$archivo;
    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
      $status = "Archivo subido: <b>".$archivo."</b>";
    } else {
      $status = "Error al subir el archivo";
    }
  } else {
    $status = "Error al subir archivo";
  }
}
 
 $objN_Negocio->Insertar_Negocio($_POST["Principal"],$_POST["Nombre"],$_POST["Direccion"],$_POST["Descripcion"],$_POST["WEB"],$direccion_img,$_POST["latitud"],$_POST["longitud"],$_POST["TFechaI"],$_POST["TFechaF"]);
}
?>
</br></br>

<?php
$objN_Negocio->Tabla_Negocio();
?>








<?php
include_once('Footer.php');
?>














</body>
</html>