
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
                           
                                
           <h1>Gestionar Punto de Venta del Evento</h1>
                                     <?php                          
                        $id_punto_venta_evento=  base64_decode(@$_GET['id_punto_venta_evento']);
                        $id_evento=  base64_decode(@$_GET['id_evento']);
                         ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         
       <p> Evento:</p>
        <select id="Evento" name="Evento"  onchange="location.href = this.value">
           <?php
           require('../../Negocio/Negocio_Evento.php');
            $objN_Negocio_Evento=new Negocio_Evento();
            
             $objN_Negocio_Evento->Combo_Evento_Punto_de_Venta($id_evento);
           ?>
        </select>
        <p> Punto de Venta:</p>
        <select id="Punto_Venta" name="Punto_Venta" >
           <?php
           require('../../Negocio/Negocio_Punto_Venta.php');
            $objN_Negocio_Punto_Venta=new Negocio_Punto_Venta();
            
             $objN_Negocio_Punto_Venta->Combo_Punto_Venta_Evento($id_evento);
           ?>
        </select>
        
               
       <br><br>
   
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Punto de Venta del Evento" />
    
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Punto_Venta_Evento.php';</script>";
 }
require('../../Negocio/Negocio_Punto_Venta_Evento.php');
$objN_Punto_Venta_Evento=new Negocio_Punto_Venta_Evento();
   if($id_punto_venta_evento>0){
    
     $objN_Punto_Venta_Evento->Eliminar_Punto_Venta_Evento($id_punto_venta_evento);
 }
 
if (@$_REQUEST['enviar'] == "Subir Punto de Venta del Evento"){
      
      
 $objN_Punto_Venta_Evento->Insertar_Punto_Venta_Evento($id_evento,$_POST["Punto_Venta"]);
}
?>
</br></br>

<?php
$objN_Punto_Venta_Evento->Mostrar_Tabla_Punto_Venta_Evento();
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
