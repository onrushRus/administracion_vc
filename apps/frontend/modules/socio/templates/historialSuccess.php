<?php /* @var $alq Alquiler */ ?>
<h1 class="alert-info">Historial de Peliculas</h1><br><br>

<?php
  $cant = sizeof($alquileres);  
  if($cant >= 1):?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Fecha Alquiler</th>
            <th>Titulo</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($alquileres as $alq):?>
            <tr>
                <td><?php echo $alq->getFechaAlquiler('d-m-Y')?></td>
                <td><?php foreach($alq->getSocioAlquilersJoinPelicula() as $as){
                    echo "<li>".$as->getPelicula()->getTitulo()."</li>";
                }?>
                </td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php echo $alquileres->getNbResults()." elementos encontrados. Mostrando resultados desde ".$alquileres->getFirstIndice()." hasta ".$alquileres->getLastIndice()."<br>";?>
    <?php if ($alquileres->haveToPaginate()):?>
            <?php echo link_to('&laquo;','socio/historial?pag='.$alquileres->getFirstPage())?>
            <?php echo link_to('&lt;','socio/historial?pag='.$alquileres->getPreviousPage())?>
            <?php $links = $alquileres->getLinks();
                foreach ($links as $page): ?>
                    <?php echo ($page == $alquileres->getPage()) ? $page : link_to($page, 'socio/historial?pag='.$page) ?>
                    <?php if ($page != $alquileres->getCurrentMaxLink()): ?> / <?php endif ?>
            <?php endforeach ?>
            <?php echo link_to('&gt;','socio/historial?pag='.$alquileres->getNextPage()) ?>
            <?php echo link_to('&raquo;','socio/historial?pag='.$alquileres->getLastPage()) ?>
    <?php endif ?>

<?php endif;?>