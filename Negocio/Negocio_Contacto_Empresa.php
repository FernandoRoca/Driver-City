<?php


class Negocio_Contacto_Empresa{

var $objD_Gestionar_Contacto_Empresa;
	
    function Negocio_Contacto_Empresa(){
        require('../../Datos/D_Gestionar_Contacto_Empresa.php');
            $this->objD_Gestionar_Contacto_Empresa = new Datos_Gestionar_Contacto_Empresa();
    }


    function Insertar_Contacto_Empresa($id_empresa=0,$contacto="",$telefono=0,$celular=0){
        if($id_empresa == 0){
            echo"<script
                alert('Seleccione una Empresa!!');
            </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
        }else{
            if($contacto == "") {
                echo"<script>
                    alert('Ingrese el Nombre del Contacto!!');
                </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
            }else{
                if($telefono == 0) {
                    echo"<script>
                        alert('Ingrese un numnero de Telefono Fijo!!');
                    </script>";

                    echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                }else{
                    if($celular == 0){
                        echo"<script>
                                alert('Ingrese un numero de Celular!!');
                            </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                    }else{
                        if($this->objD_Gestionar_Contacto_Empresa->Insertar_Contacto_Empresa($id_empresa,$contacto,$telefono,$celular)) {
                            echo"<script>
                                alert('Inserción Realizada con Exito!!');
                            </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                        }else{
                            echo"<script>
                                alert('Error al Insertar el Contacto!!');
                            </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                        }    
                    }
                }
            }					
        }
    }


    function Tabla_Contacto_Empresa() {
        $consulta = $this->objD_Gestionar_Contacto_Empresa->Mostrar_Tabla_Contacto_Empresa();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Empresa</th>
                  <th>Contacto</th>
                  <th>Telefono</th>
                  <th>Celular</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Contacto_Empresa = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  <td align="middle">';echo $Tabla_Contacto_Empresa['empresa'];echo'</td>
                  <td align="middle">';echo $Tabla_Contacto_Empresa['contacto'];echo'</td>
                  <td align="middle">';echo $Tabla_Contacto_Empresa['telefono'];echo'</td>
                  <td align="middle">';echo $Tabla_Contacto_Empresa['celular'];echo'</td>

                  <td align="middle">
                      <span class="modi">
                          <a href="Contacto_Empresa.php?id_contacto_empresa=';
                              echo base64_encode($Tabla_Contacto_Empresa['id_contacto_empresa']);
                              echo '&id_empresa=';
                              echo base64_encode($Tabla_Contacto_Empresa['id_empresa']);
                              echo'&empresa=';
                              echo  base64_encode($Tabla_Contacto_Empresa['empresa']);
                              echo'&contacto=';
                              echo base64_encode($Tabla_Contacto_Empresa['contacto']);
                              echo'&telefono=';
                              echo base64_encode($Tabla_Contacto_Empresa['telefono']);
                              echo'&celular=';
                              echo base64_encode($Tabla_Contacto_Empresa['celular']);
                              
                              echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" />
                          </a>
                      </span>
                  </td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Contacto_Empresa.php?id_contacto_empresa=';
                              echo base64_encode($Tabla_Contacto_Empresa['id_contacto_empresa']);
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

    function Eliminar_Contacto_Empresa($id_contacto_empresa) {
        if($this->objD_Gestionar_Contacto_Empresa->Eliminar_Contacto_Empresa($id_contacto_empresa) == true){
            echo "<script>
                alert('Eliminacion Realizada con Exito!!');
            </script>";
        }
    }
    
    
    function Modificar_Contacto_Empresa($id_contacto_empresa=0,$id_empresa=0,$contacto="",$telefono=0,$celular=0) {
        if($id_empresa == 0) {
                echo"<script>
                    alert('Seleccione una Empresa!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";    
        }else{    
            if($contacto == "") {
                echo"<script>
                    alert('Ingrese el nombre del Contacto!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
            }else{
                if($telefono == 0) {
                    echo"<script>
                        alert('Ingrese un Numero de Telefono Fijo!!');
                    </script>";

                    echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                }else{
                    if($celular==0){
                        
                    }else{
                        if($this->objD_Gestionar_Contacto_Empresa->Modificar_Contacto_Empresa($id_contacto_empresa,$id_empresa, $contacto, $telefono, $celular)) {
                            echo"<script>
                                alert('Modificacíon Realizada con Exito!!');
                            </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                        }else{
                            echo"<script>
                                alert('Error al realizar la Modificacíon!!');
                            </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Contacto_Empresa.php>";
                        }  
                    }
                    
                }   
            }
        }
    }
    
  
}
?>