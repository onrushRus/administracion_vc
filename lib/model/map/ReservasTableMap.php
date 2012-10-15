<?php



/**
 * This class defines the structure of the 'reservas' table.
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
class ReservasTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ReservasTableMap';

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
		$this->setName('reservas');
		$this->setPhpName('Reservas');
		$this->setClassname('Reservas');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SOCIO_ID', 'SocioId', 'INTEGER', 'socio', 'ID', true, null, null);
		$this->addForeignKey('PELICULA_ID', 'PeliculaId', 'INTEGER', 'pelicula', 'ID', true, null, null);
		$this->addColumn('FECHA_RESERVA', 'FechaReserva', 'DATE', true, null, null);
		$this->addColumn('HORA_RESERVA', 'HoraReserva', 'TIME', false, null, null);
		$this->addColumn('EXPIRO_RESERVA', 'ExpiroReserva', 'BOOLEAN', false, 1, null);
		$this->addColumn('ALQUILADA', 'Alquilada', 'BOOLEAN', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Socio', 'Socio', RelationMap::MANY_TO_ONE, array('socio_id' => 'id', ), null, null);
		$this->addRelation('Pelicula', 'Pelicula', RelationMap::MANY_TO_ONE, array('pelicula_id' => 'id', ), null, null);
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

} // ReservasTableMap
