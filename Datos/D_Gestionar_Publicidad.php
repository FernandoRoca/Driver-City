<?php

include_once("Conexion.php");

class Datos_Gestionar_Publicidad{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Publicidad(){
 		$this->con=new DBManager;
 	}

	
	function Mostrar_Tabla_Publicidad(){ 
            date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");
           
		if($this->con->conectar()==true){
			return mysql_query("select id_publicidad,imagen,tiempo from publicidad where '".$Fecha."' between fecha_inicio and fecha_fin and observacion='Habilitado';");
		}
	}
        
	
        
       	
	
}
?>
