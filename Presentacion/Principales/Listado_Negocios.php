
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

  <!--<img width=1200 px src="../../img/Imagen_Negocio/d3ed44_1BIGdegradados.png"/>-->
       <?php
                $id_Central= base64_decode(@$_GET['id_central']);
                $id_principal=base64_decode(@$_GET['id_principal']);
                $tipo=base64_decode(@$_GET['tipo']);
              require('../../Negocio/Negocio_Publicidad.php');
              $objN_Imagen_Publicidad=new Negocio_Publicidad();
              $objN_Imagen_Publicidad->Insertar_Slider();
              ?>
  
     

  <hr>
       <form  method="post" enctype="multipart/form-data" style="text-align: center">
       <input name="Promocion" type="submit" class="boton pull-right" id="Modificar" value="Promocion del Dia" /> 
       </form>
       <?php
if (@$_REQUEST['Promocion'] == "Promocion del Dia"){
 echo "<script> location.href='Promocion_Dia.php?id_principal=".base64_encode($id_principal)."';</script>";
 }
 ?>
 <br/><br/><br/>
 
      <div class="content_adm" align="center" >
                                  
    
       
        <?php
         
          echo "<h3>".$tipo."</h3><br/>";
        require('../../Negocio/Negocio_Negocio.php');
         $objN_Principal=new Negocio_Negocio();
         if($id_Central==0)
          $objN_Principal->Tabla_Negocio_Principal($id_principal);
         else
          $objN_Principal->Tabla_Negocio_Principal_Sucursales($id_principal,$id_Central);
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
