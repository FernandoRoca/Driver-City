
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
                           
                                
           <h1>Gestionar Punto de Venta</h1>
                                     <?php
      
      
                          
                        $id_punto_venta=  base64_decode(@$_GET['id_punto_venta']);
                        $nombre=  base64_decode(@$_GET['nombre']);
                        $direccion=  base64_decode(@$_GET['direccion']);
                       
                        ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         
      
        <p>Nombre:</p>      
        
        <input type="text" value="<?php echo $nombre ?>" name="Nombre"/>
         <p>Direccion:</p>      
        
        <input type="text" value="<?php echo $direccion ?>" name="Direccion"/>
               
       <br><br>
      <?php
    if($id_punto_venta>0 && $nombre!=""){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Punto de Venta" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Punto_Venta.php';</script>";
 }
require('../../Negocio/Negocio_Punto_Venta.php');
$objN_Punto_Venta=new Negocio_Punto_Venta();
   if($id_punto_venta>0 && $nombre==""){
    
     $objN_Punto_Venta->Eliminar_Punto_Venta($id_punto_venta);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
   
 
 $objN_Punto_Venta->Modificar_Punto_Venta($id_punto_venta,$_POST["Nombre"],$_POST["Direccion"]);
         
   
 }
if (@$_REQUEST['enviar'] == "Subir Punto de Venta"){
      
      
 $objN_Punto_Venta->Insertar_Punto_Venta($_POST["Nombre"],$_POST["Direccion"]);
}
?>
</br></br>

<?php
$objN_Punto_Venta->Tabla_Punto_Venta();
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
