<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Horario{
 //constructor	
 	var $con;
 	function Datos_Gestionar_Horario(){
 		$this->con=new DBManager;
 	}

	function Insertar_Horario($id_negocio=0,$id_dia=0,$hora_inicio="",$hora_fin=""){
           
            if($this->con->conectar()==true){			
			return mysql_query("insert into horario values(0,".$id_negocio.",".$id_dia.",'".$hora_inicio."','".$hora_fin."','Habilitado')");
		}
	}	
	function Mostrar_Tabla_Horario(){ 
		if($this->con->conectar()==true){
			return mysql_query("select horario.id_horario,horario.id_negocio, negocio.nombre as negocio,horario.id_dia,(select dia.nombre from dia where dia.id_dia=horario.id_dia) as dia,horario.hora_inicio,horario.hora_fin from horario,negocio where horario.observacion='Habilitado' and negocio.id_negocio=horario.id_negocio and negocio.observacion='Habilitado';");
		}
	}
       
        
	function Eliminar_Horario($id_horario=0){
            
		if($this->con->conectar()==true){
			return mysql_query("update horario set observacion= 'DesHabilitado' where id_horario = ".$id_horario);
		}
	}
      
	
        function Modificar_Horario($id_horario=0,$id_negocio=0,$id_dia=0,$hora_inicio="",$hora_fin=""){
		if($this->con->conectar()==true){
			
			return mysql_query("update horario set id_negocio=".$id_negocio.",id_dia=".$id_dia.",hora_inicio='".$hora_inicio."',hora_fin='".$hora_fin."' where id_horario = ".$id_horario);
		}
	}
       
    
	
}
?>
