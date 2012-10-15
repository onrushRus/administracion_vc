<?php

/**
 * pelicula actions.
 *
 * @package    tp2
 * @subpackage pelicula
 * @author     Your name here
 */
class peliculaActions extends sfActions{
    
  public function executeIndex(sfWebRequest $requets){
    
    $this->elegida = array();
    $consulta = PeliculaQuery::create();    
    //busco todas las peliculas para la simulacion del AJAX del form    
    //$consulta->filterByEstado(1);
    $consulta->groupByTitulo();    
    $consulta->orderById(Criteria::DESC);    
    $this->peliculas = $consulta->find();
    //si viene algo por el POST
    if($requets->isMethod(sfWebRequest::POST)){        
        //guardo el id de esa pelicula
        $titulo = $requets->getParameter('titulo');
        //si no esta vacío el id, filtro por esa campo
        if(!empty($titulo)){
            //creo otra consulta
            $consulta2 = PeliculaQuery::create();
            $consulta2->filterByTitulo($titulo);
            $this->elegida = $consulta2->find();              
        }
    }    
  }

  private function obtener_categorias(){
      $categorias = CategoriaQuery::create();     
      return $categorias->find();
  }

  public function executeListarPorCategoria(sfWebRequest $requets){        
        $cat = $requets->getParameter('id');
        $nomCat = CategoriaQuery::create();
        $nomCat->filterById($cat);
        $this->categoria = $nomCat->findOne();

        //logica de negocio: no_autenticados o menores NO xxx
        if ($cat == 8){
          if(!$this->getUser()->isAuthenticated()){
              $this->mje = "Usted no esta logueado, no puede acceder a esta sección!";
              return sfView::ERROR;
          }else{
            $edad = $this->getUser()->getAttribute('edad');
            if($edad < 18){
                $this->mje = "Usted es menor de edad y no puede acceder a esta sección!";
                return sfView::ERROR;
            }
          }
        }
        //10 es el numero de registros que deseo mostrar
        $paginacion = new sfPropelPager('Pelicula', 10);
        $sql = new Criteria();        
        $sql->add(PeliculaPeer::CATEGORIA_ID,$cat,Criteria::EQUAL);
        $sql->addAscendingOrderByColumn(PeliculaPeer::TITULO);
        $sql->addGroupByColumn(PeliculaPeer::TITULO);
        $paginacion->setCriteria($sql);
        $paginacion->setPage($this->getRequestParameter('pag', 1));
        $paginacion->init();
        $this->peliculas = $paginacion;
        
      
      /*$cat = $requets->getParameter('id');
      $nomCat = CategoriaQuery::create();
      $nomCat->filterById($cat);
      $this->categoria = $nomCat->findOne();
      if ($cat == 8){
          if(!$this->getUser()->isAuthenticated()){
              $this->mje = "Usted no esta logueado, no puede acceder a esta sección!";
              return sfView::ERROR;
          }else{
            $edad = $this->getUser()->getAttribute('edad');
            if($edad < 18){
                $this->mje = "Usted es menor de edad y no puede acceder a esta sección!";
                return sfView::ERROR;
            }
          }
      }
      $this->peliculas = PeliculaQuery::create()
              ->filterByEstado('1')
              ->filterByCategoriaId($cat)
              ->groupByTitulo()
              ->find();
       * 
       */
  }    

  public function executeSinopsis(sfWebRequest $requets){
      $peli = $requets->getParameter('id');
      $aux = PeliculaQuery::create();            
      if(!($this->getUser()->isAuthenticated())){
        //si no esta autenticado, no puede ver ls XXX
        $aux->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);        
      }else{
        //si esta autenticado pero es menor de 18 no ve las XXX
        if($this->getUser()->getAttribute('edad')<18){
            $aux->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);
        }
      }
      
      $this->pelicula = $aux->findById($peli);
      /*
      $com = ComentarioQuery::create()
             ->orderByFecha(Criteria::ASC)
             ->useSocioQuery()             
             ->find();
      $this->comentarios = $com;
      if($this->getUser()->isAuthenticated()){
          $this->nuevoComentario();
      }*/
      
  }
  
  public function nuevoComentario(){
      $new = new Comentario();      
  }


  public function executeModificarEstrenos(sfWebRequest $requets){
      if($this->getUser())
      //cargo todas la peliculas para ver cuales son los estrenos
      if($requets->isMethod(sfWebRequest::POST)){
          //si vino algo por el POST (boton Modificar de la VIEW)
          $this->borrarEstrenos();//no dejo ningun estreno
          //crago los nuevos estrenos en la BD
          $id_pelis = array();
          $id_pelis = $this->getRequest()->getParameter("id");
          $pelicula_query = PeliculaQuery::create()
                            ->filterById($id_pelis)
                            ->update(array('Estreno' => True));                        
      }                   
      $this->peliculas = PeliculaQuery::create()
                  ->orderById(Criteria::DESC)
                  ->groupByTitulo()              
                  ->find();      
  }
  
  private function borrarEstrenos(){      
      //busco en la BD todos los estrenos y los
      //desmarco de "estrenos"
      $pelis = PeliculaQuery::create();
      $peliculas = $pelis->filterByEstreno(true)
                         ->update(array('Estreno' => False));            
  }

  public function executeAlquiladas(sfWebRequest $requets){
      //defino a mostrar 15 alquileres sin devolver
      $paginacion = new sfPropelPager('Alquiler', 15);
      $nu = null;
      $sql = new Criteria();
      $sql->add(AlquilerPeer::FECHA_DEVOLUCION,$nu, Criteria::ISNULL);
      $paginacion->setCriteria($sql);
      $paginacion->setPage($this->getRequestParameter('pag', 1));      
      $paginacion->init();
      
      $this->peliculas = $paginacion;            
      
      /*$peliculas = array();
      $con = AlquilerQuery::create();
      $con->useSocioQuery();      
      $con->filterByFechaDevolucion(NULL);
      $this->peliculas = $con->find();                  
       * 
       */
  }    
  
  public function executeAbonarDeuda(sfWebRequest $request) {
      $id_alq = $request->getParameter('id');
      $valor = $request->getParameter('monto');
      $con = AlquilerQuery::create()
             ->filterById($id_alq)
              ->update(array('TotalACobrar' => $valor));
      //echo url_for('pelicula/devolverPeliculas?id_alq'.$id_alq);
      return $this->redirect('pelicula/devolverPeliculas?id_alq='.$id_alq);
  }
  
  public function executeDevolverPeliculas(sfWebRequest $requets){
      $id_alquiler = $requets->getParameter('id_alq');
      $this->idAlq = $id_alquiler;
      //busco el alquiler segun su id
      $consulta = AlquilerQuery::create()
              ->filterById($id_alquiler)
              ->update(array('FechaDevolucion' => date('d-m-Y')));
      //busco las peliculas devueltas para cambiar su estado
      $consulta2 = SocioAlquilerQuery::create()
              ->filterByAlquilerId($id_alquiler)
              ->find();
      $pelis_alq = $consulta2;
      //actualizo el estado de las peliculas a 'Libre'
      foreach($pelis_alq as $peli){                  
                  $con = PeliculaQuery::create()
                        ->filterById($peli->getPeliculaId())
                        ->update(array('Estado' => 1));      
      }
      
      //obtengo el alquiler para ver la fecha que fue alquilada
      $consulta2 = AlquilerQuery::create()
              ->filterById($id_alquiler)
              ->findOne();
      $fecha_dev = new DateTime($consulta2->getFechaDevolucion());
      $fecha_alq = new DateTime($consulta2->getFechaAlquiler());
      
      $this->precio = $consulta2->getTotalACobrar();
      
      //obtengo la diferencia de los dias desde el alquiler
      //$fecha_alq = new DateTime(date('Y-m-d'));
      //$fecha_dev = new DateTime();
      $dif = $fecha_alq->diff($fecha_dev);
      $dias = (int)$dif->format('%a');      
      $this->dias = $dias;      
      $this->mje = "Devolución aceptada!";
      $this->mje_ok = "Devolución aceptada! (no registra deuda)";
  }


  public function executeSegunEstados(sfWebRequest $requets){
      
  }
  
  public function executeBuscarPelicula(sfWebRequest $requets){    
    $this->elegida = array();
    //busco todas las peliculas para la simulacion del AJAX del form
    $consulta = PeliculaQuery::create();
    $consulta->filterByEstado(1);
    //filtro las acteg. que se pueden mostrar segun el usuario
    if(!($this->getUser()->isAuthenticated())){
        //si no esta autenticado, no puede ver ls XXX
        $consulta->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);        
    }else{
        //si esta autenticado pero es menor de 18 no ve las XXX
        if($this->getUser()->getAttribute('edad')<18){
            $consulta->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);
        }
    }
    $consulta->orderById(Criteria::DESC);
    $consulta->groupByTitulo();
    $this->peliculas = $consulta->find();
    //si viene algo por el POST
    if($requets->isMethod(sfWebRequest::POST)){        
        //guardo el titulo de esa pelicula
        $titulo = $requets->getParameter('titulo');
        //si no esta vacío el id, filtro por esa campo
        if((!empty($titulo)) && ($titulo != '*')){
            //creo otra consulta
            $consulta2 = PeliculaQuery::create();
            $consulta2->filterByTitulo($titulo);
            $consulta2->groupByTitulo();
            if(!($this->getUser()->isAuthenticated())){
                //si no esta autenticado, no puede ver ls XXX
                $consulta2->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);        
            }else{
                //si esta autenticado pero es menor de 18 no ve las XXX
                if($this->getUser()->getAttribute('edad')<18){
                    $consulta2->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);
                }
            }            
            $this->elegida = $consulta2->find();              
        }
    }
    
  }
  
  public function executeNew(sfWebRequest $request){
    $this->form = new PeliculaForm();
  }

  public function executeCreate(sfWebRequest $request){
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PeliculaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $Pelicula = PeliculaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pelicula, sprintf('Object Pelicula does not exist (%s).', $request->getParameter('id')));
    $this->form = new PeliculaForm($Pelicula);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Pelicula = PeliculaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pelicula, sprintf('Object Pelicula does not exist (%s).', $request->getParameter('id')));
    $this->form = new PeliculaForm($Pelicula);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $Pelicula = PeliculaQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Pelicula, sprintf('Object Pelicula does not exist (%s).', $request->getParameter('id')));
    $Pelicula->delete();

    $this->redirect('pelicula/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()){
      $Pelicula = $form->save();
      $this->redirect('pelicula/edit?id='.$Pelicula->getId());
    }
  }
}
