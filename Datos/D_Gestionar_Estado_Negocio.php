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

	function Insertar_Estado_Negocio($id_evento=0,$id_punto_venta=0){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into Estado_Negocio values(0,".$id_evento.",".$id_punto_venta.",'Habilitado')");
		}
	}	
	function Mostrar_Tabla_Estado_Negocio(){ 
		if($this->con->conectar()==true){
			return mysql_query("select Estado_Negocio.id_Estado_Negocio,Estado_Negocio.id_evento,Estado_Negocio.id_punto_venta,(select evento.nombre from evento where evento.id_evento=Estado_Negocio.id_evento) as eventos,(select punto_venta.nombre from punto_venta where punto_venta.id_punto_venta=Estado_Negocio.id_punto_venta) as punto_ventas from Estado_Negocio where Estado_Negocio.observacion='Habilitado' ;");
		}
	}
       
        
	function Eliminar_Estado_Negocio($id_Estado_Negocio=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update Estado_Negocio set observacion= 'DesHabilitado' where id_Estado_Negocio = ".$id_Estado_Negocio);
		}
	}
      
	
        function Modificar_Estado_Negocio($id_Estado_Negocio=0,$id_evento=0,$id_punto_venta=0){
		if($this->con->conectar()==true){
			return mysql_query("update Estado_Negocio set id_evento=".$id_evento.",id_punto_venta=".$id_punto_venta." where id_Estado_Negocio = ".$id_Estado_Negocio);
		}
	}
       
    
	
}
?>
