<?php
class Negocio_Contacto_Negocio{
var $objD_Gestionar_Contacto_Negocio;

	
        function Negocio_Contacto_Negocio(){
              
		require('../../Datos/D_Gestionar_Contacto_Negocio.php');              
		$this->objD_Gestionar_Contacto_Negocio=new Datos_Gestionar_Contacto_Negocio();
	}

  function Eliminar_Contacto_Negocio($id_contacto=0){
      
     
			if($this->objD_Gestionar_Contacto_Negocio->Eliminar_Contacto_Negocio($id_contacto) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                 echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
			}
			
			
  }
 
  
   
 function Insertar_Contacto_Negocio($id_negocio=0,$nombre="",$telefono=0,$celular=0){
    
        if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');	
                
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>";   
        }
        else{	
            if($nombre==""){
                echo "<script>alert('Inserte un Nombre!!');	
                
                </script>";
               echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
        }
        else{	
            if($telefono==0){
              echo  "<script>alert('Inserte un Telefono!!');	
              
                </script>";
             echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>";   
            }
            else{
                      if($celular==0){
              echo  "<script>alert('Inserte un Celular!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>";  
            }
            else{     
               
                    if ( $this->objD_Gestionar_Contacto_Negocio->Insertar_Contacto_Negocio($id_negocio,$nombre,$telefono,$celular) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>";   
                    }
            }
            }
            
            }
                }


  }
  
    

  
  function Tabla_Contacto_Negocio(){
   $consulta=$this->objD_Gestionar_Contacto_Negocio->Mostrar_Tabla_Contacto_Negocio();
  
  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Negocio</th>   
      <th>Nombre</th>
      <th>Telefono</th> 
      <th>Celular</th>
      <th>Modificar</th> 
      <th>Eliminar</th>
            
        </tr>
      </thead>
      <tbody>';
  
 $Contador=1;
if($consulta) {
  while( $Tabla_Contacto_Empresa = mysql_fetch_array($consulta) ){
 
   echo' <tr>  
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Contacto_Empresa['negocio'];echo'</td> 
                          <td align="middle">';echo $Tabla_Contacto_Empresa['nombre'];echo'</td> 
                          <td align="middle">';echo $Tabla_Contacto_Empresa['telefono'];echo '</td>  
                          <td align="middle">';echo $Tabla_Contacto_Empresa['celular'];echo '</td>  
                          <td align="middle"><span class="modi"><a href="Contacto_Negocio.php?id_contacto_negocio=';echo base64_encode($Tabla_Contacto_Empresa['id_contacto']);echo'&id_negocio=';echo  base64_encode($Tabla_Contacto_Empresa['id_negocio']);echo'&nombre=';echo base64_encode($Tabla_Contacto_Empresa['nombre']);echo'&telefono=';echo base64_encode($Tabla_Contacto_Empresa['telefono']);echo'&celular=';echo base64_encode($Tabla_Contacto_Empresa['celular']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Contacto_Negocio.php?id_contacto_negocio=';echo base64_encode($Tabla_Contacto_Empresa['id_contacto']);echo'&id_negocio=';echo  base64_encode(0);echo'&nombre="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
        
                          
      </tr> ';

        $Contador++;
    }
}
    

echo '</tbody>
    </table>  ';
  
 
	
  }  
  
  
  
  function Modificar_Contacto_Negocio($id_contacto=0,$id_negocio=0,$nombre="",$telefono=0,$celular=0){
	
		 
       if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');	
                
                </script>";
               echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>";   
        }
        else{	
            if($nombre==""){
                echo "<script>alert('Inserte un Nombre!!');	
                
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
        }
        else{	
            if($telefono==0){
              echo  "<script>alert('Inserte un Telefono!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
            }
            else{
                      if($celular==0){
              echo  "<script>alert('Inserte un Celular!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
            }
            else{     
               
                    if ( $this->objD_Gestionar_Contacto_Negocio->Modificar_Contacto_Negocio($id_contacto,$id_negocio,$nombre,$telefono,$celular) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    
                    </script>";
                   echo "<meta http-equiv=refresh content=1;URL=Contacto_Negocio.php>"; 
                    }
            }
            }
            
            }
                }


				
  }
  


}
?>

