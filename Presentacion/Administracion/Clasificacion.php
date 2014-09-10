
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <a name="mundial"></a>
        <div class="content_adm" align="center">
                    
            <h1>Gestionar Clasificacion</h1>
            
            <?php
            $id_clasificacion   = base64_decode(@$_GET['id_clasificacion']);
            $nombre             = base64_decode(@$_GET['nombre']);
            $imagen        = base64_decode(@$_GET['imagen']);
            
            
            ?>
            
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            

            <p> Clasificacion </p>
            <input type="text" value="<?php echo $nombre ?>" name="Nombre" />

              <p> Imagen:</p>
        <input name="archivo" type="file" class="casilla" id="archivo" style="color: #ffffff;" size="35" value="<?php echo $imagen ?>"/>

         <?php
      if($imagen!=""){
      ?>
     
         <p>  Mantener Imagen:</p>
        <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" /> <p>      <?php echo $imagen ?></p> <img src="../../img/Imagen_Clasificacion/<?php echo $imagen ?>"/>

         <?php
      }
      ?>

            
            <br><br>
            <?php
            	if($id_clasificacion>0 && $nombre!=""){
            ?>
            
            <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
            
            <?php
            }else{
            ?>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Guardar Clasificacion" />
           
            <?php
            }
            ?>
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
        <?php
        if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Clasificacion.php';</script>";
        }

        require('../../Negocio/Negocio_Clasificacion.php');
        $objN_Clasificacion = new Negocio_Clasificacion();
            

        if($id_clasificacion>0 && $nombre==""){
            $objN_Clasificacion->Eliminar_Clasificacion($id_clasificacion);
            echo "<script> location.href='Clasificacion.php';</script>";
        }
        
        
        	
       if (@$_REQUEST['Modificar'] == "Modificar"){
     
     
     if((isset($_POST["Mantener_Imagen"]))) 
 {         
         
   $objN_Clasificacion->Modificar_Clasificacion_sin_Imagen(
                                        $id_clasificacion,
                                        $_POST["Nombre"]
                                           );
            echo "<script> location.href='Clasificacion.php';</script>";
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
                                    $destino =  "../../img/Imagen_Clasificacion/".$prefijo."_".$archivo;
                                    $direccion_img="".$prefijo."_".$archivo;
                                    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
                                    $status = "Archivo subido: <b>".$archivo."</b>";
                                    } else {
                                    $status = "Error al subir el archivo";
                                    }
                                    } else {
                                    $status = "Error al subir archivo";
                                    }

 
  $objN_Clasificacion->Modificar_Clasificacion_sin_Imagen(
                                        $id_clasificacion,
                                        $_POST["Nombre"],
                                            $direccion_img
                                           );
         
    }   
 }		
        if (@$_REQUEST['Enviar'] == "Guardar Clasificacion"){
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
            $objN_Clasificacion->Insertar_Clasificacion(
                                        $_POST["Nombre"],
                                       $direccion_img
                                            );
          
        }
        ?>
        
        </br></br>
        
        <?php
            $objN_Clasificacion->Tabla_Clasificacion();
        ?>
        
	</div><!-- fin de container -->
     
	<?php
    include_once('Footer.php');
    ?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
</body>
</html>
