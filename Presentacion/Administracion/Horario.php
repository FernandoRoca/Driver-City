
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
                           
                                
           <h1>Gestionar Horario</h1>
                                     <?php
      
      
                          
                        $id_horario=  base64_decode(@$_GET['id_horario']);
                        $id_negocio=  base64_decode(@$_GET['id_negocio']);
                        $id_dia=  base64_decode(@$_GET['id_dia']);
                        $Hora_inicio=base64_decode(@$_GET['hora_inicio']);
                        $Hora_fin=base64_decode(@$_GET['hora_fin']);
                        
                        if($Hora_inicio=="")
                            $Hora_inicio="09:00";
                        if($Hora_fin=="")
                            $Hora_fin="13:00";
                        
                        ?>
    <form  method="post" enctype="multipart/form-data" style="text-align: center">
         <p> Negocio:</p>
        <select id="Negocio" name="Negocio">
           <?php
           require('../../Negocio/Negocio_Negocio.php');
            $objN_Negocio=new Negocio_Negocio();
            
             $objN_Negocio->Combo_Negocio($id_negocio);
           ?>
        </select>
         <p> Dia:</p>
        <select id="Dia" name="Dia">
           <?php
           require('../../Negocio/Negocio_Dia.php');
            $objN_Dia=new Negocio_Dia();
            if($id_horario==0)
             $objN_Dia->Combo_Dia($id_dia);
            else
              $objN_Dia->Combo_Modificacion_Dia($id_dia);   
           ?>
        </select>
      
        <p> Hora Apertura (Formato 24 Horas):</p>      
        
        <input type="text" value="<?php echo $Hora_inicio ?>" name="HE"/>
                <p> Hora Cierre (Formato 24 Horas):</p>      
        
        <input type="text" value="<?php echo $Hora_fin ?>" name="HS"/>
       
        
        
        
       <br><br>
      <?php
    if($id_horario>0 && $id_negocio>0 && $id_dia>0){
      ?>
      <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
      <?php
      }
      else{
      ?>
      <input name="enviar" type="submit" class="boton" id="enviar" value="Subir Horario" />
      <?php
      }
      
      ?>
       <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
    
</form>
        </div>
<?php
if (@$_REQUEST['Cancelar'] == "Cancelar"){
 echo "<script> location.href='Horario.php';</script>";
 }
require('../../Negocio/Negocio_Horario.php');
$objN_Horario=new Negocio_Horario();
   if($id_horario>0 && $id_negocio==0 && $id_dia==0){
    
     $objN_Horario->Eliminar_Horario($id_horario);
 }
 if (@$_REQUEST['Modificar'] == "Modificar"){
     
   
 
 $objN_Horario->Modificar_Horario($id_horario,$_POST["Negocio"],$_POST["Dia"],$_POST["HE"],$_POST["HS"]);
         
   
 }
if (@$_REQUEST['enviar'] == "Subir Horario"){
      
      
 $objN_Horario->Insertar_Horario($_POST["Negocio"],$_POST["Dia"],$_POST["HE"],$_POST["HS"]);
}
?>
</br></br>

<?php
$objN_Horario->Tabla_Horario();
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
