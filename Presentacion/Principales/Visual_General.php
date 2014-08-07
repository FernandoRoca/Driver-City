
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
  
  
  <div class="container">

   <?php
           $tipo="BAR";
             $id_Negocio=base64_decode(@$_GET['id_negocio']);
        require('../../Negocio/Negocio_Negocio.php');
         $objN_Negocio=new Negocio_Negocio();
          $objN_Negocio->Obtener_Logo($id_Negocio);
        ?>
  
     

  <hr>
    
     
             

              
              <?php
              require('../../Negocio/Negocio_Imagen_Negocio.php');
              $objN_Imagen_Negocio=new Negocio_Imagen_Negocio();
              $objN_Imagen_Negocio->Insertar_Slider($id_Negocio);
              ?>
             
              
            
    


      <div class="content_adm" align="center" >
                                  
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
      
        <?php 
     
        $objN_Negocio->Obtener_Datos_Negocio($id_Negocio);
       ?>
     
   <form  method="post" enctype="multipart/form-data" style="text-align: center">
      <input name="Llegar" type="submit" class="boton" id="enviar" value="Como Llegar" />
      <input name="Relacionadores" type="submit" class="boton" id="enviar" value="Relacionadores" />
      </form> 
    <?php
if (@$_REQUEST['Relacionadores'] == "Relacionadores"){
 echo "<script> location.href='Relacionadores.php?id_negocio=".base64_encode($id_Negocio)."';</script>";
 }
 ?>
    
    
</form>
        </div>


    

            
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
