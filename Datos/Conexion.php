<?php
class DBManager{
	var $conect;

	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function DBManager(){

                 /* Tambien cambiar en la autentificacion control*/

/*
        $this->BaseDatos = "n260m_15083950_driver";
		$this->Servidor = "sql313.260mb.net";
		$this->Usuario = "n260m_15083950";
		$this->Clave = "Br1cksof";
*/

		$this->BaseDatos = "divercity";
		$this->Servidor = "localhost";
		$this->Usuario = "root";
		$this->Clave = "admintorca";
		
	}

	 function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos</h1>";
			exit();
		}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";
			exit();
		}
		$this->conect=$con;
		return true;
	}
	function fetch_array($consulta)
 {
  	return mysql_fetch_array($consulta);
 }

 function num_rows($consulta)
 {
 	 return mysql_num_rows($consulta);
 }

 function fetch_row($consulta)
 {
 	 return mysql_fetch_row($consulta);
 }
 function fetch_assoc($consulta)
 {
 	 return mysql_fetch_assoc($consulta);
 }
}
?>
