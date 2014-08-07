<?php
class Negocio_Negocio_Clasificacion{
    
var $objD_Gestionar_Negocio_Clasificacion;
    function Negocio_Negocio_Clasificacion(){
        require('../../Datos/D_Gestionar_Negocio_Clasificacion.php');
        $this->objD_Gestionar_Negocio_Clasificacion = new Datos_Gestionar_Negocio_Clasificacion();
    }
    

    function Insertar_Negocio_Clasificacion($id_clasificacion=0,$id_negocio=0){
        if($id_clasificacion == 0) {
            echo"<script>
                    alert('Seleccione una Clasificacion!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Negocio_Clasificacion.php>";    
        }else{
            if($id_negocio==0){
                echo"<script>
                    alert('Seleccione un Negocio!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Negocio_Clasificacion.php>";    
            }else{
                if($this->objD_Gestionar_Negocio_Clasificacion->Insertar_Negocio_Clasificacion($id_clasificacion,$id_negocio)) {
                    echo"<script>
                            alert('Inserción Realizada con Exito!!');
                        </script>";
                    echo "<meta http-equiv = refresh content = 1; URL = Negocio_Clasificacion.php>";
                }else{
                    echo"<script>
                            alert('Error al Insertar la Relacion Negocio/Clasificacion!!');
                        </script>";
                    echo "<meta http-equiv = refresh content = 1; URL = Negocio_Clasificacion.php>";
                }
            }
        }
    }

    function Tabla_Negocio_Clasificacion() {
        $consulta = $this->objD_Gestionar_Negocio_Clasificacion->Mostrar_Tabla_Negocio_Clasificacion();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Negocio</th>
                  <th>Clasificacion</th>
                  <th>Descripcion</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Negocio_Clasificacion = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  <td align="middle">';echo $Tabla_Negocio_Clasificacion['negocio'];echo'</td>
                  <td align="middle">';echo $Tabla_Negocio_Clasificacion['clasificacion'];echo'</td>
                  <td align="middle">';echo $Tabla_Negocio_Clasificacion['descripcion'];echo'</td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Negocio_Clasificacion.php?id_negocio_clasificacion=';
                              echo base64_encode($Tabla_Negocio_Clasificacion['id_negocio_clasificacion']);
                              echo'&nombre=">
                              <img src="../../img/delete.png" title="Eliminar" alt="Eliminar" />
                          </a>
                      </span>
                  </td>
              </tr>';
              $contador++;
          }
        }	
        echo'</tbody>
        </table> ';
    }

    function Eliminar_Negocio_Clasificacion($id_negocio_clasificacion=0) {
        if($this->objD_Gestionar_Negocio_Clasificacion->Eliminar_Negocio_Clasificacion($id_negocio_clasificacion)){
            echo "<script>
                alert('Eliminacion Realizada con Exito!!');
            </script>";
        }
    }
        
    
    function Modificar_Clasificacion($id_clasificacion=0,$nombre="",$descripcion="") {
        if($nombre == "") {
            echo"<script>
                alert('Ingrese una Clasificacion!!');
            </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
        }else{
            if($this->objD_Gestionar_Clasificacion->Modificar_Clasificacion($id_clasificacion, $nombre, $descripcion)) {
                echo"<script>
                    alert('Modificacíon Realizada con Exito!!');
                </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
            }else{
                echo"<script>
                        alert('Error al realizar la Modificacion!!');
                    </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
            }
        }
    }   
}
?>