<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Contacto_Evento{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Contacto_Evento(){
 		$this->con=new DBManager;
 	}

	function Insertar_Contacto_Evento($id_evento=0,$nombre="",$telefono=0,$celular=0){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into contacto_evento values(0,".$id_evento.",'".$nombre."',".$telefono.",".$celular.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Contacto_Evento(){ 
		if($this->con->conectar()==true){
			return mysql_query("select contacto_evento.id_contacto_evento,contacto_evento.id_evento, evento.nombre as evento,contacto_evento.nombre,contacto_evento.telefono,contacto_evento.celular from contacto_evento,evento where contacto_evento.observacion='Habilitado' and evento.id_evento=contacto_evento.id_evento and evento.observacion='Habilitado';");
		}
	}
       
        
	function Eliminar_Contacto_Evento($id_contacto_evento=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update contacto_evento set observacion= 'DesHabilitado' where id_contacto_evento = ".$id_contacto_evento);
		}
	}
      
	
        function Modificar_Contacto_Evento($id_contacto_evento=0,$id_evento=0,$nombre="",$telefono=0,$celular=0){
		if($this->con->conectar()==true){
			
			return mysql_query("update contacto_evento set id_evento=".$id_evento.",nombre='".$nombre."',telefono=".$telefono.",celular=".$celular." where id_contacto_evento = ".$id_contacto_evento);
		}
	}
       
    
	
}
?>
