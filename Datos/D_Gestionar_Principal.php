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
        function Mostrar_Imagen_Principal($id_principal=0){
		if($this->con->conectar()==true){
			return mysql_query("select id_principal,nombre,imagen from principal where observacion='Habilitado' and id_principal=".$id_principal.";");
		}
	}





}
?>
