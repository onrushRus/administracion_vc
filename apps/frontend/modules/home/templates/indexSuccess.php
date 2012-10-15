<?php /* @var $estreno Pelicula */ ?>              

  <?php 
    
    $active=1;
    $etiqueta="active";
  ?>

          <div class="row">
            <div class="span3 offset2">
              <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                <?php if(!empty($peliculas_estrenos)):?>
                  <?php foreach ($peliculas_estrenos as $estreno):?>
                  <div class="<?php if($active){echo $etiqueta;$active=0;}?> item">
                    <img src="<?php echo image_path($estreno->getImagen());?>" alt="<?php $estreno->getTitulo();?>">
                    <div class="carousel-caption">
                      <h4><?php $estreno->getTitulo();?></h4>
                      <a href="<?php echo url_for("pelicula/sinopsis?id=".$estreno->getId());?>">Sinopsis</a>
                    </div>
                  </div>
                  <?php endforeach;?>
                <?php else:?>
                  <div class="<?php if($active){echo $etiqueta;$active=0;}?> item">                   
                    <div class="carousel-caption">
                        <img src="<?php echo image_path('sinimagen.jpg');?>" alt="No Disponible">
                    </div>
                  </div>
                <?php endif;?>
                </div>                  
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>
            </div>
            <div class="span3 offset1">
              <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Rawson,+Chubut,+Argentina&amp;aq=0&amp;oq=rawson+chubut&amp;sll=34.416505,-90.776047&amp;sspn=20.851281,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=Rawson,+Chubut,+Argentina&amp;t=m&amp;ll=-43.299884,-65.099487&amp;spn=0.01874,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Rawson,+Chubut,+Argentina&amp;aq=0&amp;oq=rawson+chubut&amp;sll=34.416505,-90.776047&amp;sspn=20.851281,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=Rawson,+Chubut,+Argentina&amp;t=m&amp;ll=-43.299884,-65.099487&amp;spn=0.01874,0.025749&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
            </div>
        </div>
        <!--Finaliza Div Login-->      
      </div>
      <!-- Cierro ROW -->
       
      
            
