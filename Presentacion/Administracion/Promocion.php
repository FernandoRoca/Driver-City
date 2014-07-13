
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include_once('Helper.php');
?>
   
  </head>

  <body>
<?php
include_once('Menu.php');
?>

  <div class="container">

 
   <div align="center"> </br></div>
   
  <hr>
    
       


        <a name="mundial"> <div class="content_adm" align="center"></a>
                           
                                
           <h1>Gestionar Promocion</h1>
                                     <?php
      
      
                          
                        $id_promocion=  base64_decode(@$_GET['id_promocion']);
                        $id_negocio=  base64_decode(@$_GET['id_negocio']);
                        $id_dia=  base64_decode(@$_GET['id_dia']);
                        $imagen=base64_decode(@$_GET['imagen']);
                        $fecha_inicio=base64_decode(@$_GET['fecha_inicio']);
                        $fecha_fin=base64_decode(@$_GET['fecha_fin']);
                        
                      
                        
                        ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         <p> Negocio:</p>
        <select id="Negocio" name="Negocio">
           <?php
           require('../../Negocio/Negocio_Negocio.php');
            $objN_Negocio=new Negocio_Negocio();
             $objN_Negocio->Combo_Negocio($id_negocio);
           ?>
        </select>
         <p> Dia:</p>
        <select id="Dia" name="Dia">
           <?php
           require('../../Negocio/Negocio_Dia.php');
            $objN_Dia=new Negocio_Dia();
            if($id_promocion==0)
             $objN_Dia->Combo_Dia($id_dia);
            else
              $objN_Dia->Combo_Modificacion_Dia($id_dia);   
           ?>
        </select>
      
        <p> Imagen:</p>
        <input name="archivo" type="file" class="casilla" id="archivo" size="35" value="<?php echo $imagen ?>"/>

         <?php
      if($imagen!=""){
      ?>

         <p>  Mantener Imagen:</p>
        <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" /><a href="../../img/Imagen_Promocion/<?php echo $imagen ?>"><p>      <?php echo $imagen ?></p></a>

         <?php
      }
      ?>
        <p> Fecha Inicio:

        </p>
        <input type="text" name="TFechaI" class="tcal" value="<?php echo $fecha_inicio ?>"  readonly="readonly" />

        <p>Fecha Final:

        </p>
        <input type="text" name="TFechaF" class="tcal" value="<?php echo $fecha_fin ?>"  readonly="readonly" />
       
        
        
        
       <br><br>
      <?php
    if($id_promocion>0 && $id_negocio>0 && $id_dia>0){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Promocion" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    <input name="action" type="hidden" value="upload" /> 
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Promocion.php';</script>";
 }
require('../../Negocio/Negocio_Promocion.php');
$objN_Promocion=new Negocio_Promocion();
   if($id_promocion>0 && $id_negocio>0 && $id_dia==0){
    
     $objN_Promocion->Eliminar_Imagen_Promocion($id_promocion);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
     
     if((isset($_POST["Mantener_Imagen"]))) 
 {         
         
   $objN_Promocion->Modificar_Sin_Imagen_Promocion($id_promocion,$_POST["Negocio"],$_POST["Dia"],$_POST["TFechaI"],$_POST["TFechaF"]);     
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
                                    $destino =  "../../img/Imagen_Promocion/".$prefijo."_".$archivo;
                                    $direccion_img="".$prefijo."_".$archivo;
                                    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
                                    $status = "Archivo subido: <b>".$archivo."</b>";
                                    } else {
                                    $status = "Error al subir el archivo";
                                    }
                                    } else {
                                    $status = "Error al subir archivo";
                                    }

 
 $objN_Promocion->Modificar_Imagen_Promocion($id_promocion,$_POST["Negocio"],$_POST["Dia"],$direccion_img,$_POST["TFechaI"],$_POST["TFechaF"]);
         
    }   
 }
if (@$_REQUEST['enviar'] == "Subir Promocion"){
      
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
    $destino =  "../../img/Imagen_Promocion/".$prefijo."_".$archivo;
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

 $objN_Promocion->Insertar_Promocion($_POST["Negocio"],$_POST["Dia"],$direccion_img,$_POST["TFechaI"],$_POST["TFechaF"]);
}
?>
</br></br>

<?php
$objN_Promocion->Tabla_Promocion();
?>


    

            
      </div>
      
         
<?php
include_once('Footer.php');
?>
      

   
    </div><!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
  </body>
</html>
