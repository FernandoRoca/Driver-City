<?php
class Negocio_Evento{
var $objD_Gestionar_Evento;


        function Negocio_Evento(){

		require('../../Datos/D_Gestionar_Evento.php');
		$this->objD_Gestionar_Evento=new Datos_Gestionar_Evento();
	}



   function Combo_Evento_Punto_de_Venta($id_evento=0){

   $consulta=$this->objD_Gestionar_Evento->Mostrar_Tabla_Evento();
  echo "<option value=\"Punto_Venta_Evento.php\">Seleccione Evento</option>\n";
     if($consulta) {

  while( $Combo_evento = mysql_fetch_array($consulta) ){

          if($id_evento==$Combo_evento['id_evento']){
                echo "<option selected value=\"Punto_Venta_Evento.php?id_evento=".base64_encode($Combo_evento['id_evento'])."\">".$Combo_evento['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"Punto_Venta_Evento.php?id_evento=".base64_encode($Combo_evento['id_evento'])."\">".$Combo_evento['nombre']."</option>\n";
          }
        }
        }
  }
  function Combo_Evento_Contactos($id_evento=0){

   $consulta=$this->objD_Gestionar_Evento->Mostrar_Tabla_Evento();
  echo "<option value=\"0\">Seleccione Evento</option>\n";
     if($consulta) {

  while( $Combo_evento = mysql_fetch_array($consulta) ){

          if($id_evento==$Combo_evento['id_evento']){
                echo "<option selected value=\"".($Combo_evento['id_evento'])."\">".$Combo_evento['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"".($Combo_evento['id_evento'])."\">".$Combo_evento['nombre']."</option>\n";
          }
        }
        }
  }


	function Eliminar_logo_Evento($id_logo_evento=0){

      $consulta=$this->objD_Gestionar_Evento->Obtener_Logo_Evento($id_logo_evento);
      if($consulta) {
      while( $Ubicacion = mysql_fetch_array($consulta) ){
        unlink("../../img/Logo_Evento/".$Ubicacion['imagen'] );
      }
      }
      if($this->objD_Gestionar_Evento->Eliminar_Logo_Evento($id_logo_evento) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
      }


  }
  

function Insertar_Evento($id_principal=0,$nombre="",$lugar="",$hora="",$logo="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
  
        if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
               if($lugar==""){
              echo  "<script>alert('Inserte Lugar del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                 if($logo==""){
              echo  "<script>alert('Inserte un Logo!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                if($hora==""){
                             echo  "<script>alert('Inserte una Hora al Evento!!');

                               </script>";
                             echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
                           }
                           else{
                    if ( $this->objD_Gestionar_Evento->Insertar_Evento($id_principal,$nombre,$lugar,$hora,$logo,$descripcion,$x,$y,$fecha_inicio,$fecha_final) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
                    }    }
            }
            }
          }
          }

            }
                }


  }


}
function Tabla_Evento(){
   $consulta=$this->objD_Gestionar_Evento->Mostrar_Tabla_Evento();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Principal</th>
      <th>Nombre</th>
      <th>Lugar</th>
      <th>Hora</th>
      <th>Logo</th>
      <th>Descripcion</th>
      <th>Posicion X</th>
      <th>Posicion Y</th>
      <th>Fecha Inicio</th>
      <th>Fecha Final</th>
      <th>Editar</th>
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Evento = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Evento['principal'];echo'</td>
                          <td align="middle">';echo $Tabla_Evento['nombre'];echo'</td>
                          <td align="middle">';echo $Tabla_Evento['lugar'];echo'</td>
                          <td align="middle">';echo $Tabla_Evento['hora'];echo'</td>    
                          <td align="middle"><img src="../../img/Logo_Evento/';echo $Tabla_Evento['imagen'];echo'"/></td>
                          <td align="middle">';echo $Tabla_Evento['descripcion'];echo'</td>                              
                          <td align="middle">';echo $Tabla_Evento['posicion_x'];echo'</td>
                          <td align="middle">';echo $Tabla_Evento['posicion_y'];echo'</td>    
                          <td align="middle">';echo $Tabla_Evento['fecha_inicio'];echo'</td>
                          <td align="middle">';echo $Tabla_Evento['fecha_final'];echo'</td>    
                          <td align="middle"><span class="modi"><a href="Evento.php?id_evento=';echo base64_encode($Tabla_Evento['id_evento']);echo'&id_principal=';echo  base64_encode($Tabla_Evento['id_principal']);echo'&nombre=';echo base64_encode($Tabla_Evento['nombre']);echo'&lugar=';echo base64_encode($Tabla_Evento['lugar']);echo'&hora=';echo base64_encode($Tabla_Evento['hora']);echo'&imagen=';echo base64_encode($Tabla_Evento['imagen']);echo'&descripcion=';echo base64_encode($Tabla_Evento['descripcion']);echo'&latitud=';echo base64_encode($Tabla_Evento['posicion_x']);echo'&longitud=';echo base64_encode($Tabla_Evento['posicion_y']);echo'&fecha_inicio=';echo base64_encode($Tabla_Evento['fecha_inicio']);echo'&fecha_final=';echo base64_encode($Tabla_Evento['fecha_final']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Evento.php?id_evento=';echo base64_encode($Tabla_Evento['id_evento']);echo'&id_principal=';echo  base64_encode($Tabla_Evento['id_principal']);echo'&nombre="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
function Modificar_Logo_Evento($id_evento=0,$id_principal=0,$nombre="",$lugar="",$hora="",$logo="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){


        if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
               if($lugar==""){
              echo  "<script>alert('Inserte Lugar del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                 if($logo==""){
              echo  "<script>alert('Inserte un Logo!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                if($hora==""){
                             echo  "<script>alert('Inserte una Hora al Evento!!');

                               </script>";
                             echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
                           }
                           else{
                $consulta=$this->objD_Gestionar_Evento->Obtener_Logo_Evento($id_evento);
                                if($consulta) {
                                while( $Logo_Evento = mysql_fetch_array($consulta) ){
                                            if($Logo_Evento['imagen']!="")
                                            unlink("../../img/Logo_Evento/".$Logo_Evento['imagen'] );
                                          }
                                          }
                                          
                                    if ($this->objD_Gestionar_Evento->Modificar_Logo_Evento($id_evento,$id_principal,$nombre,$lugar,$hora,$logo,$descripcion,$x,$y,$fecha_inicio,$fecha_final) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
                            }    }
            }
            }
          }
          }

            }
                }


  }


}

function Modificar_Sin_Logo_Evento($id_evento=0,$id_principal=0,$nombre="",$lugar="",$hora="",$descripcion="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){

 if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
               if($lugar==""){
              echo  "<script>alert('Inserte Lugar del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial del Evento!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
            }
            else{
               
                if($hora==""){
                             echo  "<script>alert('Inserte una Hora al Evento!!');

                               </script>";
                             echo "<meta http-equiv=refresh content=1;URL=Evento.php>";
                           }
                           else{      

                                    if ($this->objD_Gestionar_Evento->Modificar_sin_Logo_Evento($id_evento,$id_principal,$nombre,$lugar,$hora,$descripcion,$x,$y,$fecha_inicio,$fecha_final) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
                   }
            }
            }
          }
          }

            }
                }


  }


}


}
?>

