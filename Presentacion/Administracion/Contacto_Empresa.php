

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
                    
            <h1>Gestionar Contacto Empresa</h1>
            
            <?php
            
            $id_contacto_empresa    = base64_decode(@$_GET['id_contacto_empresa']);
            $id_empresa             = base64_decode(@$_GET['id_empresa']);

            $contacto               = base64_decode(@$_GET['contacto']);
            $telefono               = base64_decode(@$_GET['telefono']);
            $celular                = base64_decode(@$_GET['celular']);
            
            
            ?>
            
            <!-- Inicio del formulario -->
            <form  method="post" enctype="multipart/form-data" style="text-align: center">
            <p>Empresa</p>
            <select id="Empresa" name="Empresa">
                <?php
                require '../../Negocio/Negocio_Empresa.php';
                $objN_Empresa = new Negocio_Empresa();

                $objN_Empresa->Combo_Empresa($id_empresa);
                ?>
            </select>
                
                
            <p>Nombre del Contacto</p>
            <input type="text" value="<?php echo $contacto ?>" name="Contacto"/>
            
            <p>Telefono</p>
            <input type="tel" value="<?php echo $telefono ?>" name="Telefono"/>
            
            <p>Celular</p>
            <input type="tel" value="<?php echo $celular ?>" name="Celular"/>
            
            
            <br><br>
            <?php
            	if($id_empresa>0 && $id_contacto_empresa>0 && $contacto!=""){
            ?>
            
            <input name="Modificar" type="submit" class="boton" id="Modificar" value="Modificar" /> 
            
            <?php
            }else{
            ?>
            
            <input name="Enviar" type="submit" class="boton" id="enviar" value="Registrar Contacto" />
           
            <?php
            }
            ?>
            
            <input name="Cancelar" type="submit" class="boton" id="enviar" value="Cancelar" />
            <input name="action" type="hidden" value="upload" />
            </form>
            
	</div><!-- fin de content_adm -->
            
        
        <?php
        if (@$_REQUEST['Cancelar'] == "Cancelar"){
                echo "<script> location.href='Contacto_Empresa.php';</script>";
        }
        
        require '../../Negocio/Negocio_Contacto_Empresa.php';
        $objN_Contacto_Empresa = new Negocio_Contacto_Empresa();

            
        if($id_contacto_empresa>0 && $contacto==""){
            $objN_Contacto_Empresa->Eliminar_Contacto_Empresa($id_contacto_empresa);
            echo "<script> location.href='Contacto_Empresa.php';</script>";
        }
        	
        if (@$_REQUEST['Modificar'] == "Modificar"){  
                $objN_Contacto_Empresa->Modificar_Contacto_Empresa(
                                                    $id_contacto_empresa,
                                                    $_POST["Empresa"],
                                                    $_POST["Contacto"],
                                                    $_POST["Telefono"],
                                                    $_POST["Celular"]
                                                    );
                echo "<script> location.href='Contacto_Empresa.php';</script>";
        }
			
        
        if (@$_REQUEST['Enviar'] == "Registrar Contacto"){

            $objN_Contacto_Empresa->Insertar_Contacto_Empresa(
                                        $_POST["Empresa"],
                                        $_POST["Contacto"],
                                        $_POST["Telefono"],
                                        $_POST["Celular"]
                                            );
            echo "<script> location.href='Contacto_Empresa.php';</script>";
        }   
                
        ?>
        
        </br></br>
        
        
        <?php
            $objN_Contacto_Empresa->Tabla_Contacto_Empresa();
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
