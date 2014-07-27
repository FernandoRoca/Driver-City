
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
                           
                                
           <h1>Gestionar Contacto Evento</h1>
                                     <?php
      
      
                          
                        $id_contacto_evento=  base64_decode(@$_GET['id_contacto_evento']);
                        $id_evento=  base64_decode(@$_GET['id_evento']);
                        $nombre=  base64_decode(@$_GET['nombre']);
                        $telefono=base64_decode(@$_GET['telefono']);
                        $celular=base64_decode(@$_GET['celular']);
                        
                        
                        ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         <p> Evento:</p>
        <select id="Evento" name="Evento">
           <?php
           require('../../Negocio/Negocio_Evento.php');
            $objN_Evento=new Negocio_Evento();
             $objN_Evento->Combo_Evento_Contactos($id_evento);
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
    if($id_contacto_evento>0 && $id_evento>0 && $nombre!=""){
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
 echo "<script> location.href='Contacto_Evento.php';</script>";
 }
require('../../Negocio/Negocio_Contacto_Evento.php');
$objN_Contacto_Evento=new Negocio_Contacto_Evento();
   if($id_contacto_evento>0 && $id_evento==0 && $nombre==""){
    
     $objN_Contacto_Evento->Eliminar_Contacto_Evento($id_contacto_evento);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
   
 
 $objN_Contacto_Evento->Modificar_Contacto_Evento($id_contacto_evento,$_POST["Evento"],$_POST["NombreContacto"],$_POST["TelefonoContacto"],$_POST["CelularContacto"]);
         
   
 }
if (@$_REQUEST['enviar'] == "Subir Contacto"){
      
      
 $objN_Contacto_Evento->Insertar_Contacto_Evento($_POST["Evento"],$_POST["NombreContacto"],$_POST["TelefonoContacto"],$_POST["CelularContacto"]);
}
?>
</br></br>

<?php
$objN_Contacto_Evento->Tabla_Contacto_Evento();
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
