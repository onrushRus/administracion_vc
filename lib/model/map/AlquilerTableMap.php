<?php



/**
 * This class defines the structure of the 'alquiler' table.
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
class AlquilerTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AlquilerTableMap';

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
		$this->setName('alquiler');
		$this->setPhpName('Alquiler');
		$this->setClassname('Alquiler');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('FECHA_ALQUILER', 'FechaAlquiler', 'TIMESTAMP', true, null, null);
		$this->addColumn('FECHA_DEVOLUCION', 'FechaDevolucion', 'TIMESTAMP', false, null, null);
		$this->addColumn('TOTAL_A_COBRAR', 'TotalACobrar', 'DECIMAL', true, null, null);
		$this->addForeignKey('SOCIO_ID', 'SocioId', 'INTEGER', 'socio', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Socio', 'Socio', RelationMap::MANY_TO_ONE, array('socio_id' => 'id', ), null, null);
		$this->addRelation('SocioAlquiler', 'SocioAlquiler', RelationMap::ONE_TO_MANY, array('id' => 'alquiler_id', ), null, null, 'SocioAlquilers');
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

} // AlquilerTableMap
