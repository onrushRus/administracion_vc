<?php /* @var $peli Pelicula  */ ?>
<?php /* @var $com Comentario  */ ?>

<?php 
    $cant = sizeof($pelicula);
    if($cant >=1):?>        

    <?php foreach($pelicula as $peli):?>        
            <h1 class="alert-heading"><?php echo $peli->getTitulo();?></h1>
            <img src="<?php echo image_path($peli->getImagen())?>"
                 alt="<?php echo $peli->getTitulo();?>"></img>                                        
            <fieldset>
            <h3><legend>Sinopsis</legend><?php echo $peli->getSinopsis() ?></h3>
            </fieldset>
    <?php endforeach;?>
<?php else:?>
    <h2 class="alert-danger">No se encuentra una pelicula con esa identificacion
                    o no tiene permisos suficientes para ver los datos
                    de esta pelicula!</h2>        
<?php endif;?>
            
<!--
<br><h2>Comentarios: </h2>
<?php// foreach($comentarios as $com):?>
            <fieldset>
                <legend><?php// $com->getFecha('d-m-Y')." - "
                        //.$com->getSocio()->getUsuario().
                        //" dijo:"?>
                </legend>
                <?php //echo $com->getDetalle()?>
            </fieldset>
<?php// endforeach; ?>
<form method="POST" action="<?php //echo url_for('pelicula/sinopsis') ?>" >
    <label>Comentar:</label>
    <input type="text">
    
    
</form>
-->