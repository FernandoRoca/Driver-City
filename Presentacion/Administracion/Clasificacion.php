
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
                    
            <h1>Gestionar Clasificacion</h1>
            
            <?php
            $id_clasificacion   = base64_decode(@$_GET['id_clasificacion']);
            $nombre             = base64_decode(@$_GET['nombre']);
            $descripcion        = base64_decode(@$_GET['descripcion']);
            
            
            ?>
            
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            

            <p> Clasificacion </p>
            <input type="text" value="<?php echo $nombre ?>" name="Nombre" />

            <p> Descripcion </p>
            <input type="text" value="<?php echo $descripcion ?>" name="Descripcion"/>

            
            <br><br>
            <?php
            	if($id_clasificacion>0 && $nombre!=""){
            ?>
            
            <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
            
            <?php
            }else{
            ?>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Guardar Clasificacion" />
           
            <?php
            }
            ?>
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
        <?php
        if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Clasificacion.php';</script>";
        }

        require('../../Negocio/Negocio_Clasificacion.php');
        $objN_Clasificacion = new Negocio_Clasificacion();
            

        if($id_clasificacion>0 && $nombre==""){
            $objN_Clasificacion->Eliminar_Clasificacion($id_clasificacion);
            echo "<script> location.href='Clasificacion.php';</script>";
        }
        
        
        	
        if (@$_REQUEST['Modificar'] == "Modificar"){
            $objN_Clasificacion->Modificar_Clasificacion(
                                        $id_clasificacion,
                                        $_POST["Nombre"],
                                        $_POST["Descripcion"]
                                           );
            echo "<script> location.href='Clasificacion.php';</script>";
        }
			
        if (@$_REQUEST['Enviar'] == "Guardar Clasificacion"){

            $objN_Clasificacion->Insertar_Clasificacion(
                                        $_POST["Nombre"],
                                        $_POST["Descripcion"]
                                            );
            echo "<script> location.href='Clasificacion.php';</script>";
        }
        ?>
        
        </br></br>
        
        <?php
            $objN_Clasificacion->Tabla_Clasificacion();
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
