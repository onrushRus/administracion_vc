<?php

/**
 * Pelicula form.
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
class PeliculaForm extends BasePeliculaForm
{
  public function configure(){                
      
      //genero los rangos para la duración de una pelicula
      $horas = range(0,4);
      $anios = range(1930,date('Y'));
      //seteo el formato de la vista para los valores 
      //de la fecha en span2
      $this->widgetSchema['fecha_estreno']->setAttribute('class','span2');
      $this->widgetSchema['duracion']->setAttribute('class','span1');
      $this->widgetSchema['duracion']->setOption('hours',$horas);
      $this->widgetSchema['fecha_estreno']->setOption('years',
        array_combine($anios, $anios)
      );
      
      //seteo las validaciones necesarias      
      //Titulo no vacio      
      $this->validatorSchema['titulo']->setMessage('required',"El Título de la película no puede estar vacío");
      //Duración no puede ser 0:0 hs.
      $this->validatorSchema['duracion']->setMessage('required',"La duración de la película no puede estar vacía");
      //La fecha de estreno no puede ser vacía
      $this->validatorSchema['fecha_estreno']->setMessage('required',"La Fecha de Estreno de la película no puede estar vacía");
      //La Sinopsis no puede ser vacía, ya que es información para cualquiera
      $this->validatorSchema['sinopsis']->setOption("min_length",25);
      $this->validatorSchema['sinopsis']->setMessage('min_length',"La sinopsis es muy corta (minimo %min_length% caracteres)");
      $this->validatorSchema['sinopsis']->setMessage('required',"La Sinopsis de la película no puede estar vacía!");      
      $user = sfContext::getInstance()->getUser();
      if ($user->hasCredential('2')){          
          unset($this['estado']);                            
      }
  }
}
