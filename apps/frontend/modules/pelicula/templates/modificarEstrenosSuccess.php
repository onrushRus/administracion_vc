<?php /* @var $fila Pelicula */?>
<h1 class="alert-info">Modificar los estrenos dinamicamente</h1>

<form action="<?php echo url_for('pelicula/modificarEstrenos')?>" method="POST">
    <table class="table table-bordered">
        <tr>
        <th>Titulo</th>
        <th>Duracion</th>
        <th>Actor Principal</th>
        <th>Estreno</th>
        </tr>
        <?php foreach($peliculas as $fila): ?>
                <tr>
                    <td><a href="<?php echo url_for("pelicula/sinopsis?id=".$fila->getId())?>">
                        <?php echo $fila->getTitulo()?></a></td>
                    <td><?php echo $fila->getDuracion()?></td>
                    <td><?php echo $fila->getActor1Nom().
                            ", ".$fila->getActor1Apell()?> </td>
                    <td><input type="checkbox" value="<?php echo $fila->getId();?>" name="id[]" 
                        <?php if($fila->getEstreno(true)){
                            echo "checked";                       
                        }?> /></td>
                </tr>
            <?php endforeach; ?>

    </table>

        <input class="btn btn-success" type="submit" name="modificar">
</form>    