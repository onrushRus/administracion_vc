<?php /* @var $peli Alquiler */ ?>
<h1 class="alert-info">Peliculas Alquiladas No Devueltas</h1>
<br>

<table class="table table-bordered">
    <tr>
        <th>Fecha Alquiler</th>        
        <th>Total pagado</th>
        <th>Socio</th>
        <th>Devolución</th>
    </tr>
    <?php foreach($peliculas as $peli):?>
       <tr>
           <td><?php echo $peli->getFechaAlquiler('d-m-Y');?></td>           
           <td><?php echo "$ ".$peli->getTotalACobrar()?></td>
           <td><?php echo $peli->getSocio()->getApellido().", ".$peli->getSocio()->getNombre();?></td>
           <td><a href="<?php echo url_for('pelicula/devolverPeliculas?id_alq='.$peli->getId());?>"><i class="icon-arrow-right"></i></a></td>
       </tr> 
    <?php endforeach;?>
</table>
<?php echo $peliculas->getNbResults()." elementos encontrados. Mostrando resultados desde ".$peliculas->getFirstIndice()." hasta ".$peliculas->getLastIndice()."<br>";?>
<?php if ($peliculas->haveToPaginate()):?>
        <?php echo link_to('&laquo;','pelicula/alquiladas?pag='.$peliculas->getFirstPage())?>
        <?php echo link_to('&lt;','pelicula/alquiladas?pag='.$peliculas->getPreviousPage())?>
        <?php $links = $peliculas->getLinks();
            foreach ($links as $page): ?>
                <?php echo ($page == $peliculas->getPage()) ? $page : link_to($page, 'pelicula/alquiladas?pag='.$page) ?>
                <?php if ($page != $peliculas->getCurrentMaxLink()): ?> / <?php endif ?>
        <?php endforeach ?>
        <?php echo link_to('&gt;','pelicula/alquiladas?pag='.$peliculas->getNextPage()) ?>
        <?php echo link_to('&raquo;','pelicula/alquiladas?pag='.$peliculas->getLastPage()) ?>
<?php endif ?>