
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
                    
            <h1>Gestionar Pelicula</h1>
            
            <?php
				$id_negocio_pelicula 	= base64_decode(@$_GET['id_negocio_pelicula']);
				$id_pelicula 			= base64_decode(@$_GET['id_pelicula']);
				$id_negocio 			= base64_decode(@$_GET['id_negocio']);
				$imagen					= base64_decode(@$_GET['imagen']);
				
				$nombre 				= base64_decode(@$_GET['nombre']);
				$director				= base64_decode(@$_GET['director']);
				$genero					= base64_decode(@$_GET['genero']);
				$sinopsis				= base64_decode(@$_GET['sinopsis']);
				$trailer				= base64_decode(@$_GET['trailer']);
				
				$horario 				= base64_decode(@$_GET['horario']);
				
				$fecha_inicio		 	= base64_decode(@$_GET['fecha_inicio']);
				$fecha_fin 				= base64_decode(@$_GET['fecha_fin']);


            ?>
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            
            <p>Negocio</p>
            <select id="Negocio" name="Negocio">
            	<?php
					require('../../Negocio/Negocio_Negocio.php');
					$objN_Negocio = new Negocio_Negocio();
					
					$objN_Negocio->Combo_Negocio($id_negocio);
				?>
            </select>
            
            
            <p>Imagen</p>
            <input name="Imagen" type="file" class="casilla" id="archivo" size="35" value="<?php echo $imagen ?>"/>
            
            <?php
            if($imagen!=""){
            ?>
            	
            <p>  Mantener Imagen:</p>
            <input type="checkbox" name="Mantener_Imagen" value="ON" checked="checked" />
            	<p><?php echo $imagen ?></p>
            	<img src="../../img/Imagen_Pelicula/<?php echo $imagen ?>"></img><p></p>
            <?php
            }
            ?>


            <p> Nombre </p>
            <input type="text" value="<?php echo $nombre ?>" name="Nombre" />

            <p> Director </p>
            <input type="text" value="<?php echo $director ?>" name="Director"/>

            <p> Sinopsis </p>
            <textarea name="Sinopsis" id="Sinopsis"><?php echo $sinopsis ?></textarea>
            
            <p> Género </p>
            <input type="text" value="<?php echo $genero ?>" name="Genero" /> 
            
            <p> Trailer </p>
            <input type="text" value="<?php echo $trailer ?>" name="Trailer" />
			
            
            
            <br><br>
			<?php
            	if($id_negocio>0 && $id_pelicula>0 && $nombre!=""){
            ?>
            
            <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
            
			<?php
            }else{
            ?>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Subir Pelicula" />
           
            <?php
            }
            ?>
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
		 </div><!-- fin de content_adm -->
            
        
		<?php
        	if (@$_REQUEST['Cancelar'] == "Cancelar"){
        		echo "<script> location.href='Pelicula.php';</script>";
        	}
        	
			require('../../Negocio/Negocio_Pelicula.php');
       		$objN_Pelicula=new Negocio_Pelicula();
        	
			if($id_pelicula>0 && $nombre==""){
        
        		$objN_Pelicula->Eliminar_Pelicula($id_pelicula);
        	}
        	
			if (@$_REQUEST['Modificar'] == "Modificar"){
        		$objN_Pelicula->Modificar_Pelicula(
									$_POST["Negocio"],
									$_POST["Imagen"],
									$_POST["Nombre"],
									$_POST["Director"],
									$_POST["Genero"],
									$_POST["Sinopsis"],
									$_POST["Trailer"]
								);
			}
			
			if (@$_REQUEST['Enviar'] == "Subir Pelicula"){
      
				$status = "";
				$direccion_img ="";
				
				if ($_POST["action"] == "upload") {
					// obtener los datos del archivo
					$tamano = $_FILES["Imagen"]['size'];
					$tipo = $_FILES["Imagen"]['type'];
					$archivo = $_FILES["Imagen"]['name'];
					$prefijo = substr(md5(uniqid(rand())),0,6);
				
					if ($archivo != "") {
					// se guarda el archivo en la carpeta files
						$destino =  "../../img/Imagen_Pelicula/".$prefijo."_".$archivo;
						  $direccion_img="".$prefijo."_".$archivo;
						if (copy($_FILES["Imagen"]['tmp_name'],$destino)) {
							$status = "Archivo subido: <b>".$archivo."</b>";
						} else {
							$status = "Error al subir el archivo";
						}
					} else {
						$status = "Error al subir archivo";
					}
				}
			
				$objN_Pelicula->Insertar_Pelicula(
									$_POST["Nombre"],
									$_POST["Director"],
									$_POST["Genero"],
									$direccion_img,
									$_POST["Sinopsis"],
									$_POST["Trailer"]
								);
        	}
        ?>
        
        </br></br>
        
        <?php
        	$objN_Pelicula->Tabla_Pelicula();
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
