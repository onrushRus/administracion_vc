<?php /* @var $peli Pelicula */ ?>


<h1 class="alert-success"><?php  echo $categoria->getTipo()?></h1>
<br>


<table class="table table-striped" >
    <tr>
        <th>Título</th>
        <th>Fecha Estreno</th>
        <th>Actor Principal</th>
        <th>Actor Secundario</th>
        <th>Duración</th>
        <?php if($sf_user->isAuthenticated()):?>
            <th>Reservar</th>
        <?php endif;?>
    </tr> 
    <?php foreach ($peliculas->getResults() as $peli): ?>
        <tr>
            <td><a href="<?php echo url_for('pelicula/sinopsis?id='.$peli->getId());?>">
                    <?php echo $peli->getTitulo()?></td>
            <td><?php echo $peli->getFechaEstreno('d-m-Y');?></td>
            <td><?php echo $peli->getActor1Apell()." ,".$peli->getActor1Nom();?></td>
            <td><?php echo $peli->getActor2Apell()." ,".$peli->getActor2Nom();?></td>
            <td><?php echo $peli->getDuracion('H:i:s');?></td>
            <?php if($sf_user->isAuthenticated()):?>
               <td><a href="<?php echo url_for(
                  "socio/reservarPelicula?id=".$peli->getId());?>">Reservar</td>
           <?php endif;?>
        </tr>    
    <?php endforeach; ?>    
</table>
<?php echo $peliculas->getNbResults()." elementos encontrados. Mostrando resultados desde ".$peliculas->getFirstIndice()." hasta ".$peliculas->getLastIndice()."<br>";?>
<?php if ($peliculas->haveToPaginate()):?>
        <?php echo link_to('&laquo;','pelicula/listarPorCategoria?id='.$categoria->getId().'&pag='.$peliculas->getFirstPage())?>
        <?php echo link_to('&lt;','pelicula/listarPorCategoria?id='.$categoria->getId().'&pag='.$peliculas->getPreviousPage())?>
        <?php $links = $peliculas->getLinks();
            foreach ($links as $page): ?>
                <?php echo ($page == $peliculas->getPage()) ? $page : link_to($page, 'pelicula/listarPorCategoria?id='.$categoria->getId().'&pag='.$page) ?>
                <?php if ($page != $peliculas->getCurrentMaxLink()): ?> / <?php endif ?>
        <?php endforeach ?>
        <?php echo link_to('&gt;','pelicula/listarPorCategoria?id='.$categoria->getId().'&pag='.$peliculas->getNextPage()) ?>
        <?php echo link_to('&raquo;','pelicula/listarPorCategoria?id='.$categoria->getId().'&pag='.$peliculas->getLastPage()) ?>
<?php endif ?>
<!-- 
<table class="table table-striped" >
    <tr>
        <th>Título</th>
        <th>Fecha Estreno</th>
        <th>Actor Principal</th>
        <th>Actor Secundario</th>
        <th>Duración</th>
        <?php //if($sf_user->isAuthenticated()):?>
            <th>Reservar</th>
        <?php //endif;?>
    </tr>    
    <?php // foreach($peliculas as $peli):?>
        <tr>
           <td><a href="<?php //echo url_for(
               //"pelicula/sinopsis?id=".$peli->getId());?>">                    
                <?php //echo $peli->getTitulo();?></td>
           <td><?php //echo $peli->getFechaEstreno("Y-m-d") ?></td>
           <td><?php //echo $peli->getActor1Apell().", ".$peli->getActor1Nom();?></td>
           <td><?php //echo $peli->getActor2Apell().", ".$peli->getActor2Nom();?></td>
           <td><?php //echo $peli->getDuracion() ?></td>
           <?php //if($sf_user->isAuthenticated()):?>
               <td><a href="<?php //echo url_for(
                  //"socio/reservarPelicula?id=".$peli->getId());?>">Reservar</td>
           <?php //endif;?>
        </tr>
    <?php //endforeach;?>
</table>
-->