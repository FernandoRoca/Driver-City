<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Negocio{
 //constructor
 	var $con;
 	function Datos_Gestionar_Negocio(){
 		$this->con=new DBManager;
 	}

	function Insertar_Negocio($id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$logo="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_fin=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into negocio values(0,".$id_principal.",'".$nombre."','".$direccion."','".$descripcion."','".$web."','".$logo."',".$x.",".$y.",'".$fecha_inicio."','".$fecha_fin."','Habilitado');");
		}
	}
	function Mostrar_Tabla_Negocio(){
		if($this->con->conectar()==true){
			return mysql_query("select negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_fin from negocio,principal where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.observacion='Habilitado';");
		}
	}
        function Obtener_Logo_Negocio($id_negocio=0){
		if($this->con->conectar()==true){
			return mysql_query("select logo from negocio where id_negocio = ".$id_negocio);
		}
	}

	function Eliminar_Logo_Negocio($id_negocio=0){
		if($this->con->conectar()==true){
			return mysql_query("update negocio set observacion= 'DesHabilitado' where id_negocio = ".$id_negocio);
		}
	}


        function Modificar_Logo_Negocio($id_negocio=0,$id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$logo="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update negocio id_principal=".$id_principal.",nombre='".$nombre."',direccion='".$direccion."',descripcion='".$descripcion."',web='".$web."',logo='".$logo."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_fin='".$fecha_fin."' where id_negocio = ".$id_negocio);
		}
	}

        function Modificar_sin_Logo_Negocio($id_negocio=0,$id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update negocio set id_principal=".$id_principal.",nombre='".$nombre."',direccion='".$direccion."',descripcion='".$descripcion."',web='".$web."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_fin='".$fecha_fin."' where id_negocio = ".$id_negocio);
		}
	}


}
?>
