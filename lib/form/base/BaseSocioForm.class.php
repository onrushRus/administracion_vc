<?php

/**
 * Socio form base class.
 *
 * @method Socio getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSocioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'dni'              => new sfWidgetFormInputText(),
      'nombre'           => new sfWidgetFormInputText(),
      'apellido'         => new sfWidgetFormInputText(),
      'direccion'        => new sfWidgetFormInputText(),
      'tel_cel'          => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'usuario'          => new sfWidgetFormInputText(),
      'password'         => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'tipo_socio_id'    => new sfWidgetFormPropelChoice(array('model' => 'TipoSocio', 'add_empty' => false)),
      'activo'           => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'dni'              => new sfValidatorString(array('max_length' => 10)),
      'nombre'           => new sfValidatorString(array('max_length' => 20)),
      'apellido'         => new sfValidatorString(array('max_length' => 25)),
      'direccion'        => new sfValidatorString(array('max_length' => 45)),
      'tel_cel'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDate(),
      'usuario'          => new sfValidatorString(array('max_length' => 25)),
      'password'         => new sfValidatorString(),
      'email'            => new sfValidatorString(array('max_length' => 40)),
      'tipo_socio_id'    => new sfValidatorPropelChoice(array('model' => 'TipoSocio', 'column' => 'id')),
      'activo'           => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('socio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Socio';
  }


}
