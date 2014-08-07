<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Negocio_Clasificacion{
	
 //constructor
    var $con;
    function Datos_Gestionar_Negocio_Clasificacion(){
        $this->con=new DBManager;
    }

//--------------------------INSERT--------------------------------//
	
	
    function Insertar_Negocio_Clasificacion($id_clasificacion=0,$id_negocio=0){
        if($this->con->conectar() == true){
            return mysql_query("call proc_insertar_negocio_clasificacion(".$id_clasificacion.",".$id_negocio.");");
        }
    }


//-------------------------UPDATE-------------------------------//

//----------------------DELETE----------------------------//
    function Eliminar_Negocio_Clasificacion($id_negocio_clasificacion=0){
        if($this->con->conectar()==true){
            return mysql_query("call proc_eliminar_negocio_clasificacion(".$id_negocio_clasificacion.");");
        }
    }

//--------------------------VIEW-------------------------------//
        
    function Mostrar_Tabla_Negocio_Clasificacion(){
        if($this->con->conectar()==true){
            return mysql_query("select	nc.id_negocio_clasificacion,
                                        nc.id_clasificacion,
                                        nc.id_negocio,
                                        n.nombre as 'negocio',
                                        c.nombre as 'clasificacion',
                                        c.descripcion
                                                from negocio_clasificacion nc, negocio n, clasificacion c
                                                        where	nc.observacion = 'Habilitado' and
                                                                nc.id_clasificacion = c.id_clasificacion and
                                                                nc.id_negocio = n.id_negocio;");
        }
    }
}
?>
