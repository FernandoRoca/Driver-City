<?php
class Negocio_Dia{
var $objD_Gestionar_Dia;

	
        function Negocio_Dia(){
              
		require('../../Datos/D_Gestionar_Dia.php');              
		$this->objD_Gestionar_Dia=new Datos_Gestionar_Dia();
	}

 
  
   function Combo_Dia($id_dia=0){
  
   $consulta=$this->objD_Gestionar_Dia->Mostrar_Tabla_Dia();
  echo "<option value=\"0\">Seleccione Dia</option>\n"; 
     if($consulta) {
        
  while( $Combo_Dia = mysql_fetch_array($consulta) ){
      
          if($id_dia==$Combo_Dia['id_dia']){
                echo "<option selected value=\"".$Combo_Dia['id_dia']."\">".$Combo_Dia['nombre']."</option>\n"; 
          }
          else{
             echo "<option  value=\"".$Combo_Dia['id_dia']."\">".$Combo_Dia['nombre']."</option>\n"; 
          }
        }
        }
  }  
  
   function Combo_Modificacion_Dia($id_dia=0){
  
   $consulta=$this->objD_Gestionar_Dia->Mostrar_Tabla_Dia();
  echo "<option value=\"0\">Seleccione Dia</option>\n"; 
     if($consulta) {
        
  while( $Combo_Dia = mysql_fetch_array($consulta) ){
      if($Combo_Dia['id_dia']<8){
          if($id_dia==$Combo_Dia['id_dia']){
                echo "<option selected value=\"".$Combo_Dia['id_dia']."\">".$Combo_Dia['nombre']."</option>\n"; 
          }
          else{
             echo "<option  value=\"".$Combo_Dia['id_dia']."\">".$Combo_Dia['nombre']."</option>\n"; 
          }
        }
  }
        }
  }  

 

}
?>

