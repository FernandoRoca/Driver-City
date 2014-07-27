
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include_once('Helper.php');
?>
   
  </head>

  <body>
<?php
include_once('Menu.php');
?>

  <div class="container">

 
   <div align="center"> </br></div>
   
  <hr>
    
       


        <a name="mundial"> <div class="content_adm" align="center"></a>
                           
                                
           <h1>Gestionar Estado del Negocio</h1>
                                     <?php                          
                        $id_estado_negocio=  base64_decode(@$_GET['id_estado_negocio']);
                        $id_negocio=  base64_decode(@$_GET['id_negocio']);
                        $id_negocio_enlace=  base64_decode(@$_GET['id_negocio_enlace']);
                        $estado_negocio=  base64_decode(@$_GET['estado']);
                         ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         
       <p> Evento:</p>
        <select id="Negocio" name="Negocio" onchange="location.href = this.value" >
           <?php
           require('../../Negocio/Negocio_Estado_Negocio.php');
            $objN_Negocio_Estado_Negocio=new Negocio_Estado_Negocio();
            
             $objN_Negocio_Estado_Negocio->Combo_Negocio_Sin_Esatdo($id_negocio);
           ?>
        </select>
        <p> Estado:</p>
        <select id="Estado" name="Estado" onchange="location.href = this.value">
           <?php
             $objN_Negocio_Estado_Negocio->Combo_Estado($estado_negocio,$id_negocio);
           ?>
        </select>
        <?php
        if($estado_negocio=="Sucursal"){
           ?>
          <p> Central:</p>
        <select id="Central" name="Central" >
           <?php
             $objN_Negocio_Estado_Negocio->Combo_Negocio_Enlace($id_negocio_enlace);
           ?>
        </select>
        <?php
        }
        ?>
               
       <br><br>
   
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Estado Negocio" />
    
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Estado_Negocio.php';</script>";
 }

   if($id_estado_negocio>0 && $id_negocio==0){
    
     $objN_Negocio_Estado_Negocio->Eliminar_Estado_Negocio($id_estado_negocio);
 }
 
if (@$_REQUEST['enviar'] == "Subir Estado Negocio"){
   if($estado_negocio=="Sucursal"){     
      
 $objN_Negocio_Estado_Negocio->Insertar_Estado_Negocio($id_negocio,$_POST["Central"],$estado_negocio);
   }
   else{
    $objN_Negocio_Estado_Negocio->Insertar_Estado_Negocio($id_negocio,0,$estado_negocio);   
   }
   }
?>
</br></br>

<?php
$objN_Negocio_Estado_Negocio->Mostrar_Tabla_Estado_Negocio();
?>


    

            
      </div>
      
         
<?php
include_once('Footer.php');
?>
      

   
    </div><!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
  </body>
</html>
