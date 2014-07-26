<?php
class Negocio_Gestionar_Publicidad{
var $objD_Gestionar_Publicidad;

	
        function Negocio_Gestionar_Publicidad(){
       
		require('../../Datos/D_Gestionar_Publicidad.php');              
		$this->objD_Gestionar_Publicidad=new Datos_Gestionar_Publicidad();
	}

 
  
   function get_Publicidad(){
     
   $consulta=$this->objD_Gestionar_Publicidad->Mostrar_Tabla_Publicidad();
  
     if($consulta) {
        
  while( $Publicidad = mysql_fetch_array($consulta) ){
      
       
                echo "  <img src=\"../../img/Imagen_Publicidad/".$Publicidad['imagen']."\">"; 
        
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

}
?>

