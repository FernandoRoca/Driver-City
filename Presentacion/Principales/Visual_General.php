
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script> 
<?php
include_once('Helper.php');
?>
   <link rel="stylesheet" href="../../css/jquery.mobile-1.2.0.css" />
 
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
    

    
    
</form>
        </div>


    

            
      </div>
       <div data-role="footer" data-position="fixed">
    <div data-role="navbar">
      <ul>
        <li><a href="#">Como Llegar</a></li>
        <li><a href="Relacionadores.php?id_negocio=<?php echo base64_encode($id_Negocio);?>" data-icon="refresh">Relacionadores</a></li>
       
      </ul>
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
