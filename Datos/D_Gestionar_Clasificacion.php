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
	
	
    function Insertar_Clasificacion($nombre="",$imagen=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into clasificacion
                                    values(0,'".$nombre."','Habilitado','".$imagen."');");
        }
    }


//-------------------------UPDATE-------------------------------//
    function Modificar_Clasificacion_con_Imagen($id_clasificacion=0,$nombre="",$imagen="") {
        if($this->con->conectar() == true){
            return mysql_query("update clasificacion c set
                                    c.nombre = '".$nombre."',
                                    c.imagen = '".$imagen."'
                                        where c.id_clasificacion = ".$id_clasificacion.";");
        }
    }
     function Modificar_Clasificacion_sin_Imagen($id_clasificacion=0,$nombre="") {
        if($this->con->conectar() == true){
            return mysql_query("update clasificacion c set
                                    c.nombre = '".$nombre."'
                                   
                                        where c.id_clasificacion = ".$id_clasificacion.";");
        }
    }
    function Obtener_Logo_Clasificacion($id_clasificacion=0){
		if($this->con->conectar()==true){
			return mysql_query("select imagen from clasificacion where id_clasificacion = ".$id_clasificacion);
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
                                        imagen
                                            from clasificacion
                                                where observacion = 'Habilitado';");
        }
    }
    function Mostrar_Tabla_Clasificacion_pendiente($id_negocio=0){
        if($this->con->conectar()==true){
            //return mysql_query("call proc_tabla_horario_pelicula();");
            return mysql_query("select  clasificacion.id_clasificacion,
                                        clasificacion.nombre,
                                        clasificacion.imagen
                                            from clasificacion
                                                where observacion = 'Habilitado' and clasificacion.id_clasificacion not in (select negocio_clasificacion.id_clasificacion from negocio_clasificacion where negocio_clasificacion.id_negocio=".$id_negocio." and negocio_clasificacion.observacion='Habilitado');");
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
