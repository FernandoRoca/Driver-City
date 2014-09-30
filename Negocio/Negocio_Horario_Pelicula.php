<?php


class Negocio_Horario_Pelicula{

var $objD_Gestionar_Horario_Pelicula;
	
    function Negocio_Horario_Pelicula(){
        require('../../Datos/D_Gestionar_Horario_Pelicula.php');
        $this->objD_Gestionar_Horario_Pelicula = new Datos_Gestionar_Horario_Pelicula();
    }

    function Listar_Peliculas($id_negocio=0){

        $consulta=$this->objD_Gestionar_Horario_Pelicula->Listar_Peliculas($id_negocio);
        echo "<option value=\"0\">Seleccione una Pelicula</option>\n";
        if($consulta){
            while($Listar_Pelicula = mysql_fetch_array($consulta)){                
                echo "<option value=\"".$Listar_Pelicula['id_pelicula']."\">".$Listar_Pelicula['nombre']."</option>\n";
            }
        }
    }	
	
	
    function Insertar_Horario_Pelicula($id_negocio=0,$id_pelicula=0,$horario="",$fecha_inicio="",$fecha_fin=""){
         if($id_pelicula==0) {
            echo"<script>
                    alert('Elija un Cine!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
        }else{
        if($id_pelicula==0) {
            echo"<script>
                    alert('Elija una Pelicula!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
        }else{
           if($horario == "") {
                echo"<script>
                        alert('Elija un Horario!!');
                    </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
            }else{
                if($fecha_inicio == "") {
                        echo"<script>
                                alert('Seleccione una Fecha de Inicio de la Pelicula!!');
                            </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                }else{
                    if($fecha_fin == "") {
                        echo"<script>
                                alert('Fecha de Finalización en Cartelera de la Pelicula!!');
                            </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                    }else{
                        if($this->objD_Gestionar_Horario_Pelicula->Insertar_Horario_Pelicula($id_negocio,$id_pelicula,$horario,$fecha_inicio,$fecha_fin)){
                            echo"<script>
                                    alert('Inserción Realizada con Exito!!');
                                </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                        }
                    }
                }
            } 
        }
        }
        
    }
	
    function Tabla_Horario_Pelicula() {
        $consulta = $this->objD_Gestionar_Horario_Pelicula->Mostrar_Tabla_Horario_Pelicula();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Cine</th>
                  <th>Pelicula</th>
                  <th>Imagen</th>
                  <th>Horario</th>
                  <th>Inicio en Cartelera</th>
                  <th>Fin en Cartelera</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Horario_Pelicula = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  <td align="middle">';echo $Tabla_Horario_Pelicula['cine'];echo'</td>
                  <td align="middle">';echo $Tabla_Horario_Pelicula['nombre'];echo'</td>
                  <td align="middle">
                      <img src="../../img/Imagen_Pelicula/';echo $Tabla_Horario_Pelicula['imagen'];echo'"></img>
                  </td>
                  
                  <td align="middle">';echo $Tabla_Horario_Pelicula['horario'];echo'</td>
                  <td align="middle">';echo $Tabla_Horario_Pelicula['fecha_inicio'];echo'</td>
                  <td align="middle">';echo $Tabla_Horario_Pelicula['fecha_fin'];echo'</td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Horario_Pelicula.php?id_negocio_pelicula=';
                              echo base64_encode($Tabla_Horario_Pelicula['id_negocio_pelicula']);
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
    
    
    function Modificar_horario_Pelicula($id_horario_pelicula=0,$id_pelicula=0,$horario="",$fecha_inicio="",$fecha_fin=""){
        if($id_pelicula==0) {
            echo"<script>
                    alert('Elija una Pelicula!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
        }else{
           if($horario == "") {
                echo"<script>
                        alert('Elija un Horario!!');
                    </script>";
                echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
            }else{
                if($fecha_inicio == "") {
                        echo"<script>
                                alert('Seleccione una Fecha de Inicio de la Pelicula!!');
                            </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                }else{
                    if($fecha_fin == "") {
                        echo"<script>
                                alert('Fecha de Finalización en Cartelera de la Pelicula!!');
                            </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                    }else{
                        if($this->objD_Gestionar_Horario_Pelicula->Modificar_Horario_Pelicula($id_horario_pelicula,$id_pelicula,$horario,$fecha_inicio,$fecha_fin)){
                            echo"<script>
                                    alert('Modificación Realizada con Exito!!');
                                </script>";
                            echo "<meta http-equiv = refresh content = 1; URL = Horario_Pelicula.php>";
                        }
                    }
                }
            } 
        }
    }
    
    function Eliminar_Horario_Pelicula($id_negocio_pelicula=0){
        if($this->objD_Gestionar_Horario_Pelicula->Eliminar_Horario_Pelicula($id_negocio_pelicula) == true){
            echo "<script>
                alert('Eliminacion Realizada con Exito!!');
            </script>";
        }
    }
    
    function Combo_Negocio_HorarioCine($id_principal=0,$id_negocio=0){
         require('../../Datos/D_Gestionar_Negocio.php');
        $this->objD_Gestionar_Negocio = new Datos_Gestionar_Negocio();
         $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio_Individual($id_principal);
        echo "<option value=\"Horario_Pelicula.php\">Seleccione un Cine</option>\n";
           if($consulta) {

        while( $Combo_Negocio = mysql_fetch_array($consulta) ){
            if($id_negocio==$Combo_Negocio['id_negocio']){
                echo "<option selected value=\"Horario_Pelicula.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
          else{
                
                   echo "<option  value=\"Horario_Pelicula.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
              }
              }
    }
}
?>

