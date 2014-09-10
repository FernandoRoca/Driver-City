<?php
class Negocio_Principal{
var $objD_Gestionar_Principal;


        function Negocio_Principal(){

		require('../../Datos/D_Gestionar_Principal.php');
		$this->objD_Gestionar_Principal=new Datos_Gestionar_Principal();
	}



   function Combo_Principal($id_principal=0){

   $consulta=$this->objD_Gestionar_Principal->Mostrar_Tabla_Principal();
  echo "<option value=\"0\">Seleccione Opcion</option>\n";
     if($consulta) {

  while( $Combo_Principal = mysql_fetch_array($consulta) ){

          if($id_principal==$Combo_Principal['id_principal']){
                echo "<option selected value=\"".$Combo_Principal['id_principal']."\">".$Combo_Principal['nombre']."</option>\n";
          }
          else{
             echo "<option  value=\"".$Combo_Principal['id_principal']."\">".$Combo_Principal['nombre']."</option>\n";
          }
        }
        }
  }

function Mostrar_Imagenes_Principal(){
     
  echo '  <table border="0" cellspacing="5" cellpadding="5">
           
            <tbody>
                <tr>
                    ';
                $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(4);
                                  if($consulta) {

                                 while( $Combo_Principal = mysql_fetch_array($consulta) ){


                                 echo " <td ><a rel=\"external\" href=\"Clasificacion.php?id_principal=".  base64_encode(4)."&tipo=".base64_encode("Bares")."\"><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></a></td>";

                                 }
                                 }
                  $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(2);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo " <td><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></td>";

                    }
                    }                
  
  
                   
                    
         
              echo'   </tr>
                <tr>';
               $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(5);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo " <td  ><a rel=\"external\" href=\"Listado_Negocios.php?id_principal=".  base64_encode(5)."&tipo=".base64_encode("Karaokes")."\"><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></a></td>";

                    }
                    } 
                     $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(1);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo "<td><a rel=\"external\" href=\"Listado_Negocios.php?id_principal=".  base64_encode(1)."&tipo=".base64_encode("Boliches")."\"><img width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\" class=\"img-rounded\"\></a></td>";

                    }
                    }
               

                   
               echo' </tr>
                   
                <tr>';
                  
                     $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(3);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo " <td ><a rel=\"external\" href=\"Listado_Negocios.php?id_principal=".  base64_encode(3)."&tipo=".base64_encode("Bares")."\"><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></a></td>";

                    }
                    }
                     $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(6);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo " <td ><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></td>";

                    }
                    } 
                echo '</tr>
                <tr>';
                   $consulta=$this->objD_Gestionar_Principal->Mostrar_Imagen_Principal(7);
                     if($consulta) {

                    while( $Combo_Principal = mysql_fetch_array($consulta) ){


                    echo " <td colspan=\"2\"><img  width=\"100%\" height=\"100%\" src=\"../../img/Imagen_Principal/".$Combo_Principal['imagen']."\"/></td>";

                    }
                    }  
                echo '</tr>
               
            </tbody>
        </table>';
}




}
?>