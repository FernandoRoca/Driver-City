<?php
class Negocio_Principal{
var $objD_Gestionar_Principal;


        function Negocio_Principal(){

		require('../../Datos/D_Gestionar_Principal.php');
		$this->objD_Gestionar_Principal=new Datos_Gestionar_Principal();
	}



   function Combo_Principal($id_principal=0){

   $consulta=$this->objD_Gestionar_Principal->Mostrar_Tabla_Principal();
  echo "<option value=\"0\">Seleccione Opcion</option>\n";
     if($consulta) {

  while( $Combo_Principal = mysql_fetch_array($consulta) ){

          if($id_principal==$Combo_Principal['id_principal']){
                echo "<option selected value=\"".$Combo_Principal['id_principal']."\">".$Combo_Principal['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"".$Combo_Principal['id_principal']."\">".$Combo_Principal['nombre']."</option>\n";
          }
        }
        }
  }






}
?>