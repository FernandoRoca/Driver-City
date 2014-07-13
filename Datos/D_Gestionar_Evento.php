<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Evento{
 //constructor
 	var $con;
 	function Datos_Gestionar_Evento(){
 		$this->con=new DBManager;
 	}

	function Insertar_Evento($id_principal=0,$nombre="",$lugar="",$hora="",$logo="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into evento values(0,".$id_principal.",'".$nombre."','".$lugar."','".$hora."','".$logo."','".$descripcion."',".$x.",".$y.",'".$fecha_inicio."','".$fecha_final."','Habilitado');");
		}
	}
	function Mostrar_Tabla_Evento(){
		if($this->con->conectar()==true){
			return mysql_query("select evento.id_evento,evento.id_principal,principal.nombre as principal,evento.nombre,evento.lugar,evento.hora,evento.imagen,evento.descripcion,evento.posicion_x,evento.posicion_y,evento.fecha_inicio,evento.fecha_final from evento,principal where evento.observacion='Habilitado' and principal.id_principal=evento.id_principal and principal.observacion='Habilitado';");
		}
	}
        function Obtener_Logo_Evento($id_evento=0){
		if($this->con->conectar()==true){
			return mysql_query("select imagen from evento where id_evento = ".$id_evento);
		}
	}

	function Eliminar_Logo_Evento($id_evento=0){
		if($this->con->conectar()==true){
			return mysql_query("update evento set observacion= 'DesHabilitado' where id_evento = ".$id_evento);
		}
	}


        function Modificar_Logo_Evento($id_evento=0,$id_principal=0,$nombre="",$lugar="",$hora="",$logo="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update evento set id_principal=".$id_principal.",nombre='".$nombre."',lugar='".$lugar."',hora='".$hora."',imagen='".$logo."',descripcion='".$descripcion."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_final='".$fecha_final."' where id_evento = ".$id_evento);
		}
	}

        function Modificar_sin_Logo_Evento($id_evento=0,$id_principal=0,$nombre="",$lugar="",$hora="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update evento id_principal=".$id_principal.",nombre='".$nombre."',lugar='".$lugar."',hora='".$hora."',descripcion='".$descripcion."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_final='".$fecha_final."' where id_evento = ".$id_evento);
		}
	}


}
?>
