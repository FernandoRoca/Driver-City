
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
      <img src="../../img/Principales/Logo.png"/>
  <?php
            /*  require('../../Negocio/Negocio_Publicidad.php');
              $objN_Imagen_Publicidad=new Negocio_Publicidad();
              $objN_Imagen_Publicidad->Insertar_Slider();*/
              ?>
      <hr>
   <?php         
             $id_Negocio=base64_decode(@$_GET['id_negocio']);
        require('../../Negocio/Negocio_Negocio.php');
         $objN_Negocio=new Negocio_Negocio();
          $objN_Negocio->Obtener_Logo($id_Negocio);
        ?>
  
     

  <hr>
    
       <div class="content_adm" align="center" >
             

              
              <?php
              require('../../Negocio/Negocio_Contacto_Negocio.php');
              $objN_Contacto_Negocio=new Negocio_Contacto_Negocio();
              $objN_Contacto_Negocio->Mostrar_Contacto_Negocio($id_Negocio);
              ?>
           
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
