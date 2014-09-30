<?php
class Negocio_Promocion{
var $objD_Gestionar_Promocion;


        function Negocio_Promocion(){

		require('../../Datos/D_Gestionar_Promocion.php');
		$this->objD_Gestionar_Promocion=new Datos_Gestionar_Promocion();
	}



   function Eliminar_Imagen_Promocion($id_imagen_promocion=0){

      $consulta=$this->objD_Gestionar_Promocion->Obtener_Imagen_Promocion($id_imagen_promocion);
      if($consulta) {
      while( $Imagen = mysql_fetch_array($consulta) ){
        unlink("../../img/Imagen_Promocion/".$Imagen['imagen'] );
      }
      }
      if($this->objD_Gestionar_Promocion->Eliminar_Imagen_Promocion($id_imagen_promocion) == true){
        echo "<script>alert('Eliminacion Realizada con Exito!!');</script>";
                                echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
      }


  }
  

function Insertar_Promocion($id_negocio=0,$id_dia=0,$imagen="",$fecha_inicio="",$fecha_final=""){
  
        if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
        }
        else{
            if($id_dia==0){
              echo  "<script>alert('Seleccione Dia!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
               if($imagen==""){
              echo  "<script>alert('Inserte Imagen de la Promocion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
                if($id_dia<8){
                    if ( $this->objD_Gestionar_Promocion->Insertar_Promocion($id_negocio,$id_dia,$imagen,$fecha_inicio,$fecha_final) == true){

                    echo "<script>alert('Insercion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
                    }
                }
                else{
                      $i=0;
                   for($i=1;$i<=($id_dia-3);$i++){
                       $this->objD_Gestionar_Promocion->Insertar_Promocion($id_negocio,$id_dia,$imagen,$fecha_inicio,$fecha_final);
                   }
                   echo "<script>alert('Insercion Realizada con Exito!!');
                    
                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Promocion.php>"; 
                
                
                
                    }
            
          }
          }

            }
                }


  }


}
function Tabla_Promocion_Negocios($id_principal=0){
    for($dia=1;$dia<8;$dia++){
       
   $consulta=$this->objD_Gestionar_Promocion->Mostrar_Tabla_Promocion_Negocios($id_principal,$dia);
        if($consulta) {
            
             
             $cont=1;
          while( $Tabla_Promocion = mysql_fetch_array($consulta) ){
            if($cont==1){
                 switch ($dia){
            case 1: echo "<h3>Lunes</h3><br/>";break;
            case 2: echo "<h3>Martes</h3><br/>";break;
            case 3: echo "<h3>Miercoles</h3><br/>";  break;  
            case 4: echo "<h3>Jueves</h3><br/>";break;
            case 5: echo "<h3>Viernes</h3><br/>";break;
            case 6: echo "<h3>Sabado</h3><br/>";   break; 
            case 7: echo "<h3>Domingo</h3><br/>";break;
        }
            echo'  <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">';    
            echo"<div class=\"item active\">";
            }
            else{
            echo"<div class=\"item \">"; 
            }
            echo "<a href=\"Visual_General.php?id_negocio=".base64_encode($Tabla_Promocion['id_negocio'])."\" ><img width=1200 px; src=\"../../img/Imagen_Promocion/".$Tabla_Promocion['imagen']."\"></a>"; 
            echo"</div>"; 
            $cont++;
          }
          if($cont>1){
           echo'     </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="../../img/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="../../img/arrow2.png" alt="Arrow"></a>
          </div><hr>';}
        }             
      
    }
   
   
}
function Tabla_Promocion(){
   $consulta=$this->objD_Gestionar_Promocion->Mostrar_Tabla_Promocion();

  echo '<table id="example" class="display" cellspacing="0" width="100%" border="1" style="background: #ffffff;">
  <thead>
      <tr>
      <th>N&#176;</th>
      <th>Negocio</th>
      <th>Dia</th>
      <th>Imagen</th>      
      <th>Fecha Inicio</th>
      <th>Fecha Final</th>
      <th>Editar</th>
      <th>Eliminar</th>

        </tr>
      </thead>
      <tbody>';

 $Contador=1;
if($consulta) {
  while( $Tabla_Promocion = mysql_fetch_array($consulta) ){

   echo' <tr>
                          <td align="middle">';echo $Contador;echo'</td>
                          <td align="middle">';echo $Tabla_Promocion['negocio'];echo'</td>
                          <td align="middle">';echo $Tabla_Promocion['dia'];echo'</td>                            
                          <td align="middle"><img src="../../img/Imagen_Promocion/';echo $Tabla_Promocion['imagen'];echo'"/></td>                          
                          <td align="middle">';echo $Tabla_Promocion['fecha_inicio'];echo'</td>
                          <td align="middle">';echo $Tabla_Promocion['fecha_fin'];echo'</td>    
                          <td align="middle"><span class="modi"><a href="Promocion.php?id_promocion=';echo base64_encode($Tabla_Promocion['id_promocion']);echo'&id_negocio=';echo  base64_encode($Tabla_Promocion['id_negocio']);echo'&id_dia=';echo base64_encode($Tabla_Promocion['id_dia']);echo'&imagen=';echo base64_encode($Tabla_Promocion['imagen']);echo'&fecha_inicio=';echo base64_encode($Tabla_Promocion['fecha_inicio']);echo'&fecha_fin=';echo base64_encode($Tabla_Promocion['fecha_fin']);echo'"><img src="../../img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
                          <td align="middle"><span class="dele"><a href="Promocion.php?id_promocion=';echo base64_encode($Tabla_Promocion['id_promocion']);echo'&id_negocio=';echo  base64_encode($Tabla_Promocion['id_negocio']);echo'&id_dia="><img src="../../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>


      </tr> ';

        $Contador++;
    }
}


echo '</tbody>
    </table>  ';



  }
function Modificar_Imagen_Promocion($id_promocion=0,$id_negocio=0,$id_dia=0,$imagen="",$fecha_inicio="",$fecha_final=""){


                    if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
        }
        else{
            if($id_dia==0){
              echo  "<script>alert('Seleccione Dia!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
               if($imagen==""){
              echo  "<script>alert('Inserte Imagen de la Promocion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
                $consulta=$this->objD_Gestionar_Promocion->Obtener_Imagen_Promocion($id_promocion);
                                if($consulta) {
                                while( $Imagen_Promocion = mysql_fetch_array($consulta) ){
                                            if($Imagen_Promocion['imagen']!="")
                                            unlink("../../img/Imagen_Promocion/".$Imagen_Promocion['imagen'] );
                                          }
                                          }
                                          
                                    if ($this->objD_Gestionar_Promocion->Modificar_Imagen_Promocion($id_promocion,$id_negocio,$id_dia,$imagen,$fecha_inicio,$fecha_final) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
                      }
            
          }
          }

            }
                }


  }


}

function Modificar_Sin_Imagen_Promocion($id_promocion=0,$id_negocio=0,$id_dia=0,$fecha_inicio="",$fecha_final=""){



              
                    if($id_negocio==0){
                echo "<script>alert('Seleccione un Negocio!!');

                </script>";
                echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
        }
        else{
            if($id_dia==0){
              echo  "<script>alert('Seleccione Dia!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
               
               if($fecha_final==""){
              echo  "<script>alert('Inserte Fecha Final de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{
              if($fecha_inicio==""){
              echo  "<script>alert('Inserte Fecha Inicial de Suscripcion!!');

                </script>";
              echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
            }
            else{      

                                    if ($this->objD_Gestionar_Promocion->Modificar_sin_Imagen_Promocion($id_promocion,$id_negocio,$id_dia,$fecha_inicio,$fecha_final) == true){

                                echo "<script>alert('Modificacion Realizada con Exito!!');

                    </script>";
                    echo "<meta http-equiv=refresh content=1;URL=Promocion.php>";
                     }
            
          }
          }

            }
                }


  }

}
?>

