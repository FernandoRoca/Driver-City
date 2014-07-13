<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Principal{
 //constructor
 	var $con;
 	function Datos_Gestionar_Principal(){
 		$this->con=new DBManager;
 	}


	function Mostrar_Tabla_Principal(){
		if($this->con->conectar()==true){
			return mysql_query("select id_principal,nombre,imagen from principal where observacion='Habilitado';");
		}
	}





}
?>
