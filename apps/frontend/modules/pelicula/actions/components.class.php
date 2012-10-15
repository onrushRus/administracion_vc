<? /* @var $categoria Categoria */?>
<?php

class peliculaComponents extends sfComponents {

  public function executeObtCategorias() {    
    $categ=CategoriaQuery::create();    
    $this->categorias = $categ->find();
  }
         

}











