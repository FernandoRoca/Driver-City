 <footer class="row">
      <div>
       
      </div>
    
    </footer>
<script src="../../js/bootstrap-transition.js"></script>
<script src="../../js/bootstrap-carousel.js"></script>
<script src="../../js/bootstrap-alert.js"></script>
<script src="../../js/bootstrap-modal.js"></script>
<script src="../../js/bootstrap-dropdown.js"></script>
<script src="../../js/bootstrap-scrollspy.js"></script>
<script src="../../js/bootstrap-tab.js"></script>
<script src="../../js/bootstrap-tooltip.js"></script>
<script src="../../js/bootstrap-popover.js"></script>
<script src="../../js/bootstrap-button.js"></script>
<script src="../../js/bootstrap-collapse.js"></script>
<script src="../../js/bootstrap-typeahead.js"></script>
<script src="../../js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="../../js/jquery.smooth-scroll.min.js"></script>
<script src="../../js/lightbox.js"></script>

   <script>
$('.carousel').carousel({
  interval: 
  <?php    
    echo $objN_Publicidad->get_tiempo();
    ?>
})
</script>
  <script>
$(document).ready(function() {
  var menu = $('#menu');
  var contenedor = $('#menu-contenedor');
  var cont_offset = contenedor.offset();
  // Cada vez que se haga scroll en la página
  // haremos un chequeo del estado del menú
  // y lo vamos a alternar entre 'fixed' y 'static'.

  $(window).on('scroll', function() {
  	 //alert($(window).scrollTop());
    if($(window).scrollTop() > cont_offset.top) {
      menu.addClass('menu-fijo');
    } else {
      menu.removeClass('menu-fijo');
    }
  });
});
</script>


