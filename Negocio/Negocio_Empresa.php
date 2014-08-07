<?php


class Negocio_Empresa{

var $objD_Gestionar_Empresa;
	
    function Negocio_Empresa(){
        require('../../Datos/D_Gestionar_Empresa.php');
            $this->objD_Gestionar_Empresa = new Datos_Gestionar_Empresa();
    }


    function Insertar_Empresa($nombre="",$logo="",$descripcion=""){
        if($nombre == ""){
            echo"<script
                alert('Escriba un Nombre!!');
            </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
        }else{
            if($logo == "") {
                echo"<script>
                    alert('seleccione un logo para la Empresa!!');
                </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
            }else{
                if($descripcion =="") {
                    echo"<script>
                        alert('Escriba una Descripcion!!');
                    </script>";

                    echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
                }else{
                    if($this->objD_Gestionar_Empresa->Insertar_Empresa($nombre,$logo,$descripcion)) {
                        echo"<script>
                            alert('Inserción Realizada con Exito!!');
                        </script>";
                        echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
                    }else{
                        echo"<script>
                            alert('Error al Insertar la Empresa!!');
                        </script>";
                        echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
                    }
                }
            }					
        }
    }


    function Tabla_Empresa() {
        $consulta = $this->objD_Gestionar_Empresa->Mostrar_Tabla_Empresa();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Empresa</th>
                  <th>Logo</th>
                  <th>Descripcion</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Empresa = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  <td align="middle">';echo $Tabla_Empresa['nombre'];echo'</td>
                  <td align="middle">
                      <img src="../../img/Logo_Empresa/';echo $Tabla_Empresa['logo'];echo'"></img>
                  </td>
                  
                  <td align="middle">';
                    if(strlen($Tabla_Empresa['descripcion']) >= 100){
                        echo substr($Tabla_Empresa['descripcion'],0,100).('...');
                    }else{
                        echo $Tabla_Empresa['descripcion'];
                    }
                    echo'
                  </td>

                  <td align="middle">
                      <span class="modi">
                          <a href="Empresa.php?id_empresa=';
                              echo base64_encode($Tabla_Empresa['id_empresa']);
                              echo'&nombre=';
                              echo  base64_encode($Tabla_Empresa['nombre']);
                              echo'&logo=';
                              echo base64_encode($Tabla_Empresa['logo']);
                              echo'&descripcion=';
                              echo base64_encode($Tabla_Empresa['descripcion']);
                              
                              echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" />
                          </a>
                      </span>
                  </td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Empresa.php?id_empresa=';
                              echo base64_encode($Tabla_Empresa['id_empresa']);
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

    function Eliminar_Empresa($id_empresa) {
        if($this->objD_Gestionar_Empresa->Eliminar_Empresa($id_empresa) == true){
            echo "<script>
                alert('Eliminacion Realizada con Exito!!');
            </script>";
        }
    }
    
    
    function Modificar_Empresa($id_empresa=0,$nombre="",$logo="",$descripcion="") {
        if($id_empresa == 0) {
                echo"<script>
                    alert('Seleccione una Empresa para su modificacion!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";    
        }else{    
            if($nombre == "") {
                echo"<script>
                    alert('Ingrese el nombre de la Empresa!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
            }else{
                if($descripcion == "") {
                    echo"<script>
                        alert('Escriba una Descripcion!!');
                    </script>";

                    echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
                }else{
                    if($this->objD_Gestionar_Empresa->Modificar_Empresa($id_empresa, $nombre, $logo, $descripcion)) {
                                    echo"<script>
                                        alert('Modificacíon Realizada con Exito!!');
                                    </script>";
                                    echo "<meta http-equiv = refresh content = 1; URL = Empresa.php>";
                    }
                }   
            }
        }
    }
    
    
    function Combo_Empresa($id_empresa=0) {
        $consulta = $this->objD_Gestionar_Empresa->Mostrar_Tabla_Empresa();
        echo "<option value=\"0\">Seleccione una Empresa</option>\n";
        if($consulta){
            while($Combo_Empresa = mysql_fetch_array($consulta)){
                if($id_empresa==$Combo_Empresa['id_empresa']){
                    echo "<option selected value=\"".$Combo_Empresa['id_empresa']."\">".$Combo_Empresa['nombre']."</>\n";
                }else{
                    echo "<option value=\"".$Combo_Empresa['id_empresa']."\">".$Combo_Empresa['nombre']."</>\n";
                }
                
            }
        }
    }
  
}
?>