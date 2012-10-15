<?php /* @var $usuario Socio */ ?>
<?php

class myUser extends sfBasicSecurityUser{
    
    protected $usuario_db;


    public function iniciarSesion($usuario){                
        //guardo el objeto usuario en la sesion
        $this->setUsuarioDB($usuario);
        //$this->usuario_db = $user;        
        
        $anio_socio = $usuario->getFechaNacimiento('Y');
        $anio_socio = date('Y')-$anio_socio;
        $this->setAttribute('edad', $anio_socio);
        //seteo la credencial de usuario
        $this->addCredential($usuario->getTipoSocioId());        
        //Seteo el atributo "nombre" del usuario
        $this->setAttribute("user", $usuario->getNombre());
        //Seteo el atributo "dni" del usuario
        $this->setAttribute("id", $usuario->getId());
        //autentico el usuario.
        $this->setAuthenticated(true);
    }
    
    public function getUsuarioDB(){
        return $this->usuario_db;
    }

    public function setUsuarioDB($user){
        $this->usuario_db = $user;
    }
    
    public function cerrarSesion(){       
        $this->getAttributeHolder()->clear();
        $this->setAuthenticated(false);
        $this->clearCredentials();
    }
    
    public function setErrorLogin($msj){
        $this->setAttribute('error_login',$msj);        
    }
    
    public function getErrorLogin(){
        return $this->getAttribute('error_login',"");        
    }
    
    public function removerErrorLogin(){
        $this->getAttributeHolder()->remove('error_login');
    }        
    
}
