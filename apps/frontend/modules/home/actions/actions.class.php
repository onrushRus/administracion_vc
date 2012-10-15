<?php

/**
 * home actions.
 *
 * @package    tp2
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */   
  public function executeIndex(sfWebRequest $requets){
    $this->corroborarReservas();
    $consulta = PeliculaQuery::create();
    $consulta->filterByEstreno(true);
    if(!($this->getUser()->isAuthenticated())){
        //si no esta autenticado, no puede ver ls XXX
        $consulta->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);        
    }else{
        //si esta autenticado pero es menor de 18 no ve las XXX
        if($this->getUser()->getAttribute('edad')<18){
            $consulta->filterByCategoriaId(8, Criteria::ALT_NOT_EQUAL);
        }
    }
    $this->peliculas_estrenos = $consulta->find();    
  }    
  
  private function corroborarReservas(){      
      $reservas = array();
      //seteo el maximo tiempo de reserva de pelicula
      $max_time = date('00:30:00');
      //obtengo la hora ctual      
      $ahora = date('H:i:s');      
      //me fijo todas las reservas que no expiraron
      $con = ReservasQuery::create();
      $con->filterByExpiroReserva(false);
      $reservas = $con->find();
      foreach($reservas as $res){
          $hora_res = $res->getHoraReserva();
          $h2 = $this->hora_a_segundos($hora_res);
          $h1 = $this->hora_a_segundos($ahora);          
          $dif=($h1-$h2);
          $dif = $this->segundos_a_hora($dif);                    
          if($dif > $max_time){
              //updateo la base de datos cn las reservas expiradas
              $res_exp = ReservasQuery::create();
              $res_exp->filterById($res->getId());
              $res_exp->update(array('ExpiroReserva' => true));              
          }
      }
  }

  private function restaHoras($horaIni, $horaFin){
    return (date("H:i:s",strtotime($horaFin) - strtotime($horaIni) ));
  }

  function hora_a_segundos($hora){
	/*
	 *	recibe: 	hora en formato hh:mm:ss
	 * 	devuelve: 	total de segundos de $hora 
	 */
		$arrayHora=explode(':',$hora);
		$segundos=($arrayHora[0]*3600)+($arrayHora[1]*60)+$arrayHora[2];
	return $segundos;
  }

  function segundos_a_hora($segundos){
	/*
	 *	recibe: 	x Segundos
	 * 	devuelve: 	en formato hora hh:mm:ss 
	 */
		$hora=intval($segundos/3600);
		if($hora<10)
			$hora="0$hora";		
		$minutos=intval(($segundos%3600)/60);
		if($minutos<10)
			$minutos="0$minutos";		
		$segundos=intval(($segundos%3600)%60);
		if($segundos<10)
			$segundos="0$segundos";	
		$format='%s:%s:%s';
		$hora=sprintf("$format",$hora,$minutos,$segundos);	
	return $hora;
  }
  
  public function executeQuienesSomos(sfWebRequest $requets){
      
  }
  
}
