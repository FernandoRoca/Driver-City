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
        
        function Insertar_Negocio($id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$logo="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into negocio values(0,".$id_principal.",'".$nombre."','".$direccion."','".$descripcion."','".$web."','".$logo."',".$x.",".$y.",'".$fecha_inicio."','".$fecha_final."','Habilitado');");
		}
	}
	function Mostrar_Tabla_Negocio(){
		if($this->con->conectar()==true){
			return mysql_query("select negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_final from negocio,principal where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.observacion='Habilitado';");
		}
	}
        function Mostrar_Tabla_Negocio_Principal($id_principal=0){
	 date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");
            $Hora= date("H:i");
            $Dia=date("N");
            if($this->con->conectar()==true){
			return mysql_query("select (select count(*) from horario where horario.id_negocio=negocio.id_negocio and id_dia=".$Dia." and '".$Hora."' between hora_inicio and hora_fin and observacion='Habilitado') as abierto,(select count(*) from estado_negocio where estado_negocio.id_negocio_enlace=negocio.id_negocio and estado_negocio.observacion='Habilitado' and estado_negocio.estado_negocio='Sucursal')as sucursal,negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_final from negocio,principal,estado_negocio where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.id_principal=".$id_principal." and principal.observacion='Habilitado' and '".$Fecha."' between negocio.fecha_inicio and negocio.fecha_final and estado_negocio.id_negocio=negocio.id_negocio and estado_negocio.estado_negocio='Central' and estado_negocio.observacion='Habilitado';");
		}
	}
        function Mostrar_Tabla_Negocio_Central($id_principal=0,$id_negocio=0){
            
	 date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");
            $Hora= date("H:i");
            $Dia=date("N");
            if($this->con->conectar()==true){
			return mysql_query("select (select count(*) from horario where horario.id_negocio=negocio.id_negocio and id_dia=".$Dia." and '".$Hora."' between hora_inicio and hora_fin and observacion='Habilitado') as abierto,(select count(*) from estado_negocio where estado_negocio.id_negocio_enlace=negocio.id_negocio and estado_negocio.observacion='Habilitado' and estado_negocio.estado_negocio='Sucursal')as sucursal,negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_final from negocio,principal,estado_negocio where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.id_principal=".$id_principal." and principal.observacion='Habilitado' and '".$Fecha."' between negocio.fecha_inicio and negocio.fecha_final and estado_negocio.id_negocio=negocio.id_negocio and estado_negocio.estado_negocio='Central' and estado_negocio.observacion='Habilitado' and negocio.id_negocio=".$id_negocio.";");
		}
	}
        function Mostrar_Tabla_Negocio_Sucursales_Principal($id_principal=0,$Central=0){
            
	 date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");
            $Hora= date("H:i");
            $Dia=date("N");
            if($this->con->conectar()==true){
			return mysql_query("select (select count(*) from horario where horario.id_negocio=negocio.id_negocio and id_dia=".$Dia." and '".$Hora."' between hora_inicio and hora_fin and observacion='Habilitado') as abierto,negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_final from negocio,principal,estado_negocio where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.id_principal=".$id_principal." and principal.observacion='Habilitado' and '".$Fecha."' between negocio.fecha_inicio and negocio.fecha_final and estado_negocio.id_negocio=negocio.id_negocio and estado_negocio.estado_negocio='Sucursal' and estado_negocio.observacion='Habilitado' and estado_negocio.id_negocio_enlace=".$Central.";");
		}
	}
        function Mostrar_Datos_Negocio($id_negocio=0){
              date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");
		if($this->con->conectar()==true){
			return mysql_query("select negocio.id_negocio,negocio.id_principal,principal.nombre as principal,negocio.nombre,negocio.direccion,negocio.descripcion,negocio.web,negocio.logo,negocio.posicion_x,negocio.posicion_y,negocio.fecha_inicio,negocio.fecha_final from negocio,principal where negocio.observacion='Habilitado' and principal.id_principal=negocio.id_principal and principal.observacion='Habilitado' and id_negocio = ".$id_negocio." and '".$Fecha."' between fecha_inicio and fecha_final;");
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

			return mysql_query("update negocio set id_principal=".$id_principal.",nombre='".$nombre."',direccion='".$direccion."',descripcion='".$descripcion."',web='".$web."',logo='".$logo."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_final='".$fecha_final."' where id_negocio = ".$id_negocio);
		}
	}

        function Modificar_sin_Logo_Negocio($id_negocio=0,$id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update negocio set id_principal=".$id_principal.",nombre='".$nombre."',direccion='".$direccion."',descripcion='".$descripcion."',web='".$web."',posicion_x=".$x.",posicion_y=".$y.",fecha_inicio='".$fecha_inicio."',fecha_final='".$fecha_final."' where id_negocio = ".$id_negocio);
		}
	}


}
?>
