
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
        require('../../Negocio/Negocio_Negocio.php');
         $objN_Negocio=new Negocio_Negocio();
          $objN_Negocio->Obtener_Logo(2);
        ?>
  
     

  <hr>
    
     
             

              
              <?php
              require('../../Negocio/Negocio_Imagen_Negocio.php');
              $objN_Imagen_Negocio=new Negocio_Imagen_Negocio();
              $objN_Imagen_Negocio->Insertar_Slider(2);
              ?>
             
              
            
    


      <div class="content_adm" align="center" >
                                  
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
        <h1><?php echo $tipo;?></h1> </br>
        <?php 
     
        $objN_Negocio->Obtener_Datos_Negocio(2);
       ?>
     
   
      <input name="enviar" type="submit" class="boton" id="enviar" value="Como Llegar" />
    
    
    
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
