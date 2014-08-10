
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

   <style>
#contenedorr3 { 
border-radius:8px; 
-moz-border-radius:8px; /* Firefox */ 
-webkit-border-radius:8px; /* Safari y Chrome */ 

/* Otros estilos */ 
border:1px solid #333;
background:#d82727;

padding:15px;
}
</style>
<?php
include_once('Helper.php');
?>
  </head>

  <body>
  
  
  <div class="container">

  <img src="../../img/Principales/Logo.png"/>
       <?php
                $id_Central= base64_decode(@$_GET['id_central']);
                $id_principal=base64_decode(@$_GET['id_principal']);
                $tipo=base64_decode(@$_GET['tipo']);
             /* require('../../Negocio/Negocio_Publicidad.php');
              $objN_Imagen_Publicidad=new Negocio_Publicidad();
              $objN_Imagen_Publicidad->Insertar_Slider();*/
              ?>
  
  <table border="0">
     
      <tbody>
          <tr  width="1000 px">
              <td><img src="../../img/Principales/Gastronomia.jpg"/>  </td>
              <td><a href="Promocion_Dia.php?id_principal=<?php echo base64_encode($id_principal);?>"> <img  src="../../img/Principales/Promo.jpg"/></a> </td>
          </tr>
      </tbody>
  </table>





   
     
 <br/><br/><br/>
 
    
 <div id="contenedorr3" class="pull-left" style="text-align: center; color: fffefd;">
              <img src="../../img/Imagen_Clasificacion/Mariscos.jpg"/> 
<h3>Pescados y Mariscos</h3>
</div>                
         
          <div id="contenedorr3" class="pull-right" style="text-align: center; color: fffefd;">
                <img src="../../img/Imagen_Clasificacion/Parrillada.jpg"/> 
<h3>Parrilada y Churrasco</h3>
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
