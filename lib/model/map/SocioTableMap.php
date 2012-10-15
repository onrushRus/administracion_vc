<?php



/**
 * This class defines the structure of the 'socio' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SocioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SocioTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('socio');
		$this->setPhpName('Socio');
		$this->setClassname('Socio');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DNI', 'Dni', 'VARCHAR', true, 10, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 20, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 25, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 45, null);
		$this->addColumn('TEL_CEL', 'TelCel', 'VARCHAR', false, 10, null);
		$this->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'DATE', true, null, null);
		$this->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 25, null);
		$this->addColumn('PASSWORD', 'Password', 'LONGVARCHAR', true, null, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 40, null);
		$this->addForeignKey('TIPO_SOCIO_ID', 'TipoSocioId', 'INTEGER', 'tipo_socio', 'ID', true, null, 3);
		$this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', true, 1, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('TipoSocio', 'TipoSocio', RelationMap::MANY_TO_ONE, array('tipo_socio_id' => 'id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('Alquiler', 'Alquiler', RelationMap::ONE_TO_MANY, array('id' => 'socio_id', ), null, null, 'Alquilers');
		$this->addRelation('Comentario', 'Comentario', RelationMap::ONE_TO_MANY, array('id' => 'socio_id', ), null, null, 'Comentarios');
		$this->addRelation('Reservas', 'Reservas', RelationMap::ONE_TO_MANY, array('id' => 'socio_id', ), null, null, 'Reservass');
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // SocioTableMap
