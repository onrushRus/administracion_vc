<?php

/**
 * Pelicula form base class.
 *
 * @method Pelicula getObject() Returns the current form's model object
 *
 * @package    tp2
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePeliculaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'titulo'        => new sfWidgetFormInputText(),
      'duracion'      => new sfWidgetFormTime(),
      'fecha_estreno' => new sfWidgetFormDate(),
      'estreno'       => new sfWidgetFormInputCheckbox(),
      'actor1_nom'    => new sfWidgetFormInputText(),
      'actor1_apell'  => new sfWidgetFormInputText(),
      'actor2_nom'    => new sfWidgetFormInputText(),
      'actor2_apell'  => new sfWidgetFormInputText(),
      'categoria_id'  => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => false)),
      'estado'        => new sfWidgetFormPropelChoice(array('model' => 'EstadoPelicula', 'add_empty' => false)),
      'sinopsis'      => new sfWidgetFormTextarea(),
      'imagen'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'titulo'        => new sfValidatorString(array('max_length' => 45)),
      'duracion'      => new sfValidatorTime(),
      'fecha_estreno' => new sfValidatorDate(),
      'estreno'       => new sfValidatorBoolean(),
      'actor1_nom'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'actor1_apell'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'actor2_nom'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'actor2_apell'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'categoria_id'  => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id')),
      'estado'        => new sfValidatorPropelChoice(array('model' => 'EstadoPelicula', 'column' => 'id')),
      'sinopsis'      => new sfValidatorString(),
      'imagen'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pelicula[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pelicula';
  }


}
