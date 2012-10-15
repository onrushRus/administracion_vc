<? /* @var $categoria Categoria */?>


<?php foreach($categorias as $categoria):?>
    <?php if($categoria->getId() != 8):?>
        <li><a href="<?php echo url_for(
             "pelicula/listarPorCategoria?id=".$categoria->getId());?>">
                 <?php echo $categoria->getTipo(); ?></li>
    <?php else:?>
         <?php if($sf_user->isAuthenticated()):?>             
             <li><a href="<?php echo url_for(
                 "pelicula/listarPorCategoria?id=".$categoria->getId());?>">
             <?php echo $categoria->getTipo(); ?></li>
         <?php endif;?>
    <?php endif;?>
<?php endforeach;?>

