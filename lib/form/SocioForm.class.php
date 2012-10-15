<?php

/**
 * Socio form.
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
class SocioForm extends BaseSocioForm
{
  public function configure(){
      //Para borrar una variable que yo quiera:      
      //unset($this['activo']);
     /*             
      
      * $this->validatorSchema['e_mail']->setOption('required', false);
      $this->widgetSchema['fecha_nacimiento']->setDefault("06-06-2006");
      $this->widgetSchema['nro_doc']= new sfWidgetFormInputText();
	  $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText();
	  $this->validatorSchema['nro_doc'] = new sfValidatorInteger(); 
	  $this->validatorSchema['e_mail'] = new sfValidatorEmail();
      * 
      */
      
        
      $anios = range(1900,date("Y")-10);      
      $this->widgetSchema['fecha_nacimiento']->setAttribute('class','span2');
      $this->widgetSchema['fecha_nacimiento']->setOption('years',
        array_combine($anios, $anios)
      );
      //seteo las validaciones necesarias      
      //que el dni no sea menor a 6 digitos ni vacio
      $this->validatorSchema['dni']->setOption("min_length",6);
      $this->validatorSchema['dni']->setMessage('required',"El D.N.I. no puede estar vacío");
      $this->validatorSchema['dni']->setMessage('min_length',"El D.N.I. '%value%' es muy corto (minimo %min_length% caracteres)");
      //que el apellido no sea vacio ni menor a 2 caracteres
      $this->validatorSchema['apellido']->setOption("min_length",2);
      $this->validatorSchema['apellido']->setMessage('required',"Falta el apellido");      
      $this->validatorSchema['apellido']->setMessage('min_length',"El apellido '%value%' es muy corto (minimo %min_length% caracteres)");
      //que el nombre no sea vacio ni menor a 3 caracteres
      $this->validatorSchema['nombre']->setOption("min_length",2);
      $this->validatorSchema['nombre']->setMessage('required',"Falta el nombre");      
      $this->validatorSchema['nombre']->setMessage('min_length',"El nombre '%value%' es muy corto (minimo %min_length% caracteres)");
      //la direccion no puede ser vacio
      $this->validatorSchema['direccion']->setOption("min_length",6);
      $this->validatorSchema['direccion']->setMessage('required',"Falta la Dirección");
      $this->validatorSchema['direccion']->setMessage('min_length',"La dirección es muy corta (minimo %min_length% caracteres)");
      //la fecha de nacimiento no puede ser vacia      
      $this->validatorSchema['fecha_nacimiento']->setMessage('required',"La fecha de nacimiento no puede estar vacía (minimo: mayor a 9 años)");
      //el nombre de usuario no puede ser vacio y mas de 4 caracteres
      $this->validatorSchema['usuario']->setOption("min_length",4);
      $this->validatorSchema['usuario']->setMessage('required',"Falta el nombre de Usuario");
      $this->validatorSchema['usuario']->setMessage('min_length',"El nombre '%value%' es muy corto (minimo %min_length% caracteres)");
      //que el password lo trate como ese tipo
      $this->widgetSchema['password']->setAttribute('type','password');
      $this->validatorSchema['password']->setMessage('required',"El password no puede estar vacío!");
      //que el e-mail se tipo e-mail
      $this->validatorSchema['email'] = new sfValidatorEmail();
      $this->validatorSchema['email']->setMessage('required',"El E-Mail no puede estar vacío!");
      $this->validatorSchema['email']->setMessage('invalid',"Debe tener un formato de mail ('nombre@servicio.com')");
      $user = sfContext::getInstance()->getUser();
      if ($user->hasCredential('2')){
         if(!($this->isNew())){
            unset($this['dni']);
            unset($this['usuario']);
            unset($this['password']);         
         }
         unset($this['tipo_socio_id']);
         unset($this['activo']);         
      }    
  }
}
