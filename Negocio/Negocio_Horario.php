<?php
class Negocio_Horario{
var $objD_Gestionar_Horario;

	
        function Negocio_Horario(){
              
		require('../../Datos/D_Gestionar_Horario.php');              
		$this->objD_Gestionar_Horario=new Datos_Gestionar_Horario();
	}

  function Eliminar_Horario($id_horario=0){
      
     
			if($this->objD_Gestionar_Horario->Eliminar_Horario($id_horario) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Horario.php>";           
			}
			
			
  }
  
   
 function Insertar_Horario($id_negocio=0,$id_dia=0,$hora_inicio="",$hora_fin=""){
    
        if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');	
                
                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
        }
        else{	
            if($id_dia==0){
                echo "<script>alert('Seleccione un Dia!!');	
                
                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
        }
        else{	
            if($hora_inicio==""){
              echo  "<script>alert('Inserte Hora Entrada!!');	
              
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
            }
            else{
                      if($hora_fin==""){
              echo  "<script>alert('Inserte Hora Salida!!');	
              
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
            }
            else{     
               if($id_dia<8){
                    if ( $this->objD_Gestionar_Horario->Insertar_Horario($id_negocio,$id_dia,$hora_inicio,$hora_fin) == true){ 

                    echo "<script>alert('Insercion Realizada con Exito!!');
                    
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
                    }
               }
               else{
                   $i=0;
                   for($i=1;$i<=($id_dia-3);$i++){
                       $this->objD_Gestionar_Horario->Insertar_Horario($id_negocio,$i,$hora_inicio,$hora_fin);
                   }
                   echo "<script>alert('Insercion Realizada con Exito!!');
                    
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
                   
               }
            }
            }
            
            }
                }


  }
  
    

  
  function Tabla_Horario(){
   $consulta=$this->objD_Gestionar_Horario->Mostrar_Tabla_Horario();
  
  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Negocio</th>   
      <th>Dia</th>
      <th>Hora Apertura</th> 
      <th>Hora Cierre</th>
      <th>Modificar</th> 
      <th>Eliminar</th>
            
        </tr>
      </thead>
      <tbody>';
  
 $Contador=1;
if($consulta) {
  while( $Tabla_Horario = mysql_fetch_array($consulta) ){
 
   echo' <tr>  
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Horario['negocio'];echo'</td> 
                          <td align="middle">';echo $Tabla_Horario['dia'];echo'</td> 
                          <td align="middle">';echo $Tabla_Horario['hora_inicio'];echo '</td>  
                              <td align="middle">';echo $Tabla_Horario['hora_fin'];echo '</td>  
                          <td align="middle"><span class="modi"><a href="Horario.php?id_horario=';echo base64_encode($Tabla_Horario['id_horario']);echo'&id_negocio=';echo  base64_encode($Tabla_Horario['id_negocio']);echo'&id_dia=';echo base64_encode($Tabla_Horario['id_dia']);echo'&hora_inicio=';echo base64_encode($Tabla_Horario['hora_inicio']);echo'&hora_fin=';echo base64_encode($Tabla_Horario['hora_fin']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Horario.php?id_horario=';echo base64_encode($Tabla_Horario['id_horario']);echo'&id_negocio=';echo  base64_encode(0);echo'&id_dia=';echo  base64_encode(0);echo'"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
        
                          
      </tr> ';

        $Contador++;
    }
}
    

echo '</tbody>
    </table>  ';
  
 
	
  }  
  
  
  
  function Modificar_Horario($id_horario=0,$id_negocio=0,$id_dia=0,$hora_inicio="",$hora_fin=""){
	
		 
        if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');	
                
                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
        }
        else{	
            if($id_dia==0){
                echo "<script>alert('Seleccione un Dia!!');	
                
                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
        }
        else{	
            if($hora_inicio==""){
              echo  "<script>alert('Inserte Hora Entrada!!');	
              
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
            }
            else{
                      if($hora_fin==""){
              echo  "<script>alert('Inserte Hora Salida!!');	
              
                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
            }
            else{     
                 
                    if ( $this->objD_Gestionar_Horario->Modificar_Horario($id_horario,$id_negocio,$id_dia,$hora_inicio,$hora_fin) == true){ 

                    echo "<script>alert('Modificacion Realizada con Exito!!');
                    
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Horario.php>"; 
                    }
                    }
               
            
            }
            
            }
                }

			
				
  }
  


}
?>

