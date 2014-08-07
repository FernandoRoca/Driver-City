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
            return mysql_query("insert into empresa 
                                values (null,'".$nombre."','".$logo."','".$descripcion."','Habilitado');");
        }
    }


//-------------------------UPDATE-------------------------------//
/*
    
*/
//----------------------DROP(logic)----------------------------//

    function Eliminar_Empresa($id_empresa=0){
        if($this->con->conectar()==true){
            return mysql_query("update empresa set
                                    observacion = 'Deshabilitado'
                                        where id_empresa = ".$id_empresa.";");	
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
   
}
?>
