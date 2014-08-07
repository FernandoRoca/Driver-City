<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Imagen_Negocio{
 //constructor
 	var $con;
 	function Datos_Gestionar_Imagen_Negocio(){
 		$this->con=new DBManager;
 	}

	function Insertar_Imagen_Negocio($id_negocio=0,$Ubicacion=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into imagen_negocio values(0,".$id_negocio.",'".$Ubicacion."','Habilitado')");
		}
	}
	function Mostrar_Tabla_Imagen_Negocio(){
		if($this->con->conectar()==true){
			return mysql_query("select imagen_negocio.id_imagen_negocio,imagen_negocio.id_negocio,negocio.nombre as nombre,imagen_negocio.ubicacion from imagen_negocio,negocio where imagen_negocio.observacion='Habilitado' and negocio.id_negocio=imagen_negocio.id_negocio and negocio.observacion='Habilitado';");
		}
	}
        function Obtener_Imagen_Negocio($id_imagen_negocio=0){
		if($this->con->conectar()==true){
			return mysql_query("select ubicacion from imagen_negocio where id_imagen_negocio = ".$id_imagen_negocio);
		}
	}
        function Obtener_Imagen_del_Negocio($id_negocio=0){
		if($this->con->conectar()==true){
			return mysql_query("select ubicacion from imagen_negocio where id_negocio = ".$id_negocio);
		}
	}

	function Eliminar_Imagen_Negocio($id_imagen_negocio=0){
		if($this->con->conectar()==true){
			return mysql_query("update imagen_negocio set observacion= 'DesHabilitado' where id_imagen_negocio = ".$id_imagen_negocio);
		}
	}


        function Modificar_Imagen_Negocio($id_imagen_negocio=0,$id_negocio=0,$Ubicacion=""){
		if($this->con->conectar()==true){

			return mysql_query("update imagen_negocio set id_negocio=".$id_negocio.",ubicacion='".$Ubicacion."' where id_imagen_negocio = ".$id_imagen_negocio);
		}
	}

        function Modificar_sin_Imagen_Negocio($id_imagen_negocio=0,$id_negocio=0){
		if($this->con->conectar()==true){

			return mysql_query("update imagen_negocio set id_negocio=".$id_negocio." where id_imagen_negocio = ".$id_imagen_negocio);
		}
	}


}
?>
