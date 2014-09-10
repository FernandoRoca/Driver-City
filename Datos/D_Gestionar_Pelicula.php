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

    
    
    function Insertar_Pelicula($nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
        if($this->con->conectar() == true){
            return mysql_query("insert into pelicula 
                                    values (0,
                                           
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
                                        
                                        p.nombre,p.director,
                                        p.tipo as genero,
                                        p.imagen,
                                        p.sinopsis,
                                        p.trailer
                                            from pelicula p
                                                where   
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
    
    
   
    

    
      function Modificar_Logo_Pelicula($id_pelicula=0,$nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){
		if($this->con->conectar()==true){

			return mysql_query("update pelicula set nombre='".$nombre."',director='".$director."',tipo='".$genero."',imagen='".$imagen."',sinopsis='".$sinopsis."',trailer=".$trailer." where id_pelicula = ".$id_pelicula);
		}
	}

        function Modificar_sin_Logo_Pelicula($id_pelicula=0,$nombre="",$director="",$genero="",$sinopsis="",$trailer=""){
		if($this->con->conectar()==true){

			return mysql_query("update pelicula set nombre='".$nombre."',director='".$director."',tipo='".$genero."',sinopsis='".$sinopsis."',trailer=".$trailer." where id_pelicula = ".$id_pelicula);
		}
	}
         function Obtener_Logo_pelicula($id_pelicula=0){
		if($this->con->conectar()==true){
			return mysql_query("select imagen from pelicula where id_pelicula = ".$id_pelicula);
		}
	}
    
}
?>
