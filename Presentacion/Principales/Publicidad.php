 


      
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
             

              <div class="item">
              <?php
              require('../../Negocio/Negocio_Gestionar_Publicidad.php');
              $objN_Publicidad=new Negocio_Gestionar_Publicidad();
              $objN_Publicidad->get_Publicidad();
              ?>
                <!--<div class="carousel-caption">
                  <h4>Second Thumbnail label</h4>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>-->
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="../../img/arrow.png" alt="Arrow"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="../../img/arrow2.png" alt="Arrow"></a>
          </div>
     


