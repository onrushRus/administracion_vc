<?php

/**
 * login actions.
 *
 * @package    tp2
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{    
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request){
     
     //si viene prametros del POST   
     if($request->isMethod(sfWebRequest::POST)){
          $usuario = $request->getParameter("user"); //obtengo el usuario ingresado
          $pass = $request->getParameter("pass"); //obtengo el password del usuario
                    
          if (($usuario !='') AND ($pass !='')){  //si ninguno es cadena vacia
                //obtengo el usurio correcto o vacio si no hay alguno con ese user y pass
                $user = $this->esLoginCorrecto($usuario,$pass);                
                if (!empty($user)){ //Compruebo si encontro un usuario correcto
                    $this->getUser()->iniciarSesion($user); //Si son correctos, inicio sesion
                    return $this->redirect('@homepage'); //vuelvo a cargar el home
                }else{
                    //
                    //$this->getUser()->setErrorLogin("Login incorrecto");
                    $this->mje = "Usuario o Password Incorrectos";                    
                    return sfView::ERROR;
                }                
          }else{
              //
              //$this->getUser()->setErrorLogin( "Debe completar los campos 'Usuario' y 'Password'");
              $this->mje = "Usuario y/o Password Vacíos";
              return sfView::ERROR;
          }
       }
           
  }
           
  private function esLoginCorrecto($usuario,$pass){  
      $user_ok = SocioQuery::create();
      $user_ok->filterByUsuario($usuario);
      $user_ok->filterByPassword(md5($pass));
      $usr = $user_ok->findOne();      
      return $usr;            
  }    
 
  public function executeLogout(sfWebRequest $request){
      $this->getUser()->cerrarSesion();      
      return $this->redirect('@homepage');
  }
       
}
