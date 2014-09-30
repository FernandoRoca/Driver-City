
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <a name="mundial"></a>
        <div class="content_adm" align="center">
                    
            <h1>Gestionar Horarios de Pelicula</h1>
            
            <?php
                
                $id_negocio_pelicula   = base64_decode(@$_GET['id_negocio_pelicula']);
                $id_negocio             = base64_decode(@$_GET['id_negocio']);
                $id_pelicula            = base64_decode(@$_GET['id_pelicula']);
                $cine                   = base64_decode(@$_GET['cine']);
                $nombre                 = base64_decode(@$_GET['nombre']);
                $horario                = base64_decode(@$_GET['horario']);
                $imagen                 = base64_decode(@$_GET['imagen']);
                $fecha_inicio           = base64_decode(@$_GET['fecha_inicio']);
                $fecha_fin              = base64_decode(@$_GET['fecha_fin']);


            ?>
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
              
            <p>Negocio</p>
            <select id="Negocio" name="Negocio" onchange="location.href=this.value">
            	<?php
                   require('../../Negocio/Negocio_Horario_Pelicula.php');
                    
                    $objN_Horario_Pelicula = new Negocio_Horario_Pelicula();
                    
                    $objN_Horario_Pelicula->Combo_Negocio_HorarioCine(6,$id_negocio);
                    
                    
		?>
            </select>
            
            <p>Pelicula</p>
            <select id="Pelicula" name="Pelicula">
            	<?php
                    

                    $objN_Horario_Pelicula->Listar_Peliculas($id_negocio);
                
		?>
            </select>
            
            <p> Asignar Horario </p>
            <input type="time" value="<?php echo $horario?>" name="Horario" />
                        
            <p> Fecha de Inicio </p>
            <input type="text" name="FechaInicio" class="tcal" value="<?php echo $fecha_inicio ?>"  readonly="readonly" />
            
            <p> Fecha de Finalización </p>
            <input type="text" name="FechaFin" class="tcal" value="<?php echo $fecha_fin ?>"  readonly="readonly" />
			
            
            <br><br>

            <input name="Enviar" type="submit" class="boton" id="enviar" value="Asignar Horario" />
            
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
	<?php
            if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Horario_Pelicula.php';</script>";
            }
            
            if($id_negocio_pelicula>0){
                $objN_Horario_Pelicula->Eliminar_Horario_Pelicula($id_negocio_pelicula);
                echo "<script> location.href='Horario_Pelicula.php';</script>";
            }
            
            if (@$_REQUEST['Enviar'] == "Asignar Horario"){

                $objN_Horario_Pelicula->Insertar_Horario_Pelicula($id_negocio,
                                            $_POST["Pelicula"],
                                            $_POST["Horario"],
                                            $_POST["FechaInicio"],
                                            $_POST["FechaFin"]);
                echo "<script> location.href='Horario_Pelicula.php';</script>";
            }
        ?>
        
        </br></br>
        
        <?php
        $objN_Horario_Pelicula->Tabla_Horario_Pelicula();
        ?>
        
	</div><!-- fin de container -->
     
	<?php
    include_once('Footer.php');
    ?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
</body>
</html>
