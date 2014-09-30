
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once('Helper.php');

?>

    
   
     <script type="text/javascript" language="javascript" src="../../js/TablaOrden.js"></script>
     
         <script type="text/javascript">
  
function calculateDistance(latitudA, longitudA,latitudb, longitudb){
		try{  
			var glatlng1 = new GLatLng(latitudA, longitudA);
			var glatlng2 = new GLatLng(latitudb, longitudb);
                         
                         
			var miledistance = glatlng1.distanceFrom(glatlng2, 3959).toFixed(1);
			var kmdistance = (miledistance * 1.609344).toFixed(1);
                        //var result='results'+contador;
                    
                      return kmdistance;
                        //document.getElementById(result).innerHTML =kmdistance;  
		} catch (error) {
			alert(error);
		}
	}
        
  
  

    </script>
     

  </head>

  <body>

     

  
  <div class="container">

 
       <?php
               // $id_Central= base64_decode(@$_GET['id_central']);
                $id_principal=(@$_GET['id_principal']);
                $latitud=(@$_GET['latitud']);
                $longitud=(@$_GET['longitud']);
                
               // $tipo=base64_decode(@$_GET['tipo']);
             /* require('../../Negocio/Negocio_Publicidad.php');
              $objN_Imagen_Publicidad=new Negocio_Publicidad();
              $objN_Imagen_Publicidad->Insertar_Slider();*/
              ?>
  
      <table border="0" cellspacing="0" cellpadding="0" >
     
      <tbody>
          <tr  width="1000 px" >
              <td colspan="2"><img  src="../../img/Principales/diver_city_gastronomia.gif"/></td>
          </tr>
          <tr  width="1000 px">
             
              <td><a href="Promocion_Dia.php?id_principal=<?php echo base64_encode($id_principal);?>&latitud=<?php echo ($latitud);?>&longitud=<?php echo ($longitud);?> " rel="external"> <img src="../../img/Principales/Gastronomia.gif"/></a> </td>
          </tr>
      </tbody>
  </table>

 </br></br>
    <div  align="center" >

    </br>
        <?php
         
       
        require('../../Negocio/Negocio_Negocio.php');
         $objN_Principal=new Negocio_Negocio();
          $objN_Principal->Tabla_Negocio_Principal($id_principal,$latitud,$longitud);
        /* else
          $objN_Principal->Tabla_Negocio_Principal_Sucursales($id_principal,$id_Central);*/
        ?>

     </div>
       

    

            
      </div>
      
  

 
<?php
include_once('Footer.php');
?>
      

   
   
 
  </body>
</html>
