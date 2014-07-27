<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Punto_Venta{
 //constructor
 	var $con;
 	function Datos_Gestionar_Punto_Venta(){
 		$this->con=new DBManager;
 	}

	function Insertar_Punto_Venta($nombre="",$direccion=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into punto_venta values(0,'".$nombre."','".$direccion."','Habilitado');");
		}
	}
	function Mostrar_Tabla_Punto_Venta(){
		if($this->con->conectar()==true){
			return mysql_query("select punto_venta.direccion,punto_venta.id_punto_venta,punto_venta.nombre from punto_venta where punto_venta.observacion='Habilitado';");
		}
	}
        
        function Mostrar_Tabla_Punto_Venta_Habilitados($id_evento=0){
		if($this->con->conectar()==true){
			return mysql_query("select punto_venta.direccion,punto_venta.id_punto_venta,punto_venta.nombre from punto_venta where punto_venta.observacion='Habilitado' and punto_venta.id_punto_venta not in (select id_punto_venta from punto_venta_evento where punto_venta_evento.id_evento=".$id_evento." and punto_venta_evento.observacion='Habilitado');");
		}
	}
	function Eliminar_Punto_Venta($id_punto_venta=0){
		if($this->con->conectar()==true){
			return mysql_query("update punto_venta set observacion= 'DesHabilitado' where id_punto_venta = ".$id_punto_venta);
		}
	}


        function Modificar_Punto_Venta($id_punto_venta=0,$nombre="",$direccion=""){
		if($this->con->conectar()==true){

			return mysql_query("update punto_venta  set nombre='".$nombre."',direccion='".$direccion."' where id_punto_venta = ".$id_punto_venta);
		}
	}

        


}
?>
