
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
 <script src="../../js/maps" type="text/javascript"></script>
    <script src="../../js/{main,adsense,geometry,zombie}.js" type="text/javascript"></script>
         <script type="text/javascript">
    
     var Principal;
   function obtener_localizacion(principal) {
      
      Principal=principal;
      
  if (navigator.geolocation) {
  		//navigator.geolocation.getCurrentPosition(coordenadas,gestiona_errores);
                window.navigator.geolocation.watchPosition( 
        
        function ( position ) {

            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            accuracy = position.coords.accuracy;
           
            window.location = 'Listado_Negocios.php?id_principal='+Principal+'&latitud='+latitude+'&longitud='+longitude;
            /*document.getElementById( 'result' ).innerHTML += 
                  'lat: ' + latitude + ', '
                + 'lng: ' + longitude + ', '
                + 'accuracy: ' + accuracy + '<br />';*/

        },
        function () { /*error*/ },
        {
            
            maximumAge: 250, 
            enableHighAccuracy: true
        
        } 
                                                                  
    );

                
                
  }else{
	alert('Tu navegador no soporta la API de geolocalizacion');  
  }
   
   
 
}

function coordenadas(position) {
  latitudA = position.coords.latitude;
  longitudA = position.coords.longitude;
 window.location = 'Listado_Negocios.php?id_principal='+Principal+'&latitud='+latitudA+'&longitud='+longitudA;

 
 	
 /*origin1 = new google.maps.LatLng(latitudA, longitudA);    
 destinationA = new google.maps.LatLng(latitudB, longitudB); */
 
 //calculateDistance();
}

function gestiona_errores(err) {
  if (err.code == 0) {
    alert("error desconocido");
  }
  if (err.code == 1) {
    alert("El usuario no ha compartido su posicion");
  }
  if (err.code == 2) {
    alert("No es posible obtener la posicion actual");
  }
  if (err.code == 3) {
    alert("timeut recibiendo la posicion");
  }
}
  

  


    </script>
  </head>

  <body>
  
  
  <div class="container">

  <?php      
                $id_principal=base64_decode(@$_GET['id_principal']);
                $latitud=(@$_GET['latitud']);
                $longitud=(@$_GET['longitud']);
                

                  
   ?>
    
  
  <table border="0" cellspacing="0" cellpadding="0">
     
      <tbody>
          <tr  width="1000 px" >
              <td colspan="2"><img  src="../../img/Principales/diver_city_gastronomia.gif"/></td>
          </tr>
          <tr  width="1000 px">
             
              <td><a rel=\"external\" href="Promocion_Dia.php?id_principal=<?php echo base64_encode($id_principal);?>&latitud=<?php echo base64_encode($latitud);?>&longitud=<?php echo base64_encode($longitud);?>"> <img src="../../img/Principales/Gastronomia.gif"/></a> </td>
          </tr>
      </tbody>
  </table>
  



     
 <br/><br/><br/>

 
 <div  align="center" >
    <?php
          
               
              require('../../Negocio/Negocio_Clasificacion.php');
              $objN_Clasificacion=new Negocio_Clasificacion();
              $objN_Clasificacion->Menu_Clasificacion($id_principal,$latitud,$longitud);
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
