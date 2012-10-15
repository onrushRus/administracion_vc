<?php /* @var $peli Pelicula */?>

<h1 class="alert-info">Buscar Peliculas</h1>
<br>
<fieldset><legend>Buscar pelicula</legend>
    <form class="well form-search" action="<?php echo url_for('pelicula/buscarPelicula') ?>" method="POST">
       <input type="text" data-provide="typeahead" placeholder="Título" name="titulo" data-source='[<?php foreach($peliculas as $s){echo "\"".$s->getTitulo()."\"";if($peliculas->getPosition()< sizeof($peliculas) -1){echo(",");}}?>]'></input>
       <button type="submit" class="btn-success">Buscar</button>
       <button type="reset" class="btn-warning">Borrar</button>
    </form>
</fieldset>
<br>
<?php
    $cant = sizeof($elegida);    
    if ( $cant >= 1 ):?>
        <table class="table table-bordered">
            <tr>
                <th>Titulo</th>
                <th>Año Estreno</th>
                <th>Duración</th>
                <th>Actor Principal</th>
                <?php if($sf_user->isAuthenticated()):?>
                  <th>ID</th>
                  <th>Reservar</th>
                <?php endif;?>
            </tr>
            <?php foreach($elegida as $peli):?>
                <tr>
                    <td><a href="<?php echo url_for('pelicula/sinopsis?id='.$peli->getId());?>">
                    <?php echo $peli->getTitulo()?></td>
                    <td><?php echo $peli->getFechaEstreno()?></td>
                    <td><?php echo $peli->getDuracion()?></td>
                    <td><?php echo $peli->getActor1Apell().", ".$peli->getActor1Nom()?></td>
                    <?php if($sf_user->isAuthenticated()):?>
                        <td><?php echo $peli->getId()?></td>
                        <td><a href="<?php echo url_for(
                        "socio/reservarPelicula?id=".$peli->getId());?>">Reservar</td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        </table>
<?php endif;?>