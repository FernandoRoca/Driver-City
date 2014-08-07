<?php
class Negocio_Clasificacion{
    
var $objD_Gestionar_Clasificacion;
    function Negocio_Clasificacion(){
        require('../../Datos/D_Gestionar_Clasificacion.php');
        $this->objD_Gestionar_Clasificacion = new Datos_Gestionar_Clasificacion();
    }
    
    function Combo_Clasificacion($id_clasificacion=0){
        $consulta = $this->objD_Gestionar_Clasificacion->Mostrar_Tabla_Clasificacion();
        echo "<option value=\"0\">Seleccione una Clasificacion</option>\n";
        if($consulta){
            while($Combo_Clasificacion = mysql_fetch_array($consulta)){
                if($id_clasificacion==$Combo_Clasificacion['id_clasificacion']){
                    echo "<option selected value=\"".$Combo_Clasificacion['id_clasificacion']."\">".$Combo_Clasificacion['nombre']."</option>\n";
                }else{
                    echo "<option value=\"".$Combo_Clasificacion['id_clasificacion']."\">".$Combo_Clasificacion['nombre']."</option>\n";
                }
            }
        }
    }
    
    
    function Combo_NegocioClasificacion($id_negocio=0){
      $consulta = $this->objD_Gestionar_Clasificacion->Mostrar_Tabla_NegocioClasificacion();
        echo "<option value=\"0\">Seleccione un Negocio</option>\n";
        if($consulta){
            while($Combo_NegocioClasificacion = mysql_fetch_array($consulta)){
                if($id_negocio==$Combo_NegocioClasificacion['id_negocio']){
                    echo "<option selected value=\"".$Combo_NegocioClasificacion['id_negocio']."\">".$Combo_NegocioClasificacion['nombre']."</option>\n";
                }
                else{
                   echo "<option value=\"".$Combo_NegocioClasificacion['id_negocio']."\">".$Combo_NegocioClasificacion['nombre']."</option>\n";
                }
            }
        }
    }

    function Insertar_Clasificacion($nombre="",$descripcion=""){
        if($nombre == "") {
            echo"<script>
                    alert('Escriba una Clasificacion!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";    
        }else{
            if($this->objD_Gestionar_Clasificacion->Insertar_Clasificacion($nombre,$descripcion)){
                echo"<script>
                        alert('Inserción Realizada con Exito!!');
                    </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
            }else{
                echo"<script>
                        alert('Error al Insertar la Clasificacion!!');
                    </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
            }
        }
    }

    function Tabla_Clasificacion() {
        $consulta = $this->objD_Gestionar_Clasificacion->Mostrar_Tabla_Clasificacion();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Clasificacion</th>
                  <th>Descripcion</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Clasificacion = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  <td align="middle">';echo $Tabla_Clasificacion['nombre'];echo'</td>
                  <td align="middle">';echo $Tabla_Clasificacion['descripcion'];echo'</td>

                  <td align="middle">
                      <span class="modi">
                          <a href="Clasificacion.php?id_clasificacion=';
                              echo base64_encode($Tabla_Clasificacion['id_clasificacion']);
                              echo'&nombre=';
                              echo  base64_encode($Tabla_Clasificacion['nombre']);
                              echo'&descripcion=';
                              echo base64_encode($Tabla_Clasificacion['descripcion']);
                              
                              echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" />
                          </a>
                      </span>
                  </td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Clasificacion.php?id_clasificacion=';
                              echo base64_encode($Tabla_Clasificacion['id_clasificacion']);
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

    function Eliminar_Clasificacion($id_clasificacion) {
        if($this->objD_Gestionar_Clasificacion->Eliminar_Clasificacion($id_clasificacion)){
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