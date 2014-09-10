<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Horario_Pelicula{
	
 //constructor
    var $con;
    function Datos_Gestionar_Horario_Pelicula(){
        $this->con=new DBManager;
    }


    function Listar_Peliculas($id_negocio=0){
        if($this->con->conectar() == true){
            return mysql_query("SELECT pelicula.nombre,pelicula.id_pelicula FROM `pelicula` where pelicula.id_pelicula not in (select negocio_pelicula.id_pelicula from negocio_pelicula where negocio_pelicula.id_negocio=".$id_negocio.");");
        }
    }


//--------------------------INSERT--------------------------------//
	
	
    function Insertar_Horario_Pelicula($id_negocio=0,$id_pelicula=0,$horario="",$fecha_inicio="",$fecha_fin=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into negocio_pelicula
                                    values(0,".$id_negocio.",".$id_pelicula.",'".$horario."','".$fecha_inicio."','".$fecha_fin."');");
        }
    }


//-------------------------UPDATE-------------------------------//

//----------------------DELETE----------------------------//
    function Eliminar_horario_Pelicula($id_horario_pelicula=0){
        if($this->con->conectar()==true){
            return mysql_query("delete from negocio_pelicula
                                    where id_negocio_pelicula = ".$id_horario_pelicula.";");
        }
    }

//--------------------------VIEW-------------------------------//
        
    function Mostrar_Tabla_Horario_Pelicula(){
        if($this->con->conectar()==true){
            //return mysql_query("call proc_tabla_horario_pelicula();");
            return mysql_query("select  hp.id_negocio_pelicula,
                                        n.id_negocio,
                                        p.id_pelicula,
                                        n.nombre as cine,
                                        p.nombre,
                                        p.imagen,
                                        hp.horario,
                                        hp.fecha_inicio,
                                        hp.fecha_fin
                                            from pelicula p, negocio_pelicula hp, negocio n
                                            where   p.observacion = 'Habilitado' and
                                                    p.id_pelicula = hp.id_pelicula and
                                                    n.id_negocio = hp.id_negocio;");
        }
    }
}
?>
