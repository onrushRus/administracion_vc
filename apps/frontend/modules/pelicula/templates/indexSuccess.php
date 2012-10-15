<?php /* @var $pelicula Pelicula */ ?>

<h1 class="alert-info">Listado de Peliculas</h1>

<fieldset><legend>Buscar pelicula</legend>
    <form class="well form-search" action="<?php echo url_for('pelicula/index') ?>" method="POST">
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
                <th>ID</th>
                <th>Opciones</th>                
            </tr>
            <?php foreach($elegida as $peli):?>
                <tr>
                    <td><?php echo $peli->getTitulo()?></td>
                    <td><?php echo $peli->getFechaEstreno()?></td>
                    <td><?php echo $peli->getDuracion()?></td>
                    <td><?php echo $peli->getActor1Apell().", ".$peli->getActor1Nom()?></td>                    
                    <td><?php echo $peli->getId()?></td>
                    <td style="text-align: center;"><a href="<?php echo url_for("pelicula/edit?id=".$peli->getId());?>"><i class="icon-pencil"></i></a>                        
                        <?php echo link_to("<i class='icon-remove-sign'></i>", 'pelicula/delete?id='.$peli->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro de queres borrar la pelicula?'));?>
                     </td>                        
                </tr>
            <?php endforeach;?>
        </table>
        <p><i class="icon-pencil"></i> Editar los datos de una pelicula.</p>
        <p><i class="icon-remove-sign"></i> Borrar una pelicula.</p>
<?php endif;?>
<br>
<form action="<?php echo url_for('pelicula/new')?>">
    <button class="btn btn-primary">Nueva Pelicula</button>
    <!-- <a href="<?php //echo url_for('pelicula/new') ?>"><i class="icon-pencil"></i>Agregar una Pelicula Nueva</a> -->
</form>
