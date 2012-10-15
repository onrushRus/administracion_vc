<?php


/**
 * Base static class for performing query and update operations on the 'pelicula' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePeliculaPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'pelicula';

	/** the related Propel class for this table */
	const OM_CLASS = 'Pelicula';

	/** the related TableMap class for this table */
	const TM_CLASS = 'PeliculaTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 13;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 13;

	/** the column name for the ID field */
	const ID = 'pelicula.ID';

	/** the column name for the TITULO field */
	const TITULO = 'pelicula.TITULO';

	/** the column name for the DURACION field */
	const DURACION = 'pelicula.DURACION';

	/** the column name for the FECHA_ESTRENO field */
	const FECHA_ESTRENO = 'pelicula.FECHA_ESTRENO';

	/** the column name for the ESTRENO field */
	const ESTRENO = 'pelicula.ESTRENO';

	/** the column name for the ACTOR1_NOM field */
	const ACTOR1_NOM = 'pelicula.ACTOR1_NOM';

	/** the column name for the ACTOR1_APELL field */
	const ACTOR1_APELL = 'pelicula.ACTOR1_APELL';

	/** the column name for the ACTOR2_NOM field */
	const ACTOR2_NOM = 'pelicula.ACTOR2_NOM';

	/** the column name for the ACTOR2_APELL field */
	const ACTOR2_APELL = 'pelicula.ACTOR2_APELL';

	/** the column name for the CATEGORIA_ID field */
	const CATEGORIA_ID = 'pelicula.CATEGORIA_ID';

	/** the column name for the ESTADO field */
	const ESTADO = 'pelicula.ESTADO';

	/** the column name for the SINOPSIS field */
	const SINOPSIS = 'pelicula.SINOPSIS';

	/** the column name for the IMAGEN field */
	const IMAGEN = 'pelicula.IMAGEN';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Pelicula objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Pelicula[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Titulo', 'Duracion', 'FechaEstreno', 'Estreno', 'Actor1Nom', 'Actor1Apell', 'Actor2Nom', 'Actor2Apell', 'CategoriaId', 'Estado', 'Sinopsis', 'Imagen', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'titulo', 'duracion', 'fechaEstreno', 'estreno', 'actor1Nom', 'actor1Apell', 'actor2Nom', 'actor2Apell', 'categoriaId', 'estado', 'sinopsis', 'imagen', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::TITULO, self::DURACION, self::FECHA_ESTRENO, self::ESTRENO, self::ACTOR1_NOM, self::ACTOR1_APELL, self::ACTOR2_NOM, self::ACTOR2_APELL, self::CATEGORIA_ID, self::ESTADO, self::SINOPSIS, self::IMAGEN, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'TITULO', 'DURACION', 'FECHA_ESTRENO', 'ESTRENO', 'ACTOR1_NOM', 'ACTOR1_APELL', 'ACTOR2_NOM', 'ACTOR2_APELL', 'CATEGORIA_ID', 'ESTADO', 'SINOPSIS', 'IMAGEN', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'titulo', 'duracion', 'fecha_estreno', 'estreno', 'actor1_nom', 'actor1_apell', 'actor2_nom', 'actor2_apell', 'categoria_id', 'estado', 'sinopsis', 'imagen', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Titulo' => 1, 'Duracion' => 2, 'FechaEstreno' => 3, 'Estreno' => 4, 'Actor1Nom' => 5, 'Actor1Apell' => 6, 'Actor2Nom' => 7, 'Actor2Apell' => 8, 'CategoriaId' => 9, 'Estado' => 10, 'Sinopsis' => 11, 'Imagen' => 12, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'titulo' => 1, 'duracion' => 2, 'fechaEstreno' => 3, 'estreno' => 4, 'actor1Nom' => 5, 'actor1Apell' => 6, 'actor2Nom' => 7, 'actor2Apell' => 8, 'categoriaId' => 9, 'estado' => 10, 'sinopsis' => 11, 'imagen' => 12, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::TITULO => 1, self::DURACION => 2, self::FECHA_ESTRENO => 3, self::ESTRENO => 4, self::ACTOR1_NOM => 5, self::ACTOR1_APELL => 6, self::ACTOR2_NOM => 7, self::ACTOR2_APELL => 8, self::CATEGORIA_ID => 9, self::ESTADO => 10, self::SINOPSIS => 11, self::IMAGEN => 12, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'TITULO' => 1, 'DURACION' => 2, 'FECHA_ESTRENO' => 3, 'ESTRENO' => 4, 'ACTOR1_NOM' => 5, 'ACTOR1_APELL' => 6, 'ACTOR2_NOM' => 7, 'ACTOR2_APELL' => 8, 'CATEGORIA_ID' => 9, 'ESTADO' => 10, 'SINOPSIS' => 11, 'IMAGEN' => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'titulo' => 1, 'duracion' => 2, 'fecha_estreno' => 3, 'estreno' => 4, 'actor1_nom' => 5, 'actor1_apell' => 6, 'actor2_nom' => 7, 'actor2_apell' => 8, 'categoria_id' => 9, 'estado' => 10, 'sinopsis' => 11, 'imagen' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. PeliculaPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(PeliculaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(PeliculaPeer::ID);
			$criteria->addSelectColumn(PeliculaPeer::TITULO);
			$criteria->addSelectColumn(PeliculaPeer::DURACION);
			$criteria->addSelectColumn(PeliculaPeer::FECHA_ESTRENO);
			$criteria->addSelectColumn(PeliculaPeer::ESTRENO);
			$criteria->addSelectColumn(PeliculaPeer::ACTOR1_NOM);
			$criteria->addSelectColumn(PeliculaPeer::ACTOR1_APELL);
			$criteria->addSelectColumn(PeliculaPeer::ACTOR2_NOM);
			$criteria->addSelectColumn(PeliculaPeer::ACTOR2_APELL);
			$criteria->addSelectColumn(PeliculaPeer::CATEGORIA_ID);
			$criteria->addSelectColumn(PeliculaPeer::ESTADO);
			$criteria->addSelectColumn(PeliculaPeer::SINOPSIS);
			$criteria->addSelectColumn(PeliculaPeer::IMAGEN);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.TITULO');
			$criteria->addSelectColumn($alias . '.DURACION');
			$criteria->addSelectColumn($alias . '.FECHA_ESTRENO');
			$criteria->addSelectColumn($alias . '.ESTRENO');
			$criteria->addSelectColumn($alias . '.ACTOR1_NOM');
			$criteria->addSelectColumn($alias . '.ACTOR1_APELL');
			$criteria->addSelectColumn($alias . '.ACTOR2_NOM');
			$criteria->addSelectColumn($alias . '.ACTOR2_APELL');
			$criteria->addSelectColumn($alias . '.CATEGORIA_ID');
			$criteria->addSelectColumn($alias . '.ESTADO');
			$criteria->addSelectColumn($alias . '.SINOPSIS');
			$criteria->addSelectColumn($alias . '.IMAGEN');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Pelicula
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PeliculaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return PeliculaPeer::populateObjects(PeliculaPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			PeliculaPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      Pelicula $value A Pelicula object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A Pelicula object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Pelicula) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Pelicula object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     Pelicula Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to pelicula
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = PeliculaPeer::getOMClass();
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = PeliculaPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PeliculaPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (Pelicula object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = PeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = PeliculaPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + PeliculaPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = PeliculaPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			PeliculaPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Categoria table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCategoria(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related EstadoPelicula table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinEstadoPelicula(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of Pelicula objects pre-filled with their Categoria objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Pelicula objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCategoria(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PeliculaPeer::addSelectColumns($criteria);
		$startcol = PeliculaPeer::NUM_HYDRATE_COLUMNS;
		CategoriaPeer::addSelectColumns($criteria);

		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PeliculaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PeliculaPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PeliculaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CategoriaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CategoriaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CategoriaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CategoriaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Pelicula) to $obj2 (Categoria)
				$obj2->addPelicula($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Pelicula objects pre-filled with their EstadoPelicula objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Pelicula objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinEstadoPelicula(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PeliculaPeer::addSelectColumns($criteria);
		$startcol = PeliculaPeer::NUM_HYDRATE_COLUMNS;
		EstadoPeliculaPeer::addSelectColumns($criteria);

		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PeliculaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PeliculaPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PeliculaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = EstadoPeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstadoPeliculaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = EstadoPeliculaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstadoPeliculaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Pelicula) to $obj2 (EstadoPelicula)
				$obj2->addPelicula($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of Pelicula objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Pelicula objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PeliculaPeer::addSelectColumns($criteria);
		$startcol2 = PeliculaPeer::NUM_HYDRATE_COLUMNS;

		CategoriaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CategoriaPeer::NUM_HYDRATE_COLUMNS;

		EstadoPeliculaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EstadoPeliculaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PeliculaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PeliculaPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PeliculaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Categoria rows

			$key2 = CategoriaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CategoriaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CategoriaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CategoriaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Pelicula) to the collection in $obj2 (Categoria)
				$obj2->addPelicula($obj1);
			} // if joined row not null

			// Add objects for joined EstadoPelicula rows

			$key3 = EstadoPeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = EstadoPeliculaPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = EstadoPeliculaPeer::getOMClass();

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EstadoPeliculaPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Pelicula) to the collection in $obj3 (EstadoPelicula)
				$obj3->addPelicula($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Categoria table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCategoria(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related EstadoPelicula table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptEstadoPelicula(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PeliculaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of Pelicula objects pre-filled with all related objects except Categoria.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Pelicula objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCategoria(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PeliculaPeer::addSelectColumns($criteria);
		$startcol2 = PeliculaPeer::NUM_HYDRATE_COLUMNS;

		EstadoPeliculaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + EstadoPeliculaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PeliculaPeer::ESTADO, EstadoPeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PeliculaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PeliculaPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PeliculaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined EstadoPelicula rows

				$key2 = EstadoPeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstadoPeliculaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EstadoPeliculaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstadoPeliculaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Pelicula) to the collection in $obj2 (EstadoPelicula)
				$obj2->addPelicula($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Pelicula objects pre-filled with all related objects except EstadoPelicula.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Pelicula objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptEstadoPelicula(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PeliculaPeer::addSelectColumns($criteria);
		$startcol2 = PeliculaPeer::NUM_HYDRATE_COLUMNS;

		CategoriaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CategoriaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PeliculaPeer::CATEGORIA_ID, CategoriaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePeliculaPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PeliculaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PeliculaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PeliculaPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PeliculaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Categoria rows

				$key2 = CategoriaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CategoriaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CategoriaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CategoriaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Pelicula) to the collection in $obj2 (Categoria)
				$obj2->addPelicula($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BasePeliculaPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BasePeliculaPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new PeliculaTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 *
	 * @return     string ClassName
	 */
	public static function getOMClass()
	{
		return PeliculaPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Pelicula or Criteria object.
	 *
	 * @param      mixed $values Criteria or Pelicula object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Pelicula object
		}

		if ($criteria->containsKey(PeliculaPeer::ID) && $criteria->keyContainsValue(PeliculaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.PeliculaPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a Pelicula or Criteria object.
	 *
	 * @param      mixed $values Criteria or Pelicula object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(PeliculaPeer::ID);
			$value = $criteria->remove(PeliculaPeer::ID);
			if ($value) {
				$selectCriteria->add(PeliculaPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(PeliculaPeer::TABLE_NAME);
			}

		} else { // $values is Pelicula object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the pelicula table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(PeliculaPeer::TABLE_NAME, $con, PeliculaPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PeliculaPeer::clearInstancePool();
			PeliculaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Pelicula or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Pelicula object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			PeliculaPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Pelicula) { // it's a model object
			// invalidate the cache for this single object
			PeliculaPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PeliculaPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				PeliculaPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			PeliculaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Pelicula object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Pelicula $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PeliculaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PeliculaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(PeliculaPeer::DATABASE_NAME, PeliculaPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Pelicula
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = PeliculaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(PeliculaPeer::DATABASE_NAME);
		$criteria->add(PeliculaPeer::ID, $pk);

		$v = PeliculaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(PeliculaPeer::DATABASE_NAME);
			$criteria->add(PeliculaPeer::ID, $pks, Criteria::IN);
			$objs = PeliculaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array();
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BasePeliculaPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BasePeliculaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePeliculaPeer::buildTableMap();

