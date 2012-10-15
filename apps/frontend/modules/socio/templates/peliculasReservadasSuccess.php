<?php /* @var $s $soc Socio */?>
<?php /* @var $s $peli Pelicula */?>
 <?php //var_dump($id_pelis); ?>
<h1 class="alert-info">Peliculas reservadas por un socio</h1>
<br>
<fieldset><legend>Buscar socio</legend>
    <form class="well form-search" action="<?php echo url_for('socio/peliculasReservadas') ?>" method="POST">
       <input type="text" data-provide="typeahead" placeholder="D.N.I" name="dni" data-source='[<?php foreach($socios as $s){echo "\"".$s->getDni()."\"";if($socios->getPosition()< sizeof($socios) -1){echo(",");}}?>]'></input>
       <button type="submit" class="btn-success">Buscar</button>
       <button type="reset" class="btn-warning">Borrar</button>
    </form>
</fieldset>
<br>
<?php
  $cant = sizeof($socio);  
  if($cant >= 1):?>
    <table class="table table-bordered">
        <tr>
            <th>Nombre y Apellido</th>
            <th>D.N.I.</th>
            <th>Teléfono</th>
            <th>Dirección</th>            
        </tr>        
            <tr>                
                <td><?php echo $socio->getNombre().", "
                        .$socio->getApellido()?></td>
                <td><?php echo $socio->getDni()?></td>
                <td><?php echo $socio->getTelCel()?></td>
                <td><?php echo $socio->getDireccion()?></td>
            </tr>        
    </table>
    <br><br>
    <?php 
        $cant2 = sizeof($reservas);
        if($cant2 >= 1):?>
    <fieldset class="well"><legend>Reservadas por el usuario:</legend>
        <form action="<?php echo url_for("socio/alquilarPeliculas");?>" method="post">
        <table class="table table-bordered">
            <tr>
                <th>Nro. de Pelicula</th>
                <th>Nombre de Pelicula</th>
            </tr>
            <?php foreach($reservas as $peli):?>
                <tr>
                   <td><?php echo $peli->getPeliculaId();?></td>
                   <td><?php echo $peli->getPelicula()->getTitulo();?></td>
                </tr>
                <input type="hidden" value="<?php echo $peli->getPeliculaId();?>" name="id_pelis[]">
                <input type="hidden" value="<?php echo $peli->getPelicula()->getTitulo();?>" name="titulos_pelis[]">
            <?php endforeach;?>
                <input type="hidden" value="<?php echo $socio->getNombre().", ".$socio->getApellido()?>" name="nombre_socio">
                <input type="hidden" value="<?php echo $socio->getId()?>" name="id_socio">
        </table>
            <input type="submit" value="Alquilar">
        </form>
    </fieldset>
  
    <?php else:?>
        <fieldset class="well"><legend>El usuario no tiene reservas</legend></fieldset>
    <?php endif;?>
<?php endif;?>


