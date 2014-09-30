
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
                           
                                
           <h1>Gestionar Imagen Negocio</h1>
                                     <?php
      
      
                          
                        $id_imagen_negocio=  base64_decode(@$_GET['id_imagen_negocio']);
                        $id_negocio=  base64_decode(@$_GET['id_negocio']);
                        $ubicacion=base64_decode(@$_GET['ubicacion']);
                        
                        
                        
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
      
        <p> Imagen:</p>      
        <input name="archivo" type="file" class="casilla" id="archivo" style="color: #ffffff;" size="35" value="<?php echo $ubicacion ?>"/>
        
         <?php
      if($id_imagen_negocio>0 && $ubicacion!=""){
      ?>
        
         <p>  Mantener Imagen:</p>
        <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" /> <p><?php echo $ubicacion ?></p> <img src="../../img/Imagen_Negocio/<?php echo $ubicacion ?>"/> 
        
        
         <?php
      }
      ?>
        
      
       <br><br>
      <?php
    if($id_imagen_negocio>0 && $ubicacion!=""){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Imagen Negocio" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    <input name="action" type="hidden" value="upload" />    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Imagen_Negocio.php';</script>";
 }
require('../../Negocio/Negocio_Imagen_Negocio.php');
$objN_imagen_Negocio=new Negocio_Imagen_Negocio();
   if($id_negocio>0 && $ubicacion=="" && $id_imagen_negocio>0){
    
     $objN_imagen_Negocio->Eliminar_Imagen_Negocio($id_imagen_negocio);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
     if((isset($_POST["Mantener_Imagen"]))) 
 { 
         
   $objN_imagen_Negocio->Modificar_Sin_Imagen_Negocio($id_imagen_negocio,$_POST["Negocio"]);     
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
                                    $destino =  "../../img/Imagen_Negocio/".$prefijo."_".$archivo;
                                    $direccion_img="".$prefijo."_".$archivo;
                                    if (copy($_FILES['archivo']['tmp_name'],$destino)) {
                                    $status = "Archivo subido: <b>".$archivo."</b>";
                                    } else {
                                    $status = "Error al subir el archivo";
                                    }
                                    } else {
                                    $status = "Error al subir archivo";
                                    }

 
 $objN_imagen_Negocio->Modificar_Imagen_Negocio($id_imagen_negocio,$_POST["Negocio"],$direccion_img);
         
    }   
 }
if (@$_REQUEST['enviar'] == "Subir Imagen Negocio"){
      
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
    $destino =  "../../img/Imagen_Negocio/".$prefijo."_".$archivo;
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
 
 $objN_imagen_Negocio->Insertar_Imagen_Negocio($_POST["Negocio"],$direccion_img);
}
?>
</br></br>

<?php
$objN_imagen_Negocio->Tabla_Imagen_Negocio();
?>


    

            
      </div>
      
         

      

            
<?php
include_once('Footer.php');
?>
    </div><!-- /container -->
  
  </body>
</html>
