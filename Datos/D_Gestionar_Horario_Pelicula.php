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
            return mysql_query("select n.id_negocio, p.id_pelicula, p.nombre
                                from pelicula p, negocio n
                                        where	n.observacion = 'Habilitado' and
                                                n.id_negocio = ".$id_negocio." and
                                                p.id_negocio = n.id_negocio and
                                                p.observacion = 'Habilitado';");
        }
    }


//--------------------------INSERT--------------------------------//
	
	
    function Insertar_Horario_Pelicula($id_pelicula=0,$horario="",$fecha_inicio="",$fecha_fin=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into horario_pelicula
                                    values(null,".$id_pelicula.",'".$horario."','".$fecha_inicio."','".$fecha_fin."');");
        }
    }


//-------------------------UPDATE-------------------------------//

//----------------------DELETE----------------------------//
    function Eliminar_horario_Pelicula($id_horario_pelicula=0){
        if($this->con->conectar()==true){
            return mysql_query("delete from horario_pelicula
                                    where id_horario_pelicula = ".$id_horario_pelicula.";");
        }
    }

//--------------------------VIEW-------------------------------//
        
    function Mostrar_Tabla_Horario_Pelicula(){
        if($this->con->conectar()==true){
            //return mysql_query("call proc_tabla_horario_pelicula();");
            return mysql_query("select  hp.id_horario_pelicula,
                                        n.id_negocio,
                                        p.id_pelicula,
                                        n.nombre as cine,
                                        p.nombre,
                                        p.imagen,
                                        hp.horario,
                                        hp.fecha_inicio,
                                        hp.fecha_fin
                                            from pelicula p, horario_pelicula hp, negocio n
                                            where   p.observacion = 'Habilitado' and
                                                    p.id_pelicula = hp.id_pelicula and
                                                    n.id_negocio = p.id_negocio;");
        }
    }
}
?>
