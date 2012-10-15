<?php

/**
 * Categoria form base class.
 *
 * @method Categoria getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'tipo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tipo' => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }


}
