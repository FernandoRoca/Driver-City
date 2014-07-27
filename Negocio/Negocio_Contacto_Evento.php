<?php
class Negocio_Contacto_Evento{
var $objD_Gestionar_Contacto_Evento;

	
        function Negocio_Contacto_Evento(){
              
		require('../../Datos/D_Gestionar_Contacto_Evento.php');              
		$this->objD_Gestionar_Contacto_Evento=new Datos_Gestionar_Contacto_Evento();
	}

  function Eliminar_Contacto_Evento($id_contacto_evento=0){
      
      
			if($this->objD_Gestionar_Contacto_Evento->Eliminar_Contacto_Evento($id_contacto_evento) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                 echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
			}
			
			
  }
 
  
   
 function Insertar_Contacto_Evento($id_evento=0,$nombre="",$telefono=0,$celular=0){
    
        if($id_evento==0){
                echo "<script>alert('Seleccione un Evento!!');	
                
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>";   
        }
        else{	
            if($nombre==""){
                echo "<script>alert('Inserte un Nombre!!');	
                
                </script>";
               echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
        }
        else{	
            if($telefono==0){
              echo  "<script>alert('Inserte un Telefono!!');	
              
                </script>";
             echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>";   
            }
            else{
                      if($celular==0){
              echo  "<script>alert('Inserte un Celular!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>";  
            }
            else{     
               
                    if ( $this->objD_Gestionar_Contacto_Evento->Insertar_Contacto_Evento($id_evento,$nombre,$telefono,$celular) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>";   
                    }
            }
            }
            
            }
                }


  }
  
    

  
  function Tabla_Contacto_Evento(){
   $consulta=$this->objD_Gestionar_Contacto_Evento->Mostrar_Tabla_Contacto_Evento();
  
  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Evento</th>   
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
  while( $Tabla_Contacto_Evento = mysql_fetch_array($consulta) ){
 
   echo' <tr>  
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Contacto_Evento['evento'];echo'</td> 
                          <td align="middle">';echo $Tabla_Contacto_Evento['nombre'];echo'</td> 
                          <td align="middle">';echo $Tabla_Contacto_Evento['telefono'];echo '</td>  
                          <td align="middle">';echo $Tabla_Contacto_Evento['celular'];echo '</td>  
                          <td align="middle"><span class="modi"><a href="Contacto_Evento.php?id_contacto_evento=';echo base64_encode($Tabla_Contacto_Evento['id_contacto_evento']);echo'&id_evento=';echo  base64_encode($Tabla_Contacto_Evento['id_evento']);echo'&nombre=';echo base64_encode($Tabla_Contacto_Evento['nombre']);echo'&telefono=';echo base64_encode($Tabla_Contacto_Evento['telefono']);echo'&celular=';echo base64_encode($Tabla_Contacto_Evento['celular']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Contacto_Evento.php?id_contacto_evento=';echo base64_encode($Tabla_Contacto_Evento['id_contacto_evento']);echo'&id_evento=';echo  base64_encode(0);echo'&nombre="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
        
                          
      </tr> ';

        $Contador++;
    }
}
    

echo '</tbody>
    </table>  ';
  
 
	
  }  
  
  
  
  function Modificar_Contacto_Evento($id_contacto_evento=0,$id_evento=0,$nombre="",$telefono=0,$celular=0){
	
		 
       if($id_evento==0){
                echo "<script>alert('Seleccione un Evento!!');	
                
                </script>";
               echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>";   
        }
        else{	
            if($nombre==""){
                echo "<script>alert('Inserte un Nombre!!');	
                
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
        }
        else{	
            if($telefono==0){
              echo  "<script>alert('Inserte un Telefono!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
            }
            else{
                      if($celular==0){
              echo  "<script>alert('Inserte un Celular!!');	
              
                </script>";
            echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
            }
            else{     
               
                    if ( $this->objD_Gestionar_Contacto_Evento->Modificar_Contacto_Evento($id_contacto_evento,$id_evento,$nombre,$telefono,$celular) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    
                    </script>";
                   echo "<meta http-equiv=refresh content=1;URL=Contacto_Evento.php>"; 
                    }
            }
            }
            
            }
                }


				
  }
  


}
?>

