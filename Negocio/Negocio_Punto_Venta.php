<?php
class Negocio_Punto_Venta{
var $objD_Gestionar_Punto_Venta;


        function Negocio_Punto_Venta(){

		require('../../Datos/D_Gestionar_Punto_Venta.php');
		$this->objD_Gestionar_Punto_Venta=new Datos_Gestionar_Punto_Venta();
	}



  function Combo_Punto_Venta_Evento($id_Evento=0){

   $consulta=$this->objD_Gestionar_Punto_Venta->Mostrar_Tabla_Punto_Venta_Habilitados($id_Evento);
  echo "<option value=\"0\">Seleccione Punto de Venta</option>\n";
     if($consulta) {

  while( $Combo_Punto_Venta = mysql_fetch_array($consulta) ){

          
                echo "<option value=\"".$Combo_Punto_Venta['id_punto_venta']."\">".$Combo_Punto_Venta['nombre']."</option>\n";
         
        }
        }
  }


		function Eliminar_Punto_Venta($id_Punto_Venta=0){

     
      if($this->objD_Gestionar_Punto_Venta->Eliminar_Punto_Venta($id_Punto_Venta) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Punto_Venta.php>";
      }


  }
  

function Insertar_Punto_Venta($nombre="",$direccion=""){
  
       
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Punto de Venta!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Punto_Venta.php>";
            }
            else{
               

                    if ( $this->objD_Gestionar_Punto_Venta->Insertar_Punto_Venta($nombre,$direccion) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Punto_Venta.php>";
                    }  
                    }
           


}
function Tabla_Punto_Venta(){
   $consulta=$this->objD_Gestionar_Punto_Venta->Mostrar_Tabla_Punto_Venta();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
     
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Editar</th>
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Punto_Venta = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          
                          <td align="middle">';echo $Tabla_Punto_Venta['nombre'];echo'</td>
                          <td align="middle">';echo $Tabla_Punto_Venta['direccion'];echo'</td>
                          <td align="middle"><span class="modi"><a href="Punto_Venta.php?id_punto_venta=';echo base64_encode($Tabla_Punto_Venta['id_punto_venta']);echo'&nombre=';echo  base64_encode($Tabla_Punto_Venta['nombre']);echo'&direccion=';echo  base64_encode($Tabla_Punto_Venta['direccion']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Punto_Venta.php?id_punto_venta=';echo base64_encode($Tabla_Punto_Venta['id_punto_venta']);echo'&nombre="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
function Modificar_Punto_Venta($id_punto_venta=0,$nombre="",$direccion=""){


                 
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Punto de Venta!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Punto_Venta.php>";
            }
            else{
             
                
                                          
                                    if ($this->objD_Gestionar_Punto_Venta->Modificar_Punto_Venta($id_punto_venta,$nombre,$direccion) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Punto_Venta.php>";
                    }
         
           

  }
}



}
?>

