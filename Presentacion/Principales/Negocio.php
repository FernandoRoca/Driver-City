
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once('Helper.php');

?>
      <style>
.menujq ul {
   
list-style: none;
width: 80%;
margin: 0 auto;
padding: 0;
}
.menujq a {
display: block;
padding: 10px;
border-bottom: 1px solid #fff;
background: #D25400;
color: #fff;
text-decoration: none;
font-size: 16px;
line-height: 16px;
text-transform: uppercase;
}
/* Símbolo elemento normal */
.menujq ul li a:before {
content: "\25CF\00A0 ";
width: 28px;
display: inline-block;
vertical-align: top;
}
/* Símbolo elemento desplegable cerrado */
.menujq ul li.desplegable a:before {
content: "\25BA\00A0";
}
/* Símbolo elemento desplegable abierto */
.menujq ul li.desplegable.activa a:before {
content: "\25BC\00A0 ";
}
/* Eliminar símbolos para sub-opciones */
.menujq ul li.desplegable ul li a:before,
.menujq ul li.desplegable.activa ul li a:before {
content: "";
}
/* Lista anidada inicialmente oculta */
.menujq ul ul {
display: none;
width: 100%;
}
/* Sangrado y segundo color para sub-opciones */
.menujq ul ul a {
padding-left: 20px;
background: #E77E23;
text-transform: capitalize;
}
</style>
      <script type="text/javascript">
$(document).ready(function(){
$('.menujq > ul > li:has(ul)').addClass('desplegable');
$('.menujq > ul > li > a').click(function() {
var comprobar = $(this).next();
$('.menujq li').removeClass('activa');
$(this).closest('li').addClass('activa');
if((comprobar.is('ul')) && (comprobar.is(':visible'))) {
$(this).closest('li').removeClass('activa');
comprobar.slideUp('normal');
}
if((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
$('.menujq ul ul:visible').slideUp('normal');
comprobar.slideDown('normal');
}
});
});
</script>
  </head>

  <body>

     

  
  <div class="container">

 
       <?php
       $id_principal=base64_decode(@$_GET['id_principal']);
       $id_negocio=base64_decode(@$_GET['id_negocio']);
       echo $id_negocio;
       require('../../Negocio/Negocio_Negocio.php');
       $objN_Negocio=new Negocio_Negocio();
       ?>
  
      <table border="0" cellspacing="0" cellpadding="0" >
     
      <tbody>
         
          <tr  width="1000 px" style=" background-image: url(../../img/Imagen_Negocio/negocios.jpg); color: #fefefe;">
             
              <td width="400 px" ><?php echo $objN_Negocio->Obtener_Logo($id_negocio); ?></td>
              <td width="600 px" style="text-align: center"><h1><?php echo $objN_Negocio->Obtener_Datos_Negocio($id_negocio,"N"); ?></h1></td>
          </tr>
      </tbody>
  </table>

 </br>
  
             

              
              <?php
              require('../../Negocio/Negocio_Imagen_Negocio.php');
              $objN_Negocio_Imagen=new Negocio_Imagen_Negocio();
              $objN_Negocio_Imagen->Insertar_Slider($id_negocio);
             
              ?>
             
              
 </br>
   <table border="0" cellspacing="0" cellpadding="8" >
     
      <tbody>
         
          <tr  width="1000 px" style=" background-image: url(../../img/Imagen_Negocio/negocios.jpg); color: #fefefe;">
             
              
              <td  width="1000 px" style="text-align: justify; border-radius: 15px; "><?php echo $objN_Negocio->Obtener_Datos_Negocio($id_negocio,"D"); ?></br>Horario de Atencion:
              <?php
              require('../../Negocio/Negocio_Horario.php');
              $objN_Negocio_Horario=new Negocio_Horario();
              echo $objN_Negocio_Horario->Get_Horario_Negocio($id_negocio);
              ?>
              </td>
          </tr>
      </tbody>
  </table>
 
 </br>
   <table border="0" cellspacing="0" cellpadding="8" >
     
      <tbody>
         
          <tr  width="1000 px" style=" background-image: url(../../img/Imagen_Negocio/negocios.jpg); color: #fefefe;">
             
              
              <td  width="500 px" style="text-align: justify;border-radius: 15px 0px 0px 15px;
                -moz-border-radius: 15px 0px 0px 15px;
                -webkit-border-radius: 15px 0px 0px 15px; ">
                 <?php echo $objN_Negocio->Obtener_Datos_Negocio($id_negocio,"Dir"); ?></br>
              <div class="menujq">
<ul>
    <li style=" border-radius: 15px;"><a href="javascript:void();">Contactos</a>
  <ul>
      <?php 
       require('../../Negocio/Negocio_Contacto_Negocio.php');
       $objN_Contacto_Negocio=new Negocio_Contacto_Negocio();
       $objN_Contacto_Negocio->Mostrar_Contacto_Negocio($id_negocio);
      ?>
  
  
  </ul>
 </li>
 
</ul>
</div>
              </td>
              <td width="500 px" style=" background-image: url(../../img/Principales/mapa.png); border-radius: 0px 15px 15px 0px;
                -moz-border-radius: 0px 15px 15px 0px;
                -webkit-border-radius: 0px 15px 15px 0px;">
                
              </td>
          </tr>
      </tbody>
  </table>
       

    

            
      </div>
      
  

 
<?php
include_once('Footer.php');
?>
      

   
   
 
  </body>
</html>
