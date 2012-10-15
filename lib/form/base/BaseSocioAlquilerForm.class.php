<?php

/**
 * SocioAlquiler form base class.
 *
 * @method SocioAlquiler getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSocioAlquilerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'alquiler_id' => new sfWidgetFormPropelChoice(array('model' => 'Alquiler', 'add_empty' => false)),
      'pelicula_id' => new sfWidgetFormPropelChoice(array('model' => 'Pelicula', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'alquiler_id' => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'id')),
      'pelicula_id' => new sfValidatorPropelChoice(array('model' => 'Pelicula', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('socio_alquiler[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SocioAlquiler';
  }


}
