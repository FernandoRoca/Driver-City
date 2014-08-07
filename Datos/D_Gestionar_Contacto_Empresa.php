<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("Conexion.php");

class Datos_Gestionar_Contacto_Empresa{
	
 //constructor
    var $con;
    function Datos_Gestionar_Contacto_Empresa(){
        $this->con=new DBManager;
    }

//--------------------------INSERT--------------------------------//

    
    
    function Insertar_Contacto_Empresa($id_empresa=0,$contacto="",$telefono=0,$celular=0){
        if($this->con->conectar() == true){
            return mysql_query("call proc_insertar_contacto_empresa(".$id_empresa.",'".$contacto."',".$telefono.",".$celular.");");
        }
    }


//-------------------------UPDATE-------------------------------//

    function Modificar_Contacto_Empresa($id_contacto_empresa=0,$id_empresa=0,$contacto="",$telefono=0,$celular=0){
        if($this->con->conectar() == true) {
            return mysql_query("call proc_modificar_contacto_empresa(".$id_contacto_empresa.",".$id_empresa.",'".$contacto."',".$telefono.",".$celular.");");    
        }
    }

//----------------------DROP(logic)----------------------------//

    function Eliminar_Contacto_Empresa($id_contacto_empresa=0){
        if($this->con->conectar()==true){
            return mysql_query("call proc_eliminar_contacto_empresa(".$id_contacto_empresa.");");	
        }
    }
    
    
    function Mostrar_Tabla_Contacto_Empresa(){
        if($this->con->conectar() == true) {       
        return mysql_query("select  ce.id_contacto_empresa,
                                    e.id_empresa,
                                    e.nombre as 'empresa',
                                    ce.nombre as 'contacto',
                                    ce.telefono,
                                    ce.celular
                                        from empresa e, contacto_empresa ce
                                            where   e.observacion = 'Habilitado' and
                                                    e.id_empresa = ce.id_empresa and
                                                    ce.observacion = 'Habilitado';");
        }
    }
    
    
    
    
}
?>
