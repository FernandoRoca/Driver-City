
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
                           
                                
           <h1>Gestionar Contacto Negocio</h1>
			 <?php
            $id_contacto_negocio=  base64_decode(@$_GET['id_contacto_negocio']);
            $id_negocio=  base64_decode(@$_GET['id_negocio']);
            $nombre=  base64_decode(@$_GET['nombre']);
            $telefono=base64_decode(@$_GET['telefono']);
            $celular=base64_decode(@$_GET['celular']);
            
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
      
        <p> Nombre Contacto:</p>      
        
        <input type="text" value="<?php echo $nombre ?>" name="NombreContacto"/>
                <p> Telefono Contacto:</p>      
        
        <input type="text" value="<?php echo $telefono ?>" name="TelefonoContacto" onKeyPress="return validar_texto(event);"/>
        <p> Celular Contacto:</p>      
        
        <input type="text" value="<?php echo $celular ?>" name="CelularContacto" onKeyPress="return validar_texto(event);"/>
       
        
        
        
       <br><br>
      <?php
    if($id_contacto_negocio>0 && $id_negocio>0 && $nombre!=""){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Contacto" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Contacto_Negocio.php';</script>";
 }
require('../../Negocio/Negocio_Contacto_Negocio.php');
$objN_Contacto_Negocio=new Negocio_Contacto_Negocio();
   if($id_contacto_negocio>0 && $id_negocio==0 && $nombre==""){
    
     $objN_Contacto_Negocio->Eliminar_Contacto_Negocio($id_contacto_negocio);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
   
 
 $objN_Contacto_Negocio->Modificar_Contacto_Negocio($id_contacto_negocio,$_POST["Negocio"],$_POST["NombreContacto"],$_POST["TelefonoContacto"],$_POST["CelularContacto"]);
         
   
 }
if (@$_REQUEST['enviar'] == "Subir Contacto"){
      
      
 $objN_Contacto_Negocio->Insertar_Contacto_Negocio($_POST["Negocio"],$_POST["NombreContacto"],$_POST["TelefonoContacto"],$_POST["CelularContacto"]);
}
?>
</br></br>

<?php
$objN_Contacto_Negocio->Tabla_Contacto_Negocio();
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
