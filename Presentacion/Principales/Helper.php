<!-- Le styles -->
   <link href="../../css/bootstrap.css" rel="stylesheet">
   <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

   <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
   <!--[if lt IE 9]>
     <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->

   <!-- Le fav and touch icons -->
   <link rel="shortcut icon" href="../../ico/favicon.ico">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="../../ico/apple-touch-icon-57-precomposed.png">
 <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../../css/tcal.css" />

<script type="text/javascript" src="../../js/tcal.js"></script>
<script src="../../js/elegant-press.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/jquery.mobile-1.4.2.min.css">
<script src="../../js/jquery-1.10.2.min.js"></script>
<script src="../../js/jquery.mobile-1.4.2.min.js"></script>




<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css" />
<script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "order": [[ 0, "asc" ]]
  } );
} );


  </script>
 
  <!-- Evitar Texto -->
  <script>
            function validar_texto(e){
        tecla = (document.Tipo) ? e.keyCode : e.which;
      
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
          return true;
        }
          
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9,.]/;
        
        tecla_final = String.fromCharCode(tecla);
        
        return patron.test(tecla_final);
} 
</script>  


