<?php

/**
 * EstadoPelicula form base class.
 *
 * @method EstadoPelicula getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEstadoPeliculaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'estado' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'estado' => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('estado_pelicula[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoPelicula';
  }


}
