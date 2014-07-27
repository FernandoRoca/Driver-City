<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Punto_Venta_Evento{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Punto_Venta_Evento(){
 		$this->con=new DBManager;
 	}

	function Insertar_Punto_Venta_Evento($id_evento=0,$id_punto_venta=0){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into punto_venta_evento values(0,".$id_evento.",".$id_punto_venta.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Punto_Venta_Evento(){ 
		if($this->con->conectar()==true){
			return mysql_query("select punto_venta_evento.id_punto_venta_evento,punto_venta_evento.id_evento,punto_venta_evento.id_punto_venta,
evento.nombre as eventos,
punto_venta.nombre as punto_ventas 
from punto_venta_evento,evento,punto_venta where punto_venta_evento.observacion='Habilitado' and evento.id_evento=punto_venta_evento.id_evento 
and evento.observacion='Habilitado' and punto_venta.id_punto_venta=punto_venta_evento.id_punto_venta and punto_venta.observacion='Habilitado';");
		}
	}
       
        
	function Eliminar_Punto_Venta_Evento($id_punto_venta_evento=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update punto_venta_evento set observacion= 'DesHabilitado' where id_punto_venta_evento = ".$id_punto_venta_evento);
		}
	}
      
	
        function Modificar_Punto_Venta_Evento($id_punto_venta_evento=0,$id_evento=0,$id_punto_venta=0){
		if($this->con->conectar()==true){
			return mysql_query("update punto_venta_evento set id_evento=".$id_evento.",id_punto_venta=".$id_punto_venta." where id_punto_venta_evento = ".$id_punto_venta_evento);
		}
	}
       
    
	
}
?>
