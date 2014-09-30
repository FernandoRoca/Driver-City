<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Dia{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Dia(){
 		$this->con=new DBManager;
 	}

	
	function Mostrar_Tabla_Dia(){ 
		if($this->con->conectar()==true){
			return mysql_query("select id_dia,nombre from dia;");
		}
	}
        
        
        
	
        
       	
	
}
?>
