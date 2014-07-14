<?php
class Negocio_Estado_Negocio{
var $objD_Gestionar_Estado_Negocio;


        function Negocio_Estado_Negocio(){

		require('../../Datos/D_Gestionar_Estado_Negocio.php');
		$this->objD_Gestionar_Estado_Negocio=new Datos_Gestionar_Estado_Negocio();
	}



   
		function Eliminar_Estado_Negocio($id_Estado_Negocio=0){

     
      if($this->objD_Gestionar_Estado_Negocio->Eliminar_Estado_Negocio($id_Estado_Negocio) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
      }


  }
  

function Insertar_Estado_Negocio($id_negocio=0,$id_negocio_enlace=0,$estado=""){
  
       
            if($id_negocio==0){
              echo  "<script>alert('Seleccione un Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
            }
            else{
                
                  if($estado==""){
              echo  "<script>alert('Seleccione un Estado del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
            }
            else{
               if($estado=="Sucursal"){
                   if($id_negocio_enlace==0){
                         echo  "<script>alert('Seleccione un Negocio Central!!');</script>";
                         echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
                   }
                   else{
                      if ( $this->objD_Gestionar_Estado_Negocio->Insertar_Estado_Negocio($id_negocio,$id_negocio_enlace,$estado) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
                    } 
                   }
               }
               else{
                    if ( $this->objD_Gestionar_Estado_Negocio->Insertar_Estado_Negocio($id_negocio,$id_negocio_enlace,$estado) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Estado_Negocio.php>";
                    }
               }
                    }
           
            }

}
function Mostrar_Tabla_Estado_Negocio(){
   $consulta=$this->objD_Gestionar_Estado_Negocio->Mostrar_Tabla_Estado_Negocio();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
     
      <th>Negocio</th>
      <th>Estado</th>
      <th>Central</th>
      
      <th>Eliminar</th>
      

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Estado_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          
                          <td align="middle">';echo $Tabla_Estado_Negocio['negocio'];echo'</td>
                          <td align="middle">';echo $Tabla_Estado_Negocio['estado_negocio'];echo'</td>
                          <td align="middle">';echo $Tabla_Estado_Negocio['negocio_enlace'];echo'</td>
                              
                          <td align="middle"><span class="dele"><a href="Estado_Negocio.php?id_estado_negocio=';echo base64_encode($Tabla_Estado_Negocio['id_estado_negocio']);echo'&id_negocio=';echo base64_encode(0);echo'"><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
                              


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
/*function Modificar_Punto_Venta_Evento($id_punto_venta_evento=0,$id_evento=0,$id_punto_venta=0){


                 
          if($id_evento==0){
              echo  "<script>alert('Seleccione un Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
            }
            else{
                  if($id_punto_venta==0){
              echo  "<script>alert('Seleccione un Punto de Venta!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
            }
            else{
                                          
                                    if ($this->objD_Gestionar_Estado_Negocio->Modificar_Punto_Venta_Evento($id_punto_venta_evento,$id_evento,$id_punto_venta) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
                    }
         
            }
            }

  }
}*/

 
 function Combo_Negocio_Sin_Esatdo($id_negocio=0){

   $consulta=$this->objD_Gestionar_Estado_Negocio->Mostrar_Negocios_Sin_Estado();
  echo "<option value=\"0\">Seleccione Negocio</option>\n";
     if($consulta) {

  while( $Combo_Negocio = mysql_fetch_array($consulta) ){

          if($id_negocio==$Combo_Negocio['id_negocio']){
                echo "<option selected value=\"Estado_Negocio.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"Estado_Negocio.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
        }
        }
  }
  function Combo_Estado($estado="",$id_negocio=0){
      
  echo "<option value=\"Estado_Negocio.php?id_negocio=".base64_encode($id_negocio)."&estado=\">Seleccione Estado</option>\n";
     if($estado=="Central"){
                echo "<option selected value=\"Estado_Negocio.php?id_negocio=".base64_encode($id_negocio)."&estado=".base64_encode("Central")."\">Central</option>\n";
          }
          else{
               echo "<option value=\"Estado_Negocio.php?id_negocio=".base64_encode($id_negocio)."&estado=".base64_encode("Central")."\">Central</option>\n"; 
          }

          if($estado=="Sucursal"){
                echo "<option selected value=\"Estado_Negocio.php?id_negocio=".base64_encode($id_negocio)."&estado=".base64_encode("Sucursal")."\">Sucursal</option>\n";
          }
          else{
               echo "<option value=\"Estado_Negocio.php?id_negocio=".base64_encode($id_negocio)."&estado=".base64_encode("Sucursal")."\">Sucursal</option>\n"; 
          }
          
        }
        
        function Combo_Negocio_Enlace($id_central=0){
      
  $consulta=$this->objD_Gestionar_Estado_Negocio->Mostrar_Negocios_Centrales();
  echo "<option value=\"0\">Seleccione una Central</option>\n";
     if($consulta) {

  while( $Combo_Central = mysql_fetch_array($consulta) ){

          if($id_central==$Combo_Central['id_negocio']){
                echo "<option selected value=\"".$Combo_Central['id_negocio']."\">".$Combo_Central['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"".$Combo_Central['id_negocio']."\">".$Combo_Central['nombre']."</option>\n";
          }
        }
        }
        }  
  
}
?>

