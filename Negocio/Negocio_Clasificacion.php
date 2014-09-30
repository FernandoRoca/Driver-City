<?php
class Negocio_Clasificacion{
    
var $objD_Gestionar_Clasificacion;
    function Negocio_Clasificacion(){
        require('../../Datos/D_Gestionar_Clasificacion.php');
        $this->objD_Gestionar_Clasificacion = new Datos_Gestionar_Clasificacion();
    }
    
    function Combo_Clasificacion($id_negocio=0){
        $consulta = $this->objD_Gestionar_Clasificacion->Mostrar_Tabla_Clasificacion_pendiente($id_negocio);
        echo "<option value=\"0\">Seleccione una Clasificacion</option>\n";
        if($consulta){
            while($Combo_Clasificacion = mysql_fetch_array($consulta)){
               
                    echo "<option value=\"".$Combo_Clasificacion['id_clasificacion']."\">".$Combo_Clasificacion['nombre']."</option>\n";
                
            }
        }
    }
    
    
    function Combo_NegocioClasificacion($id_principal=0,$id_negocio=0){
     require('../../Datos/D_Gestionar_Negocio.php');
        $this->objD_Gestionar_Negocio = new Datos_Gestionar_Negocio();
         $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio_Individual($id_principal);
        echo "<option value=\"Negocio_Clasificacion.php\">Seleccione un Restaurant</option>\n";
           if($consulta) {

        while( $Combo_Negocio = mysql_fetch_array($consulta) ){
            if($id_negocio==$Combo_Negocio['id_negocio']){
                echo "<option selected value=\"Negocio_Clasificacion.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
          else{
                
                   echo "<option  value=\"Negocio_Clasificacion.php?id_negocio=".base64_encode($Combo_Negocio['id_negocio'])."\">".$Combo_Negocio['nombre']."</option>\n";
          }
              }
              }
    }

    function Insertar_Clasificacion($nombre="",$imagen=""){
        if($nombre == "") {
            echo"<script>
                    alert('Escriba una Clasificacion!!');
                </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";    
        }else{
            if($this->objD_Gestionar_Clasificacion->Insertar_Clasificacion($nombre,$imagen)){
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
                  <th>Imagen</th>
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
                  <td align="middle"><img src="../../img/Imagen_Clasificacion/';echo $Tabla_Clasificacion['imagen'];echo'"></img>';echo'</td>

                  <td align="middle">
                      <span class="modi">
                          <a href="Clasificacion.php?id_clasificacion=';
                              echo base64_encode($Tabla_Clasificacion['id_clasificacion']);
                              echo'&nombre=';
                              echo  base64_encode($Tabla_Clasificacion['nombre']);
                              echo'&imagen=';
                              echo base64_encode($Tabla_Clasificacion['imagen']);
                              
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
        
    
    function Modificar_Clasificacion_sin_Imagen($id_clasificacion=0,$nombre="") {
        if($nombre == "") {
            echo"<script>
                alert('Ingrese una Clasificacion!!');
            </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
        }else{
            if($this->objD_Gestionar_Clasificacion->Modificar_Clasificacion_sin_Imagen($id_clasificacion, $nombre)) {
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
    function Modificar_Clasificacion_con_Imagen($id_clasificacion=0,$nombre="",$imagen="") {
        if($nombre == "") {
            echo"<script>
                alert('Ingrese una Clasificacion!!');
            </script>";
            echo "<meta http-equiv = refresh content = 1; URL = Clasificacion.php>";
        }else{
             $consulta=$this->objD_Gestionar_Clasificacion->Obtener_Logo_Clasificacion($id_clasificacion);
                                if($consulta) {
                                while( $Logo_Clasificacion = mysql_fetch_array($consulta) ){
                                            if($Logo_Clasificacion['imagen']!="")
                                            unlink("../../img/Imagen_Clasificacion/".$Logo_Clasificacion['imagen'] );
                                          }
                                          }
                                          
            if($this->objD_Gestionar_Clasificacion->Modificar_Clasificacion_con_Imagen($id_clasificacion, $nombre,$imagen)) {
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
    
    function Menu_Clasificacion($id_principal=0,$latitud=0,$longitud=0){
       
         $consulta=$this->objD_Gestionar_Clasificacion->Mostrar_Tabla_Clasificacion();
        echo '  <table border="0" cellspacing="5" cellpadding="5">
           
            <tbody>
              
                    ';
           if($consulta) {
               $cont=0;
        while( $Clasificacion = mysql_fetch_array($consulta) ){
            if($cont==0){
             echo '  <tr><td>';
                if($latitud==0 && $longitud==0)
                {
                echo'<a rel=\"external\" href="javascript:obtener_localizacion(';echo ($id_principal); echo');"> ';
                }
                else
                {
                echo'<a rel=\"external\" href="Listado_Negocios.php?id_principal=';echo $id_principal;echo'&latitud=';echo $latitud;echo'&longitud=';echo $longitud; echo'"> ';    
                }
                echo '<div style="height: 100%; position: relative; text-align: midle; width: 100%;" >
                <img style="border-radius: 15px;" border="0" width="100%" height="100%" src="../../img/Imagen_Clasificacion/';echo $Clasificacion['imagen'];echo'" />
                <span style="position: absolute; color: white; left: 30%; top: 50%;"><b><h3>';echo $Clasificacion['nombre'];echo'</h3></b></span></div>
                </a>    ';
           
            echo'</td>       ';
             $cont=1;
            }
            else{
             echo '<td>';
               if($latitud==0 && $longitud==0)
                {  
               echo '<a  rel=\"external\" href="javascript:obtener_localizacion(';echo ($id_principal); echo');"> ';
                }
                else
                {
               echo'<a rel=\"external\" href="Listado_Negocios.php?id_principal=';echo $id_principal;echo'&latitud=';echo $latitud;echo'&longitud=';echo $longitud; echo'"> ';         
                }
               echo' <div style="height: 100%; position: relative; text-align: midle; width: 100%;" >
                <img style="border-radius: 15px;" border="0" width="100%" height="100%" src="../../img/Imagen_Clasificacion/';echo $Clasificacion['imagen'];echo'" />
                <span style="position: absolute; color: white; left: 30%; top: 50%;"><h3>';echo $Clasificacion['nombre'];echo'</h3></span></div>
                </a>    ';
           echo' </td> </tr>    ';
            $cont=0;
            }
        }
           }
              echo '
               
            </tbody>
        </table>';
       
    }
}
?>