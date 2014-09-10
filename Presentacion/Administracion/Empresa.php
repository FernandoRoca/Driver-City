

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
                    
            <h1>Gestionar Empresa</h1>
            
            <?php
            
            $id_empresa     = base64_decode(@$_GET['id_empresa']);

            $nombre         = base64_decode(@$_GET['nombre']);
            $logo           = base64_decode(@$_GET['logo']);
            $descripcion    = base64_decode(@$_GET['descripcion']);
            
            
            ?>
            
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            
            
            <p>Nombre</p>
            <input type="text" value="<?php echo $nombre ?>" name="Nombre"/>
            
            
            <p>Logo</p>
            <input name="Logo" type="file" class="casilla" style="color: #ffffff;" id="archivo" size="35" value="<?php echo $logo ?>"/>
            
            <?php
                if($logo!=""){
            ?>	
                    <p>Mantener Logo:</p>
                    <input type="checkbox" name="Mantener_Logo" value="ON" checked="checked" />
                    <p><?php echo $logo ?></p>
                    <img src="../../img/Logo_Empresa/<?php echo $logo ?>"></img>
                    <p></p>
            <?php
                }
            ?>


            <p> Descripcion </p>
            <input type="text" value="<?php echo $descripcion ?>" name="Descripcion" />

            
            <br><br>
            <?php
            	if($id_empresa>0 && $nombre!=""){
            ?>
            
            <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
            
            <?php
            }else{
            ?>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Registrar Empresa" />
           
            <?php
            }
            ?>
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
        <?php
        if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Empresa.php';</script>";
        }
            require('../../Negocio/Negocio_Empresa.php');
            $objN_Empresa = new Negocio_Empresa();
            
        if($id_empresa>0 && $nombre==""){
            $objN_Empresa->Eliminar_Empresa($id_empresa);
            echo "<script> location.href='Empresa.php';</script>";
        }
        	
        if (@$_REQUEST['Modificar'] == "Modificar"){
            if((isset($_POST["Mantener_Logo"]))) {
                $objN_Empresa->Modificar_Empresa_sin_Logo( $id_empresa,
                                                    $_POST["Nombre"],
                                                    $_POST["Descripcion"]
                                                    );
            }else{
                $status = "";
                $direccion_img ="";
                // obtener los datos del archivo
                $tamano = $_FILES["Logo"]['size'];
                $tipo = $_FILES["Logo"]['type'];
                $archivo = $_FILES["Logo"]['name'];
                $prefijo = substr(md5(uniqid(rand())),0,6);

                if ($archivo != "") {
                // se guarda el archivo en la carpeta files
                    $destino =  "../../img/Logo_Empresa/".$prefijo."_".$archivo;
                    $direccion_img="".$prefijo."_".$archivo;
                    if(copy($_FILES["Logo"]['tmp_name'],$destino)) {
                        $status = "Archivo subido: <b>".$archivo."</b>";
                    }else{
                        $status = "Error al subir el archivo";
                    }
                }else{
                    $status = "Error al subir archivo";
                }
                $objN_Empresa->Modificar_Empresa_Logo( $id_empresa,
                                                    $_POST["Nombre"],
                                                    $direccion_img,
                                                    $_POST["Descripcion"]
                                                    );
            }
            echo "<script> location.href='Empresa.php';</script>";
        }
			
        
        if (@$_REQUEST['Enviar'] == "Registrar Empresa"){

            $status = "";
            $direccion_img ="";

            if ($_POST["action"] == "upload") {
                // obtener los datos del archivo
                $tamano = $_FILES["Logo"]['size'];
                $tipo = $_FILES["Logo"]['type'];
                $archivo = $_FILES["Logo"]['name'];
                $prefijo = substr(md5(uniqid(rand())),0,6);

                if ($archivo != "") {
                // se guarda el archivo en la carpeta files
                    $destino =  "../../img/Logo_Empresa/".$prefijo."_".$archivo;
                    $direccion_img="".$prefijo."_".$archivo;
                    if(copy($_FILES["Logo"]['tmp_name'],$destino)) {
                        $status = "Archivo subido: <b>".$archivo."</b>";
                    }else{
                        $status = "Error al subir el archivo";
                    }
                }else{
                    $status = "Error al subir archivo";
                }
            }

            $objN_Empresa->Insertar_Empresa(
                                        $_POST["Nombre"],
                                        $direccion_img,
                                        $_POST["Descripcion"]
                                            );
        
            echo "<script> location.href='Empresa.php';</script>";
        }
                 
                
        ?>
        
        </br></br>
        
        
        <?php
            $objN_Empresa->Tabla_Empresa();
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
