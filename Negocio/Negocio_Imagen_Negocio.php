<?php
class Negocio_Imagen_Negocio{
var $objD_Gestionar_Imagen_Negocio;


        function Negocio_Imagen_Negocio(){

		require('../../Datos/D_Gestionar_Imagen_Negocio.php');
		$this->objD_Gestionar_Imagen_Negocio=new Datos_Gestionar_Imagen_Negocio();
	}

  function Eliminar_Imagen_Negocio($id_imagen_negocio=0){

      $consulta=$this->objD_Gestionar_Imagen_Negocio->Obtener_Imagen_Negocio($id_imagen_negocio);
      if($consulta) {
      while( $Ubicacion = mysql_fetch_array($consulta) ){
        unlink("../../img/Imagen_Negocio/".$Ubicacion['ubicacion'] );
      }
      }
			if($this->objD_Gestionar_Imagen_Negocio->Eliminar_Imagen_Negocio($id_imagen_negocio) == true){
				echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
			}


  }


 function Insertar_Imagen_Negocio($id_negocio=0,$ubicacion=""){

        if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
        }
        else{
            if($ubicacion==""){
              echo  "<script>alert('Inserte Direccion de la Imagen!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
            }
            else{


                    if ( $this->objD_Gestionar_Imagen_Negocio->Insertar_Imagen_Negocio($id_negocio,$ubicacion) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
                    }


            }
                }


  }




  function Tabla_Imagen_Negocio(){
   $consulta=$this->objD_Gestionar_Imagen_Negocio->Mostrar_Tabla_Imagen_Negocio();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Negocio</th>
      <th>Imagen</th>
      <th>Editar</th>
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Imagen_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Imagen_Negocio['nombre'];echo'</td>
                          <td align="middle"><a href="../../img/Imagen_Negocio/';echo $Tabla_Imagen_Negocio['ubicacion'];echo'">';echo $Tabla_Imagen_Negocio['ubicacion'];echo '</a></td>
                          <td align="middle"><span class="modi"><a href="Imagen_Negocio.php?id_imagen_negocio=';echo base64_encode($Tabla_Imagen_Negocio['id_imagen_negocio']);echo'&id_negocio=';echo  base64_encode($Tabla_Imagen_Negocio['id_negocio']);echo'&ubicacion=';echo base64_encode($Tabla_Imagen_Negocio['ubicacion']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Imagen_Negocio.php?id_imagen_negocio=';echo base64_encode($Tabla_Imagen_Negocio['id_imagen_negocio']);echo'&id_negocio=';echo  base64_encode($Tabla_Imagen_Negocio['id_negocio']);echo'&ubicacion="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }



  function Modificar_Imagen_Negocio($id_imagen_negocio=0,$id_negocio=0,$Ubicacion=""){


                     if($id_negocio==""){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                     echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
                     }
        else{
            if($Ubicacion==""){
              echo  "<script>alert('Inserte Direccion de la Imagen!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
            }
            else{




                                $consulta=$this->objD_Gestionar_Imagen_Negocio->Obtener_Imagen_Negocio($id_imagen_negocio);
                                if($consulta) {
                                while( $Ubicacion_Negocio = mysql_fetch_array($consulta) ){
                                            unlink("../../img/Imagen_Negocio/".$Ubicacion_Negocio['ubicacion'] );
                                          }
                                          }

                                    if ($this->objD_Gestionar_Imagen_Negocio->Modificar_Imagen_Negocio($id_imagen_negocio,$id_negocio,$Ubicacion) == true){

                                    echo "<script>alert('Modificacion Realizada con Exito!!');

                                    </script>";
                                    echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
                                  }



            }
                }



  }

function Modificar_Sin_Imagen_Negocio($id_imagen_negocio=0,$id_negocio=0){



                     if($id_negocio==""){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";
                     }
        else{



                                    if ($this->objD_Gestionar_Imagen_Negocio->Modificar_sin_Imagen_Negocio($id_imagen_negocio,$id_negocio) == true){

                                    echo "<script>alert('Modificacion Realizada con Exito!!');

                                    </script>";
                                    echo "<meta http-equiv=refresh content=1;URL=Imagen_Negocio.php>";




            }
                }
  }

   function Obtener_Imagen_Negocio($id_negocio=0){
      $consulta=$this->objD_Gestionar_Imagen_Negocio->Obtener_Imagen_del_Negocio($id_negocio);
      if($consulta) {
          $cont=1;
        while( $imagen_Negocio = mysql_fetch_array($consulta) ){
                    if($imagen_Negocio['ubicacion']!=""){
                        if($cont==1)
                         echo"<div class=\"item active\">" ; 
                        else
                         echo"<div class=\"item \">" ;    
                         echo "<img width=1200 px;  src=\"../../img/Imagen_Negocio/".$imagen_Negocio['ubicacion']."\">";                      
                         echo"</div>";
                         $cont++;
                    }
               }
              }
  }
function Insertar_Slider($id_negocio=0){
      $consulta=$this->objD_Gestionar_Imagen_Negocio->Obtener_Imagen_del_Negocio($id_negocio);
      if($consulta) {
        while( $imagen_Negocio = mysql_fetch_array($consulta) ){
                    if($imagen_Negocio['ubicacion']!=""){
                        echo "  <div id=\"myCarousel\" class=\"carousel slide\">
                                <div class=\"carousel-inner\">";
                       $this->Obtener_Imagen_Negocio($id_negocio);
                       echo "</div>
                            <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\"><img src=\"../../img/arrow.png\" alt=\"Arrow\"></a>
                            <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\"><img src=\"../../img/arrow2.png\" alt=\"Arrow\"></a>
                            </div>
                              <hr>";
                       break;
                    }
               }
              }
  }
}
?>

