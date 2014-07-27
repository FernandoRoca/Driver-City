<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Estado_Negocio{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Estado_Negocio(){
 		$this->con=new DBManager;
 	}

	function Insertar_Estado_Negocio($id_negocio=0,$id_negocio_enlace=0,$estado=""){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into estado_negocio values(0,".$id_negocio.",".$id_negocio_enlace.",'".$estado."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Estado_Negocio(){ 
		if($this->con->conectar()==true){
			return mysql_query("select estado_negocio.id_estado_negocio,estado_negocio.id_negocio,estado_negocio.estado_negocio,estado_negocio.id_negocio_enlace,
(select negocio.nombre from negocio where negocio.id_negocio=estado_negocio.id_negocio and negocio.observacion='Habilitado') as negocio,
(select negocio.nombre from negocio where negocio.id_negocio=estado_negocio.id_negocio_enlace and negocio.observacion='Habilitado') as negocio_enlace
 from estado_negocio where estado_negocio.observacion='Habilitado' ;");
		}
	}
       
        
	function Eliminar_Estado_Negocio($id_Estado_Negocio=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update estado_negocio set observacion= 'DesHabilitado' where id_estado_negocio = ".$id_Estado_Negocio);
		}
	}
      
	
        function Modificar_Estado_Negocio($id_estado_negocio=0,$id_negocio=0,$id_negocio_enlace=0,$estado=""){
		if($this->con->conectar()==true){
			return mysql_query("update estado_negocio set id_negocio=".$id_negocio.",id_negocio_enlace=".$id_negocio_enlace.",estado_negocio='".$estado."' where id_estado_negocio = ".$id_estado_negocio);
		}
	}
       
    function Mostrar_Negocios_Sin_Estado(){ 
		if($this->con->conectar()==true){
			return mysql_query("select negocio.nombre,negocio.id_negocio from negocio where negocio.observacion='Habilitado' and negocio.id_negocio not in(select estado_negocio.id_negocio from estado_negocio);");
		}
	}
     function Mostrar_Negocios_Centrales(){ 
		if($this->con->conectar()==true){
			return mysql_query("select negocio.nombre,negocio.id_negocio from negocio where negocio.observacion='Habilitado' and negocio.id_negocio in(select estado_negocio.id_negocio from estado_negocio where estado_negocio.estado_negocio='Central');");
		}
	}
	
}
?>
