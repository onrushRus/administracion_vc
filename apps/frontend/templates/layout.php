<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>

    <!-- more metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <!-- include base css files from plugin -->
    <?php include_partial('default/mpProjectPlugin_css_assets', array('load' => array('twitter_bootstrap'))); ?>

    <?php include_stylesheets() ?> 
    <!-- include base js files from plugin -->
    <?php include_partial('default/mpProjectPlugin_js_assets', array('load' => array('jquery', 'twitter_bootstrap'))); ?>
    <?php include_javascripts() ?>
    <!-- Comienzo Funcion del Reloj -->
    <title>Reloj con Javascript</title>    
    <script language="JavaScript">
        function mueveReloj(){
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()
            horaImprimible = hora + " : " + minuto + " : " + segundo
            document.form_reloj.reloj.value = horaImprimible
            setTimeout("mueveReloj()",1000)
        }
    </script>
    <!-- Fin Funcion del Reloj -->
  </head>
  <body onload="mueveReloj()">
  <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->            
      
      <!--Comienza imagen cabezera-->
      <div class="row">
        <div class="span4 offset4">
          <img src="<?php echo image_path('logo.png')?>" alt=""></img>
        </div>
        <div class="span2 offset1 pull-left">
          <?php include_partial("global/estado");?>
        </div>
      </div>
      <!--Finaliza imagen cabezera-->
      
      
      <!--Comienza Panel Inferior-->
      <div class="row">
        <div class="span2">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo url_for('home/index');?>"><i class="icon-home"></i> Home </a></li>
            <li><a href="<?php echo url_for('pelicula/buscarPelicula');?>"><i class="icon-search"></i> Buscar Peliculas</a></li>

            <?php if($sf_user->isAuthenticated()):?>
                <li><a href="<?php echo url_for('socio/reservadas');?>"><i class="icon-check"></i> Peliculas Reservadas</a></li>
                <li><a href="<?php echo url_for('socio/historial');?>"><i class="icon-check"></i> Tu historial</a></li>
            <?php endif;?>

            <!--Comienza acordeon dentro de menu-->
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                              <i class="icon-arrow-down"></i> Categorias</a>
                    </div>
                  <div id="collapseOne" class="accordion-body collapse">
                      <div class="accordion-inner">
                          <?php echo include_component('pelicula','obtCategorias')?>
                   </div>
                  </div>
                </div>
            </div>
            <!--Finaliza acordeon dentro de menu-->
            
                
            <!--Comienza el acordeon de usuarios administradores y empleados-->
            <?php            
            if (($sf_user->isAuthenticated()) && ($sf_user->hasCredential(array('2','1'),false))):?>
                <li class=""><a href="<?php echo url_for('socio/index');?>"><i class="icon-user"></i> Administracion de Socio</a></li>
                <li class=""><a href="<?php echo url_for('pelicula/index');?>"><i class="icon-film"></i> Administracion de Peliculas</a></li>
                <li class=""><a href="<?php echo url_for('socio/peliculasReservadas');?>"><i class="icon-shopping-cart"></i> Alquiler de Peliculas</a></li>
                <li class=""><a href="<?php echo url_for('pelicula/alquiladas');?>"><i class="icon-info-sign"></i> Peliculas Alquiladas</a></li>
                <li><a href="<?php echo url_for('pelicula/modificarEstrenos');?>"><i class="icon-cog"></i> Modificar Estrenos</a></li>
            <?php endif?>
            <li><a href="<?php echo url_for('home/quienesSomos');?>"><i class="icon-align-justify"></i> Quienes Somos</a></li>
           </ul>
          </div>                
          <div class="span10">
            <?php echo $sf_content ?>
          </div> <!-- /container -->
          <div class="span4 offset3">
            <hr/>
              <footer>                
                  <p>Gosaine, Javier</p>
                  <p>&copy; Administración VideoClubs Company - 2012</p>
              </footer>
          </div>
      </div>
    
  </body>
</html>
