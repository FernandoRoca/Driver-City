<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Empresa{
	
 //constructor
    var $con;
    function Datos_Gestionar_Empresa(){
        $this->con=new DBManager;
    }

//--------------------------INSERT--------------------------------//

    
    
    function Insertar_Empresa($nombre="",$logo="",$descripcion=""){
        if($this->con->conectar() == true){
            return mysql_query("call proc_insertar_empresa('".$nombre."','".$logo."','".$descripcion."');");
        }
    }


//-------------------------UPDATE-------------------------------//
/*
    
*/
//----------------------DROP(logic)----------------------------//

    function Eliminar_Empresa($id_empresa=0){
        if($this->con->conectar()==true){
            return mysql_query("call proc_eliminar_empresa(".$id_empresa.");");	
        }
    }
    
    
    function Mostrar_Tabla_Empresa(){
        if($this->con->conectar() == true) {       
        return mysql_query("select  id_empresa,
                                    nombre,
                                    logo,
                                    descripcion 
                                            from empresa 
                                                where  observacion='Habilitado';");
        }
    }
    
    
    function Modificar_Empresa($id_empresa=0,$nombre="",$logo="",$descripcion=""){
        if($this->con->conectar() == true) {
            return mysql_query("call proc_modificar_empresa(".$id_empresa.",'".$nombre."','".$logo."','".$descripcion."');");    
        }
    }
    
    
    
    /*
    function Mostrar_Horarios_Pelicula($id_pelicula=0) {
        if($this->con->conectar() == true) {
            return mysql_query("SELECT hp.id_horario_pelicula, p.id_pelicula, hp.horario
		FROM pelicula p, horario_pelicula hp 
			WHERE p.id_pelicula = hp.id_pelicula AND
				p.id_pelicula = ".$id_pelicula.";");
        }
    }*/
}
?>
