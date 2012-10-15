<?php

/**
 * socio actions.
 *
 * @package    tp2
 * @subpackage socio
 * @author     Your name here
 */
class socioActions extends sfActions{
    
  public function executeIndex(sfWebRequest $request){
    $this->elegido = array();    
    //busco todas las peliculas para la simulacion del AJAX del form
    $consulta = SocioQuery::create();
    $consulta->filterByActivo(true);
    $consulta->orderById(Criteria::DESC);
    $consulta->groupByApellido();
    $this->socios = $consulta->find();
    //si viene algo por el POST
    if($request->isMethod(sfWebRequest::POST)){        
        //guardo el id de esa pelicula
        $apellido = $request->getParameter('apellido');
        //si no esta vacío el id, filtro por esa campo
        if((!empty($apellido)) || ($apellido != '*')){
            //creo otra consulta
            $consulta2 = SocioQuery::create();
            $consulta2->filterByApellido($apellido);
            $this->elegido = $consulta2->find();              
        }
    }          
  }

  public function executeNew(sfWebRequest $request){           
            $this->form = new SocioForm();
  }

  public function executeCreate(sfWebRequest $request){
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new SocioForm();    
    $this->processForm($request, $this->form);    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request){
    $Socio = SocioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Socio, sprintf('El Socio no Existe (%s).', $request->getParameter('id')));
    $this->form = new SocioForm($Socio);
  }

  public function executeUpdate(sfWebRequest $request){
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $Socio = SocioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Socio, sprintf('El Socio no Existe (%s).', $request->getParameter('id')));
    $cred = $this->getCredential();    
    $this->form = new SocioForm($Socio);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request){
    $request->checkCSRFProtection();
    $Socio = SocioQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($Socio, sprintf('El Socio no Existe (%s).', $request->getParameter('id')));
    $Socio->delete();
    $this->redirect('socio/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()){      
      $Socio = $form->save();
      $this->redirect('socio/edit?id='.$Socio->getId());
    }
  }
  
  public function executePeliculasReservadas(sfWebRequest $requets){    
    $this->socio = array();
    $this->reservas = array();
    //busco todas los socios para la simulacion del AJAX del form
    $consulta = SocioQuery::create();    
    $consulta->filterByActivo(true);
    $consulta->orderById(Criteria::DESC);
    $this->socios = $consulta->find();
    //si viene algo por el POST
    if($requets->isMethod(sfWebRequest::POST)){        
        //guardo el dni del socio ingresado
        $dni = $requets->getParameter('dni');
        //si no esta vacío el dni, filtro por esa campo
        if((!empty($dni)) && ($dni != '*')){
            //creo otra consulta para encontrar el socio con ese dni
            $consulta2 = SocioQuery::create();
            $consulta2->filterByDni($dni);
            $socio = $consulta2->findOne();            
            $this->socio = $socio;
            //Guardo el socio en la variable            
            $socId = $socio->getId();
            $this->idsoc = $socId;
            //creo otra consulta para ver las reservas de ese socio            
            $consulta3 = ReservasQuery::create();
            $consulta3->usePeliculaQuery();
            $consulta3->filterBySocioId($socId);
            $consulta3->filterByExpiroReserva(false);
            $consulta3->filterByAlquilada(false);
            $this->reservas = $consulta3->find();
        }
    }                      
  }
  
  public function corroborarHorario(){
      //obtengo los horarios 
      
      
      /*$tm_on = $con->getLadTmOn();
      $tm_off = $con->getLadTmOff();
      $tt_on = $con->getLadTtOn();
      $tt_off = $con->getLadTtOff();*/
      //$ahora = date('H:i:s');      
  }
  
  private function peliculaLibre($id_peli){
      $con = PeliculaQuery::create()
             ->filterById($id_peli)             
             ->findOne();      
      $estado = $con->getEstado();      
      if ($estado == 1){
          return true;
      }else{
          return false;
      }            
  }

  public function executeReservarPelicula(sfWebRequest $request){
     if($request->hasParameter('id')){
        //$this->corroborarHorario();
        $peli = $request->getParameter('id');
        if((!empty($peli)) && ($this->peliculaLibre($peli))){
            $Socio_id = $this->getUser()->getAttribute('id');
            //consulto si ya tiene reservas hechas
            $ver = ReservasQuery::create();
            $ver->filterBySocioId($Socio_id)
                ->filterByExpiroReserva(false)
                ->filterByAlquilada(false)
                ->find();
            $cant = $ver->count()+1;
            $this->cant = $cant;
            //si tiene menos de 3 peliculas reservadas sin alquilar
            if ($cant<=4){
                //creo la nueva reserva y le ingreso los datos
                $reserva = new Reservas();
                $reserva->setSocioId($Socio_id);
                $reserva->setPeliculaId($peli);
                $reserva->setFechaReserva(date('d-m-Y'));
                $reserva->setHoraReserva(time('H:i:s'));
                $reserva->setExpiroReserva(false);
                $reserva->setAlquilada(false);
                $reserva->save();
                //guardo la reserva y mando mje
                $this->mje = "Pelicula Reservada con exito!";
                //creo un objeto Pelicula
                $act_peli = new Pelicula();
                //busco la pelicula reservada para cambiar el estado
                $consulta = PeliculaQuery::create()
                        ->filterById($peli)
                        ->find();
                //obtengo la pelicula buscada
                $act_peli=$consulta->getFirst();
                //le cambio el estado
                $act_peli->setEstado(2);
                //guardo el cambio
                $act_peli->save();
                if($cant == 4){
                    $this->mje = "Pelicula reservada con Exito!
                        Alcanzó el limite de reservas por favor alquile
                        o cancele las reservas para poder reservar 
                        nuevas peliculas, gracias.";
                }
            }else{
                    $this->mje = "Pelicula No Reservada, superó
                        el maximo de reservas posibles!";
                    return sfView::ERROR;
            }
            
        }else{
            //Si el id que viene es null o vacio o erroneo
            $this->mje = "Error de identificacion de pelicula!
                No existe o ya esta reservada o alquilada!";
            return sfView::ERROR;
        }
     }else{
         return $this->redirect('@homepage'); //vuelvo a cargar el home
     }
  }
      
  public function executeReservadas(sfWebRequest $request){
      $socio = $this->getUser()->getAttribute('id');  
      $con = ReservasQuery::create();
      $con->usePeliculaQuery();
      $this->reservas = $con->filterBySocioId($socio)
          ->filterByExpiroReserva(false)
          ->filterByAlquilada(false)          
          ->find();                      
  }
  
  public function executeBorrarReservas(sfWebRequest $request){
      if ($request->isMethod(sfWebRequest::POST)){
          //obtengo el id de la reserva a borrar
          $id_reserva = $request->getParameter('id');
          //obtengo el id de la pelicula para cambiar el estado
          $id_peli = $request->getParameter('pel_id');          
          //borro la reserva de la tabla
          $con = ReservasQuery::create();
          $con->filterById($id_reserva)
              ->filterByExpiroReserva(false)
              ->filterByAlquilada(false)
              ->delete();
          //cambio el estado de la pelicula de 'reserva' a 'libre'
          $obt = PeliculaQuery::create()
                ->filterById($id_peli)
                ->update(array('Estado'=> true));
      }      
  }

  private function peliculaAlquilada($id_peli){
      $con = PeliculaQuery::create()
             ->filterById($id_peli)             
             ->findOne();      
      $estado = $con->getEstado();      
      if ($estado == 3){
          return true;
      }else{
          return false;
      }            
  }
  
  public function executeAlquilarPeliculas(sfWebRequest $request){
      //obtengo socio y todas las peliculas que alquila
      $peliculasId = array();
      $peliculasId = $request->getParameter("id_pelis");
      $socio = $request->getParameter("id_socio");
      
      //calculo precio total
      $total_a_cobrar = (sizeof($peliculasId) * 8);
      
      //corroboro que las peliculas esten todas libres
      $todo_bien = true;
      foreach($peliculasId as $peli_id){ 
          if(($this->peliculaAlquilada($peli_id))){
              $todo_bien = false;
          }
      }
     
      if($todo_bien){
            //cargo el alquiler en la base
            $alquiler = new Alquiler();
            $alquiler->setFechaAlquiler(date("d-m-Y"));
            $alquiler->setTotalACobrar($total_a_cobrar);
            $alquiler->setSocioId($socio);
            $alquiler->save();

            //capturo el id de la reserva
            $id_alquiler = $alquiler->getId();

            foreach($peliculasId as $peli_id){          
                    //cargo el alquiler en socio_alquiler
                    $socio_alquiler = new SocioAlquiler();
                    $socio_alquiler->setAlquilerId($id_alquiler);
                    $socio_alquiler->setPeliculaId($peli_id);
                    $socio_alquiler->save();

                    //marco las peliculas como alquiladas
                    $pelicula_alquilada = PeliculaQuery::create()
                                            ->filterById($peli_id)
                                            ->update(array('Estado' => 3));

                    //marco la reserva como alquilada
                    $reserva = ReservasQuery::create()
                                ->filterByPeliculaId($peli_id)
                                ->filterBySocioId($socio)
                                ->filterByAlquilada(false)
                                ->filterByExpiroReserva(false)
                                ->update(array('Alquilada' => true));      
                    $this->mje = "Las peliculas: se alquilaron correctamente!!";         
            }
      }else{
          $this->mje = "Las peliculas NO se alquilaron!!";
          return sfView::ERROR;
      }
      
  }
  
  public function executeHistorial(sfWebRequest $request){                  
      //consulto si esta logueado un usuario
      if($this->getUser()->isAuthenticated()){                            
          //si esta logueado, obtengo su Id de socio
          $socId = $this->getUser()->getAttribute('id');
          
          $paginacion = new sfPropelPager('Alquiler', 5);
          $sql = new Criteria();
          $sql->add(AlquilerPeer::SOCIO_ID,$socId,Criteria::EQUAL);          
          $sql->addDescendingOrderByColumn(AlquilerPeer::FECHA_ALQUILER);
          $paginacion->setCriteria($sql);
          $paginacion->setPage($this->getRequestParameter('pag', 1));
          $paginacion->init();
          $this->alquileres = $paginacion;
                    
      }                                             
  }
}
