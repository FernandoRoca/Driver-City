
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include_once('Helper.php');
?>
   
  </head>

    <body >
  
  
  <div class="container">

  <img src="../../img/Principales/Logo.png"/>
       <?php
           $latitud=(@$_GET['latitud']);
           $longitud=(@$_GET['longitud']);
       ?>

      <div class="content_adm" align="center" >
                                  
      

       
        <?php

        require('../../Negocio/Negocio_Principal.php');
         $objN_Principal=new Negocio_Principal();
          $objN_Principal->Mostrar_Imagenes_Principal($latitud,$longitud);
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
