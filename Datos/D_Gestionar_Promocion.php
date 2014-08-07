<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Promocion{
 //constructor
 	var $con;
 	function Datos_Gestionar_Promocion(){
 		$this->con=new DBManager;
 	}

	function Insertar_Promocion($id_negocio=0,$id_dia=0,$imagen="",$fecha_inicio="",$fecha_final=""){

            if($this->con->conectar()==true){
			return mysql_query("insert into promocion values(0,".$id_negocio.",".$id_dia.",'".$imagen."','".$fecha_inicio."','".$fecha_final."','Habilitado');");
		}
	}
	function Mostrar_Tabla_Promocion(){
		if($this->con->conectar()==true){
			return mysql_query("select promocion.id_promocion,promocion.id_negocio,negocio.nombre as negocio,promocion.id_dia,(select dia.nombre from dia where dia.id_dia=promocion.id_dia) as dia,promocion.imagen,promocion.fecha_inicio,promocion.fecha_fin from promocion,negocio where promocion.observacion='Habilitado' and  promocion.id_negocio=negocio.id_negocio and negocio.observacion='Habilitado';");
		}
	}
        function Mostrar_Tabla_Promocion_Negocios($id_principal=0,$Dia=0){
             date_default_timezone_set("America/La_Paz"); 
            $Fecha= date("Y-m-d");            
            
		if($this->con->conectar()==true){
			return mysql_query("select promocion.imagen,promocion.id_negocio from promocion,negocio where negocio.id_principal=".$id_principal." and promocion.id_negocio=negocio.id_negocio and '".$Fecha."' between promocion.fecha_inicio and promocion.fecha_fin and promocion.observacion='Habilitado' and promocion.id_dia=".$Dia."; ");
		}
	}
        function Obtener_Imagen_Promocion($id_promocion=0){
		if($this->con->conectar()==true){
			return mysql_query("select imagen from promocion where id_promocion = ".$id_promocion);
		}
	}

	function Eliminar_Imagen_Promocion($id_promocion=0){
		if($this->con->conectar()==true){
			return mysql_query("update promocion set observacion= 'DesHabilitado' where id_promocion = ".$id_promocion);
		}
	}


        function Modificar_Imagen_Promocion($id_promocion=0,$id_negocio=0,$id_dia=0,$imagen="",$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update promocion  set id_negocio=".$id_negocio.",id_dia=".$id_dia.",imagen='".$imagen."',fecha_inicio='".$fecha_inicio."',fecha_fin='".$fecha_final."' where id_promocion = ".$id_promocion);
		}
	}

        function Modificar_sin_Imagen_Promocion($id_promocion=0,$id_negocio=0,$id_dia=0,$fecha_inicio="",$fecha_final=""){
		if($this->con->conectar()==true){

			return mysql_query("update promocion  set id_negocio=".$id_negocio.",id_dia=".$id_dia.",fecha_inicio='".$fecha_inicio."',fecha_fin='".$fecha_final."' where id_promocion = ".$id_promocion);
		}
	}


}
?>
