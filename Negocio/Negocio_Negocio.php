<?php
class Negocio_Negocio{
var $objD_Gestionar_Negocio;


        function Negocio_Negocio(){

		require('../../Datos/D_Gestionar_Negocio.php');
		$this->objD_Gestionar_Negocio=new Datos_Gestionar_Negocio();
	}



   function Combo_Negocio($id_negocio=0){

   $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio();
  echo "<option value=\"0\">Seleccione Negocio</option>\n";
     if($consulta) {

  while( $Combo_Negocio = mysql_fetch_array($consulta) ){

          if($id_negocio==$Combo_Negocio['id_negocio']){
                echo "<option selected value=\"".$Combo_Negocio['id_negocio']."\">".$Combo_Negocio['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"".$Combo_Negocio['id_negocio']."\">".$Combo_Negocio['nombre']."</option>\n";
          }
        }
        }
  } 
  

  function Eliminar_logo_Negocio($id_logo_negocio=0){

      $consulta=$this->objD_Gestionar_Negocio->Obtener_Logo_Negocio($id_logo_negocio);
      if($consulta) {
      while( $Ubicacion = mysql_fetch_array($consulta) ){
        unlink("../../img/Logo_Negocio/".$Ubicacion['logo'] );
      }
      }
      if($this->objD_Gestionar_Negocio->Eliminar_Logo_Negocio($id_logo_negocio) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
      }


  }
  

function Insertar_Negocio($id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$logo="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){
  
        if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
               if($direccion==""){
              echo  "<script>alert('Inserte Direccion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
                 if($logo==""){
              echo  "<script>alert('Inserte un Logo!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{

                    if ( $this->objD_Gestionar_Negocio->Insertar_Negocio($id_principal,$nombre,$direccion,$descripcion,$web,$logo,$x,$y,$fecha_inicio,$fecha_final) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

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
function Obtener_Datos_Negocio($id_negocio=0){
    
   $consulta=$this->objD_Gestionar_Negocio->Mostrar_Datos_Negocio($id_negocio);   
   if($consulta) {
  while( $Tabla_Negocio = mysql_fetch_array($consulta) ){
     echo" <h3> Nombre:  "; echo $Tabla_Negocio['nombre']; echo "</h3></br>  ";
     echo" <h3> Direccion:  "; echo $Tabla_Negocio['direccion']; echo "</h3> </br> ";
     echo" <h3> Descripcion: "; echo $Tabla_Negocio['descripcion']; echo "</h3></br>  ";
  }
   }
}

function Tabla_Negocio(){
   $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Principal</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Descripcion</th>
      <th>WEB</th>
      <th>Logo</th>
      <th>Posicion X</th>
      <th>Posicion Y</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Editar</th>
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['principal'];echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['nombre'];echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['direccion'];echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['descripcion'];echo'</td>    
                          <td align="middle">';echo $Tabla_Negocio['web'];echo'</td>    
                          <td align="middle"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"></img></td>	  
						 
                          <td align="middle">';echo $Tabla_Negocio['posicion_x'];echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['posicion_y'];echo'</td>    
                          <td align="middle">';echo $Tabla_Negocio['fecha_inicio'];echo'</td>
                          <td align="middle">';echo $Tabla_Negocio['fecha_final'];echo'</td>    
                          <td align="middle"><span class="modi"><a href="Negocio.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'&id_principal=';echo  base64_encode($Tabla_Negocio['id_principal']);echo'&nombre=';echo base64_encode($Tabla_Negocio['nombre']);echo'&direccion=';echo base64_encode($Tabla_Negocio['direccion']);echo'&descripcion=';echo base64_encode($Tabla_Negocio['descripcion']);echo'&web=';echo base64_encode($Tabla_Negocio['web']);echo'&logo=';echo base64_encode($Tabla_Negocio['logo']);echo'&latitud=';echo base64_encode($Tabla_Negocio['posicion_x']);echo'&longitud=';echo base64_encode($Tabla_Negocio['posicion_y']);echo'&fecha_inicio=';echo base64_encode($Tabla_Negocio['fecha_inicio']);echo'&fecha_final=';echo base64_encode($Tabla_Negocio['fecha_final']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Negocio.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'&id_principal=';echo  base64_encode($Tabla_Negocio['id_principal']);echo'&nombre="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
  function Obtener_Logo($id_negocio=0){
      $consulta=$this->objD_Gestionar_Negocio->Obtener_Logo_Negocio($id_negocio);
      if($consulta) {
        while( $Logo_Negocio = mysql_fetch_array($consulta) ){
                    if($Logo_Negocio['logo']!="")
                      
                    echo "<img width=1200 px;  src=\"../../img/Imagen_Negocio/".$Logo_Negocio['logo']."\">";
                   
               }
              }
  }
function Modificar_Logo_Negocio($id_negocio=0,$id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$logo="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){


                   if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
               if($direccion==""){
              echo  "<script>alert('Inserte Direccion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{  
                 if($logo==""){
              echo  "<script>alert('Inserte un Logo!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
                $consulta=$this->objD_Gestionar_Negocio->Obtener_Logo_Negocio($id_negocio);
                                if($consulta) {
                                while( $Logo_Negocio = mysql_fetch_array($consulta) ){
                                            if($Logo_Negocio['logo']!="")
                                            unlink("../../img/Logo_Negocio/".$Logo_Negocio['logo'] );
                                          }
                                          }
                                          
                                    if ($this->objD_Gestionar_Negocio->Modificar_Logo_Negocio($id_negocio,$id_principal,$nombre,$direccion,$descripcion,$web,$logo,$x,$y,$fecha_inicio,$fecha_final) == true){

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

function Modificar_Sin_Logo_Negocio($id_negocio=0,$id_principal=0,$nombre="",$direccion="",$descripcion="",$web="",$x=0.0,$y=0.0,$fecha_inicio="",$fecha_final=""){



                
                   if($id_principal==0){
                echo "<script>alert('Seleccione un Tipo Principal!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
        }
        else{
            if($nombre==""){
              echo  "<script>alert('Inserte Nombre del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
               if($direccion==""){
              echo  "<script>alert('Inserte Direccion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
                 if($descripcion==""){
              echo  "<script>alert('Inserte Descripcion del Negocio!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{

               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Negocio.php>";
            }
            else{              

                                    if ($this->objD_Gestionar_Negocio->Modificar_sin_Logo_Negocio($id_negocio,$id_principal,$nombre,$direccion,$descripcion,$web,$x,$y,$fecha_inicio,$fecha_final) == true){

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
function Tabla_Negocio_Principal($id_Principal=0){
   $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio_Principal($id_Principal);

    echo '<table id="example"  cellspacing="0" width="100%" border="0" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Logo</th>
      <th>Nombre</th>
      <th>Descripcion</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>';
                        if($Tabla_Negocio['sucursal']>0){
                          if($Tabla_Negocio['abierto']>0){
                        echo'<td align="middle"  bgcolor= "#31B404"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#31B404"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo'</a></td>
                          <td align="middle"  bgcolor= "#31B404"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td> ';
                          
                          }
                          else{
                            echo'  <td align="middle"  bgcolor= "#FE2E2E"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo'</a></td>
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Listado_Negocios.php?id_principal=';echo base64_encode($id_Principal);echo'&id_central=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td>'; 
                          
                          }
                        }
                        else{
                             if($Tabla_Negocio['abierto']>0){
                        echo'<td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo'</a></td>
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td> ';
                          
                          }
                          else{
                            echo'  <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo'</a></td>
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td>'; 
                          
                          }
                        }
                                                
                          


     echo' </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
  
  function Tabla_Negocio_Principal_Sucursales($id_Principal=0,$id_central=0){
  

    echo '<table id="example"  cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>Logo</th>
      <th>Nombre</th>
      <th>Descripcion</th>

        </tr>
      </thead>
      <tbody>';
 $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio_Central($id_Principal,$id_central);
 $Contador=1;
 if($consulta) {
  while( $Tabla_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>';
    if($Tabla_Negocio['abierto']>0){
                        echo'<td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></td> 
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo' (Central)</a></td>
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td> ';
                          
                          }
                          else{
                            echo'  <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo' (Central)</a></td>
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td>'; 
                          
                          }
    echo' </tr> ';

        $Contador++;
  }
 }
  $consulta=$this->objD_Gestionar_Negocio->Mostrar_Tabla_Negocio_Sucursales_Principal($id_Principal,$id_central);
if($consulta) {
  while( $Tabla_Negocio = mysql_fetch_array($consulta) ){

   echo' <tr>';
                        
                          if($Tabla_Negocio['abierto']>0){
                        echo'<td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo' (Sucursal)</a></td>
                          <td align="middle"  bgcolor= "#31B404"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td> ';
                          
                          }
                          else{
                            echo'  <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'"><img src="../../img/Logo_Negocio/';echo $Tabla_Negocio['logo'];echo'"/></a></td> 
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['nombre'];echo' (Sucursal)</a></td>
                          <td align="middle"  bgcolor= "#FE2E2E"><a href="Visual_General.php?id_negocio=';echo base64_encode($Tabla_Negocio['id_negocio']);echo'">';echo $Tabla_Negocio['descripcion'];echo'</a></td>'; 
                          
                          }
                                                
                          


     echo' </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
}
?>

