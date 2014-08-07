<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Contacto_Negocio{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Contacto_Negocio(){
 		$this->con=new DBManager;
 	}

	function Insertar_Contacto_Negocio($id_negocio=0,$nombre="",$telefono=0,$celular=0){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into contacto values(0,".$id_negocio.",'".$nombre."',".$telefono.",".$celular.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Contacto_Negocio(){ 
		if($this->con->conectar()==true){
			return mysql_query("select contacto.id_contacto,contacto.id_negocio, negocio.nombre as negocio,contacto.nombre,contacto.telefono,contacto.celular from contacto,negocio where contacto.observacion='Habilitado' and negocio.id_negocio=contacto.id_negocio and negocio.observacion='Habilitado';");
		}
	}
       function Mostrar_Tabla_Contactos_del_Negocio($id_negocio=0){ 
		if($this->con->conectar()==true){
			return mysql_query("select contacto.id_contacto,contacto.id_negocio, negocio.nombre as negocio,contacto.nombre,contacto.telefono,contacto.celular from contacto,negocio where contacto.observacion='Habilitado' and negocio.id_negocio=contacto.id_negocio and negocio.observacion='Habilitado' and negocio.id_negocio=".$id_negocio.";");
		}
	}
        
	function Eliminar_Contacto_Negocio($id_contacto=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update contacto set observacion= 'DesHabilitado' where id_contacto = ".$id_contacto);
		}
	}
      
	
        function Modificar_Contacto_Negocio($id_contacto=0,$id_negocio=0,$nombre="",$telefono=0,$celular=0){
		if($this->con->conectar()==true){
			
			return mysql_query("update contacto set id_negocio=".$id_negocio.",nombre='".$nombre."',telefono=".$telefono.",celular=".$celular." where id_contacto = ".$id_contacto);
		}
	}
       
    
	
}
?>
