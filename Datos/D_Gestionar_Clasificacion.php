<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Clasificacion{
	
 //constructor
    var $con;
    function Datos_Gestionar_Clasificacion(){
        $this->con=new DBManager;
    }

//--------------------------INSERT--------------------------------//
	
	
    function Insertar_Clasificacion($nombre="",$descripcion=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into clasificacion
                                    values(null,'".$nombre."','".$descripcion."','Habilitado');");
        }
    }


//-------------------------UPDATE-------------------------------//
    function Modificar_Clasificacion($id_clasificacion=0,$nombre="",$descripcion="") {
        if($this->con->conectar() == true){
            return mysql_query("update clasificacion c set
                                    c.nombre = '".$nombre."',
                                    c.descripcion = '".$descripcion."'
                                        where c.id_clasificacion = ".$id_clasificacion.";");
        }
    }

//----------------------DELETE----------------------------//
    function Eliminar_Clasificacion($id_clasificacion=0){
        if($this->con->conectar()==true){
            return mysql_query("update clasificacion set
                                    observacion = 'Deshabilitado'
                                        where id_clasificacion = ".$id_clasificacion.";");
        }
    }

//--------------------------VIEW-------------------------------//
        
    function Mostrar_Tabla_Clasificacion(){
        if($this->con->conectar()==true){
            //return mysql_query("call proc_tabla_horario_pelicula();");
            return mysql_query("select  id_clasificacion,
                                        nombre,
                                        descripcion
                                            from clasificacion
                                                where observacion = 'Habilitado';");
        }
    }
    
    
    function Mostrar_Tabla_NegocioClasificacion(){
        if($this->con->conectar() == true) { 
            //return "call proc_tabla_cine()";       
        return mysql_query("select  n.id_negocio,
                                    n.id_principal,
                                    p.nombre as 'gastro',
                                    n.nombre,
                                    n.direccion,
                                    n.descripcion,
                                    n.web,
                                    n.logo,
                                    n.posicion_x,
                                    n.posicion_y,
                                    n.fecha_inicio,
                                    n.fecha_final 
                                        from negocio n,principal p 
                                            where   n.observacion='Habilitado' and 
                                                    p.id_principal=n.id_principal and 
                                                    p.observacion='Habilitado' and
                                                    p.nombre like '%gastro%';");
        }
    }
}
?>
