<?php


class Negocio_Pelicula{

var $objD_Gestionar_Pelicula;
	
    function Negocio_Pelicula(){
        require('../../Datos/D_Gestionar_Pelicula.php');
            $this->objD_Gestionar_Pelicula = new Datos_Gestionar_Pelicula();
    }


    function Insertar_Pelicula($nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer=""){

       
            if($nombre == "") {
                echo"<script>
                    alert('Ingrese el Nombre de la Pelicula!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
            }else{
                if($director == "") {
                    echo"<script>
                        alert('Ingrese el Nombre del Director de la Pelicula!!');
                    </script>";				

                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                }else{
                    if($genero == "") {
                        echo"<script>
                            alert('Ingrese el Nombre de la Pelicula!!');
                        </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                    }else{
                        if($imagen == ""){
                            echo"<script
                                alert('Seleccione una Imagen!!');
                            </script>";

                            echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                        }else{
                            if($sinopsis == "") {
                                echo"<script>
                                    alert('Ingrese la Sinopsis de la Pelicula!!');
                                </script>";
                                echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                            }else{
                                if($trailer == "") {
                                    echo"<script>
                                        alert('Ingrese una ubicación web del Trailer!!');
                                    </script>";

                                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                }else{
                                    if($this->objD_Gestionar_Pelicula->Insertar_Pelicula($nombre,$director,$genero,$imagen,$sinopsis,$trailer)) {
                                        echo"<script>
                                            alert('Inserción Realizada con Exito!!');
                                        </script>";
                                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                    }
                                }
                            }					
                        }
                    }
                
            }
        }
    }


    function Tabla_Pelicula() {
        $consulta = $this->objD_Gestionar_Pelicula->Mostrar_Tabla_Pelicula();
        echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
          <thead>
              <tr>
                  <th>Nº</th>
                  <th>Pelicula</th>
                  <th>Director</th>
                  <th>Genero</th>
                  <th>Imagen</th>
                  <th>Sinopsis</th>
                  <th>Trailer</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>';

        $contador = 1;
        if($consulta) {
          while($Tabla_Pelicula = mysql_fetch_array($consulta)) {
              echo' <tr>
                  <td align="middle">';echo $contador;echo'</td>
                  
                  <td align="middle">';echo $Tabla_Pelicula['nombre'];echo'</td>
                  <td align="middle">';echo $Tabla_Pelicula['director'];echo'</td>
                  <td align="middle">';echo $Tabla_Pelicula['genero'];echo'</td>
                  <td align="middle">
                      <img src="../../img/Imagen_Pelicula/';echo $Tabla_Pelicula['imagen'];echo'"></img>
                  </td>
                  
                  <td align="middle">';
                    if(strlen($Tabla_Pelicula['sinopsis']) >= 70){
                        echo substr($Tabla_Pelicula['sinopsis'],0,70).('...');
                    }else{
                        echo $Tabla_Pelicula['sinopsis'];
                    }
                    echo'
                  </td>
                  <td align="middle">
                     <a href="';echo $Tabla_Pelicula['trailer'];echo '" target="_blanck">';echo $Tabla_Pelicula['trailer'];echo '</a>
                  </td>

                  <td align="middle">
                      <span class="modi">
                          <a href="Pelicula.php?id_pelicula=';
                              echo base64_encode($Tabla_Pelicula['id_pelicula']);
                              echo'&nombre=';
                              echo base64_encode($Tabla_Pelicula['nombre']);
                              echo'&director=';
                              echo base64_encode($Tabla_Pelicula['director']);
                              echo'&genero=';
                              echo base64_encode($Tabla_Pelicula['genero']);
                              echo'&imagen=';
                              echo base64_encode($Tabla_Pelicula['imagen']);
                              echo'&sinopsis=';
                              echo base64_encode($Tabla_Pelicula['sinopsis']);
                              echo'&trailer=';
                              echo base64_encode($Tabla_Pelicula['trailer']);
                              
                              echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" />
                          </a>
                      </span>
                  </td>

                  <td align="middle">
                      <span class="dele">
                          <a href="Pelicula.php?id_pelicula=';
                              echo base64_encode($Tabla_Pelicula['id_pelicula']);
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

    function Eliminar_Pelicula($id_pelicula) {
        if($this->objD_Gestionar_Pelicula->Eliminar_Pelicula($id_pelicula) == true){
            echo "<script>
                alert('Eliminacion Realizada con Exito!!');
            </script>";
            //echo "<meta http-equiv=refresh content=1;URL = Pelicula.php>";
        }
    }
    
    

    


    
    
    function Modificar_Logo_Pelicula($id_pelicula=0,$nombre="",$director="",$genero="",$imagen="",$sinopsis="",$trailer="") {
        
            if($nombre == "") {
                echo"<script>
                    alert('Ingrese el Nombre de la Pelicula!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
            }else{
                if($director == "") {
                    echo"<script>
                        alert('Ingrese el Nombre del Director de la Pelicula!!');
                    </script>";				

                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                }else{
                    if($genero == "") {
                        echo"<script>
                            alert('Ingrese el Nombre de la Pelicula!!');
                        </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                    }else{
                            if($sinopsis == "") {
                                echo"<script>
                                    alert('Ingrese la Sinopsis de la Pelicula!!');
                                </script>";
                                echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                            }else{
                                if($trailer == "") {
                                    echo"<script>
                                        alert('Ingrese una ubicación web del Trailer!!');
                                    </script>";

                                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                }else{
                                  $consulta=$this->objD_Gestionar_Negocio->Obtener_Logo_pelicula($id_pelicula);
                                if($consulta) {
                                while( $Logo_Pelicula = mysql_fetch_array($consulta) ){
                                            if($Logo_Pelicula['imagen']!="")
                                            unlink("../../img/Imagen_Pelicula/".$Logo_Pelicula['imagen'] );
                                          }
                                          }
                                    if($this->objD_Gestionar_Pelicula->Modificar_Logo_Pelicula($id_pelicula, $nombre, $director, $genero, $imagen, $sinopsis, $trailer)) {
                                        echo"<script>
                                            alert('Modificacíon Realizada con Exito!!');
                                        </script>";
                                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                    }
                                }
                            }					
                        
                    }
                
            }
        }
    }
    
        function Modificar_sin_Logo_Pelicula($id_pelicula=0,$nombre="",$director="",$genero="",$sinopsis="",$trailer="") {
        
            if($nombre == "") {
                echo"<script>
                    alert('Ingrese el Nombre de la Pelicula!!');
                </script>";

            echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
            }else{
                if($director == "") {
                    echo"<script>
                        alert('Ingrese el Nombre del Director de la Pelicula!!');
                    </script>";				

                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                }else{
                    if($genero == "") {
                        echo"<script>
                            alert('Ingrese el Nombre de la Pelicula!!');
                        </script>";

                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                    }else{
                            if($sinopsis == "") {
                                echo"<script>
                                    alert('Ingrese la Sinopsis de la Pelicula!!');
                                </script>";
                                echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                            }else{
                                if($trailer == "") {
                                    echo"<script>
                                        alert('Ingrese una ubicación web del Trailer!!');
                                    </script>";

                                    echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                }else{
                                     
                                    if($this->objD_Gestionar_Pelicula->Modificar_sin_Logo_Pelicula($id_pelicula, $nombre, $director, $genero, $sinopsis, $trailer)) {
                                        echo"<script>
                                            alert('Modificacíon Realizada con Exito!!');
                                        </script>";
                                        echo "<meta http-equiv = refresh content = 1; URL = Pelicula.php>";
                                    }
                                }
                            }					
                        
                    }
                
            }
        }
    }
    
  
}
?>