<?php

/**
 * TipoSocio form base class.
 *
 * @method TipoSocio getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoSocioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tipo_socio' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tipo_socio' => new sfValidatorString(array('max_length' => 25)),
    ));

    $this->widgetSchema->setNameFormat('tipo_socio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoSocio';
  }


}
