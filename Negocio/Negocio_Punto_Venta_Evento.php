<?php
class Negocio_Punto_Venta_Evento{
var $objD_Gestionar_Punto_Venta_Evento;


        function Negocio_Punto_Venta_Evento(){

		require('../../Datos/D_Gestionar_Punto_Venta_Evento.php');
		$this->objD_Gestionar_Punto_Venta_Evento=new Datos_Gestionar_Punto_Venta_Evento();
	}



   
		function Eliminar_Punto_Venta_Evento($id_Punto_Venta_Evento=0){

     
      if($this->objD_Gestionar_Punto_Venta_Evento->Eliminar_Punto_Venta_Evento($id_Punto_Venta_Evento) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
      }


  }
  

function Insertar_Punto_Venta_Evento($id_evento=0,$id_punto_venta=0){
  
       
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
               

                    if ( $this->objD_Gestionar_Punto_Venta_Evento->Insertar_Punto_Venta_Evento($id_evento,$id_punto_venta) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
                    }  
                    }
           
            }

}
function Mostrar_Tabla_Punto_Venta_Evento(){
   $consulta=$this->objD_Gestionar_Punto_Venta_Evento->Mostrar_Tabla_Punto_Venta_Evento();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
     
      <th>Evento</th>
      <th>Punto de Venta</th>
      
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Punto_Venta_Evento = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          
                          <td align="middle">';echo $Tabla_Punto_Venta_Evento['eventos'];echo'</td>
                          <td align="middle">';echo $Tabla_Punto_Venta_Evento['punto_ventas'];echo'</td>
                          <td align="middle"><span class="dele"><a href="Punto_Venta_Evento.php?id_punto_venta_evento=';echo base64_encode($Tabla_Punto_Venta_Evento['id_punto_venta_evento']);echo'&id_evento="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


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
                                          
                                    if ($this->objD_Gestionar_Punto_Venta_Evento->Modificar_Punto_Venta_Evento($id_punto_venta_evento,$id_evento,$id_punto_venta) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Punto_Venta_Evento.php>";
                    }
         
            }
            }

  }
}*/

 

}
?>

