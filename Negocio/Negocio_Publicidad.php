<?php
class Negocio_Publicidad{
var $objD_Gestionar_Publicidad;

	
        function Negocio_Publicidad(){
       
		require('../../Datos/D_Gestionar_Publicidad.php');              
		$this->objD_Gestionar_Publicidad=new Datos_Gestionar_Publicidad();
	}

 
  
   function get_Publicidad(){
     
   $consulta=$this->objD_Gestionar_Publicidad->Mostrar_Tabla_Publicidad();
  
     if($consulta) {
      $cont=1;  
  while( $Publicidad = mysql_fetch_array($consulta) ){
      if($cont==1){
        echo"<div class=\"item active\">";
      }
      else{
         echo"<div class=\"item \">"; 
      }
                echo "  <img src=\"../../img/Imagen_Publicidad/".$Publicidad['imagen']."\">"; 
              echo"</div>";  
        
        }
        }
  }  
  
   function get_tiempo(){
  
   $consulta=$this->objD_Gestionar_Publicidad->Mostrar_Tabla_Publicidad();
 $tiempo=0;
     if($consulta) {
        
  while( $Publicidad = mysql_fetch_array($consulta) ){
      
       
              $tiempo= $Publicidad['tiempo'];
              
              
        }
        }
        return $tiempo;
  }  
  
  function Insertar_Slider(){
      $consulta=$this->objD_Gestionar_Publicidad->Mostrar_Tabla_Publicidad();
      if($consulta) {
          $cont=1;
            echo "  <div id=\"myCarousel\" class=\"carousel slide\">
                                <div class=\"carousel-inner\">";
        while( $imagen_Publicidad = mysql_fetch_array($consulta) ){
                    if($imagen_Publicidad['imagen']!=""){
                      
                        if($cont==1)
                         echo"<div class=\"item active\">" ; 
                        else
                         echo"<div class=\"item \">" ;    
                         echo "<img width=1200 px;  src=\"../../img/Imagen_Publicidad/".$imagen_Publicidad['imagen']."\">";                      
                         echo"</div>";
                      
                       $cont++;
                       
                    }
               }
                echo "</div>
                            <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\"><img src=\"../../img/arrow.png\" alt=\"Arrow\"></a>
                            <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\"><img src=\"../../img/arrow2.png\" alt=\"Arrow\"></a>
                            </div>
                            ";
              }
  }

}
?>

