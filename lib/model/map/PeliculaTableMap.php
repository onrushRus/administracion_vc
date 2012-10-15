<?php



/**
 * This class defines the structure of the 'pelicula' table.
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
class PeliculaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PeliculaTableMap';

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
		$this->setName('pelicula');
		$this->setPhpName('Pelicula');
		$this->setClassname('Pelicula');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 45, null);
		$this->addColumn('DURACION', 'Duracion', 'TIME', true, null, null);
		$this->addColumn('FECHA_ESTRENO', 'FechaEstreno', 'DATE', true, null, null);
		$this->addColumn('ESTRENO', 'Estreno', 'BOOLEAN', true, 1, null);
		$this->addColumn('ACTOR1_NOM', 'Actor1Nom', 'VARCHAR', false, 20, null);
		$this->addColumn('ACTOR1_APELL', 'Actor1Apell', 'VARCHAR', false, 20, null);
		$this->addColumn('ACTOR2_NOM', 'Actor2Nom', 'VARCHAR', false, 20, null);
		$this->addColumn('ACTOR2_APELL', 'Actor2Apell', 'VARCHAR', false, 20, null);
		$this->addForeignKey('CATEGORIA_ID', 'CategoriaId', 'INTEGER', 'categoria', 'ID', true, null, null);
		$this->addForeignKey('ESTADO', 'Estado', 'INTEGER', 'estado_pelicula', 'ID', true, null, 1);
		$this->addColumn('SINOPSIS', 'Sinopsis', 'LONGVARCHAR', true, null, null);
		$this->addColumn('IMAGEN', 'Imagen', 'VARCHAR', false, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Categoria', 'Categoria', RelationMap::MANY_TO_ONE, array('categoria_id' => 'id', ), null, null);
		$this->addRelation('EstadoPelicula', 'EstadoPelicula', RelationMap::MANY_TO_ONE, array('estado' => 'id', ), null, null);
		$this->addRelation('Comentario', 'Comentario', RelationMap::ONE_TO_MANY, array('id' => 'pelicula_id', ), null, null, 'Comentarios');
		$this->addRelation('Reservas', 'Reservas', RelationMap::ONE_TO_MANY, array('id' => 'pelicula_id', ), null, null, 'Reservass');
		$this->addRelation('SocioAlquiler', 'SocioAlquiler', RelationMap::ONE_TO_MANY, array('id' => 'pelicula_id', ), null, null, 'SocioAlquilers');
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

} // PeliculaTableMap
