<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Pelicula{
	
 //constructor
 	var $con;
 	function Datos_Gestionar_Pelicula(){
 		$this->con=new DBManager;
 	}

//--------------------------INSERT--------------------------------//
	
	function Insertar_Pelicula($nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
		if($this->con->conectar() == true){
			return mysql_query("call proc_insertar_pelicula('".$nombre."','".$director."','".$genero."','".$imagen."','".$sinopsis."','".$trailer."');");
		}
	}
	
	function Insertar_Horario_Pelicula($id_pelicula=0,$id_negocio=0,$horario="",$fecha_inicio="",$fecha_fin=""){
		if($this->con->conectar() == true){
			return mysql_query("call proc_insertar_negocio_pelicula(".$id_pelicula.",".$id_negocio.",'".$horario."','".$fecha_inicio."','".$fecha_fin."');");
		}
	}

	function Mostrar_Tabla_Pelicula(){
		if($this->con->conectar() == true){
			return mysql_query("call proc_Tabla_pelicula('Habilitado');");
		}
	}
	
	function Ultimo_id_Pelicula() {
		if($this->con->conectar() == true){
			return mysql_query("select func_ultimo_id_pelicula();");
		}
	}


//-------------------------UPDATE-------------------------------//
	
	function Modificar_Pelicula(){
		if($this->con->conectar()==true){
		}
	}

//----------------------DROP(logic)----------------------------//

	function Eliminar_Pelicula($id_pelicula = 0){
		if($this->con->conectar()==true){
			return mysqli_num_fields("call proc_eliminar_pelicula(".$id_pelicula.");");
			
		}
	}

/*
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
*/

}
?>
