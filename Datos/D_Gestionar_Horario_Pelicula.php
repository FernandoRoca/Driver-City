<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Horario_Pelicula{
	
 //constructor
 	var $con;
 	function Datos_Gestionar_Horario_Pelicula(){
 		$this->con=new DBManager;
 	}


	function Listar_Peliculas(){
		if($this->con->conectar() == true){
			return mysql_query("call proc_listar_peliculas();");
		}
	}


//--------------------------INSERT--------------------------------//
	
	
	function Insertar_Horario_Pelicula($id_pelicula=0,$id_negocio=0,$horario="",$fecha_inicio="",$fecha_fin=""){
		if($this->con->conectar() == true){
			return mysql_query("call proc_insertar_negocio_pelicula(".$id_pelicula.",".$id_negocio.",'".$horario."','".$fecha_inicio."','".$fecha_fin."');");
		}
	}


//-------------------------UPDATE-------------------------------//
	

//----------------------DROP(logic)----------------------------//


}
?>
