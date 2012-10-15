<?php

/**
 * Alquiler form base class.
 *
 * @method Alquiler getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAlquilerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'fecha_alquiler'   => new sfWidgetFormDateTime(),
      'fecha_devolucion' => new sfWidgetFormDateTime(),
      'total_a_cobrar'   => new sfWidgetFormInputText(),
      'socio_id'         => new sfWidgetFormPropelChoice(array('model' => 'Socio', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'fecha_alquiler'   => new sfValidatorDateTime(),
      'fecha_devolucion' => new sfValidatorDateTime(array('required' => false)),
      'total_a_cobrar'   => new sfValidatorNumber(),
      'socio_id'         => new sfValidatorPropelChoice(array('model' => 'Socio', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('alquiler[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alquiler';
  }


}
