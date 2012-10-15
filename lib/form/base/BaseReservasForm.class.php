<?php

/**
 * Reservas form base class.
 *
 * @method Reservas getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseReservasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'socio_id'       => new sfWidgetFormPropelChoice(array('model' => 'Socio', 'add_empty' => false)),
      'pelicula_id'    => new sfWidgetFormPropelChoice(array('model' => 'Pelicula', 'add_empty' => false)),
      'fecha_reserva'  => new sfWidgetFormDate(),
      'hora_reserva'   => new sfWidgetFormTime(),
      'expiro_reserva' => new sfWidgetFormInputCheckbox(),
      'alquilada'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'socio_id'       => new sfValidatorPropelChoice(array('model' => 'Socio', 'column' => 'id')),
      'pelicula_id'    => new sfValidatorPropelChoice(array('model' => 'Pelicula', 'column' => 'id')),
      'fecha_reserva'  => new sfValidatorDate(),
      'hora_reserva'   => new sfValidatorTime(array('required' => false)),
      'expiro_reserva' => new sfValidatorBoolean(array('required' => false)),
      'alquilada'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reservas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reservas';
  }


}
