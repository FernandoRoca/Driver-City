<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Pelicula{
	
 //constructor
    var $con;
    function Datos_Gestionar_Pelicula(){
        $this->con=new DBManager;
    }

//--------------------------INSERT--------------------------------//

    
    
    function Insertar_Pelicula($id_negocio=0,$nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into pelicula 
                                    values (null,
                                            ".$id_negocio.",
                                            '".$nombre."',
                                            '".$director."',
                                            '".$genero."',
                                            '".$imagen."',
                                            '".$sinopsis."',
                                            '".$trailer."',
                                            'Habilitado');");
        }
    }


    function Mostrar_Tabla_Pelicula(){
        if($this->con->conectar()==true){
            return mysql_query("select  p.id_pelicula,
                                        n.id_negocio,
                                        n.nombre as cine,
                                        p.nombre,p.director,
                                        p.genero,
                                        p.imagen,
                                        p.sinopsis,
                                        p.trailer
                                            from pelicula p, negocio n
                                                where   p.id_negocio = n.id_negocio and
                                                        p.observacion = 'Habilitado';");
        }
    }

//-------------------------UPDATE-------------------------------//
/*
    function Modificar_Pelicula(){
        if($this->con->conectar()==true){
        }
    }
*/
//----------------------DROP(logic)----------------------------//

    function Eliminar_Pelicula($id_pelicula=0){
        if($this->con->conectar()==true){
            return mysql_query("update pelicula
                                    set observacion = 'Deshabilitado'
                                        where id_pelicula = ".$id_pelicula.";");	
        }
    }
    
    
    function Mostrar_Tabla_Cine(){
        if($this->con->conectar() == true) { 
            //return "call proc_tabla_cine()";       
        return mysql_query("select  n.id_negocio,
                                    n.id_principal,
                                    p.nombre as cine,
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
                                                        p.nombre like '%cine%';");
        }
    }
    
    
    function Modificar_Pelicula($id_pelicula=0,$id_negocio=0,$nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
        if($this->con->conectar() == true) {
            return mysql_query("call proc_modificar_pelicula(".$id_pelicula.",".$id_negocio.",'".$nombre."','".$director."','".$genero."','".$imagen."','".$sinopsis."','".$trailer."');");    
        }
    }
    
}
?>
