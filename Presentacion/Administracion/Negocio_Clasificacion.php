
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
                    
            <h1>Gestionar Negocio Clasificacion</h1>
            
            <?php
            $id_negocio_clasificacion   = base64_decode(@$_GET['id_negocio_clasificacion']);
            $id_clasificacion           = base64_decode(@$_GET['id_clasificacion']);
            $id_negocio                 = base64_decode(@$_GET['id_negocio']);
            
            $clasificacion              = base64_decode(@$_GET['clasificacion']);
            $descripcion                = base64_decode(@$_GET['descripcion']);
            
            $negocio                    = base64_decode(@$_GET['negocio']);
            
            ?>
            
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            
             <p> Negocio de Gastronomia </p>
            <select id="Negocio" name="Negocio" onchange="location.href=this.value" >
                <?php
                      require ('../../Negocio/Negocio_Clasificacion.php');
                    $objN_Clasificacion = new Negocio_Clasificacion();
                    $objN_Clasificacion->Combo_NegocioClasificacion(4,$id_negocio);

                ?>
                
                
            </select>    
            <p> Clasificacion </p>
            <select id="Clasificacion" name="Clasificacion">
                <?php
                  
                    
                    $objN_Clasificacion->Combo_Clasificacion($id_negocio);
                ?>
                
                
            </select>
            

           

            <br><br>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Subir Relacion" />
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
        <?php
        if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Negocio_Clasificacion.php';</script>";
        }

        require('../../Negocio/Negocio_Negocio_Clasificacion.php');
        $objN_Negocio_Clasificacion = new Negocio_Negocio_Clasificacion();
            

        if($id_negocio_clasificacion>0){
            $objN_Negocio_Clasificacion->Eliminar_Negocio_Clasificacion($id_negocio_clasificacion);
            echo "<script> location.href='Negocio_Clasificacion.php';</script>";
        }
        
			
        if (@$_REQUEST['Enviar'] == "Subir Relacion"){

            $objN_Negocio_Clasificacion->Insertar_Negocio_Clasificacion(
                                        $_POST["Clasificacion"],
                                        $id_negocio
                                            );
            echo "<script> location.href='Negocio_Clasificacion.php';</script>";
        }
        ?>
        
        </br></br>
        
        <?php
            $objN_Negocio_Clasificacion->Tabla_Negocio_Clasificacion();
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
