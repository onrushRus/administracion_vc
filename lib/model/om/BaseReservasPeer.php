<?php


/**
 * Base static class for performing query and update operations on the 'reservas' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReservasPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'reservas';

	/** the related Propel class for this table */
	const OM_CLASS = 'Reservas';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ReservasTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 7;

	/** the column name for the ID field */
	const ID = 'reservas.ID';

	/** the column name for the SOCIO_ID field */
	const SOCIO_ID = 'reservas.SOCIO_ID';

	/** the column name for the PELICULA_ID field */
	const PELICULA_ID = 'reservas.PELICULA_ID';

	/** the column name for the FECHA_RESERVA field */
	const FECHA_RESERVA = 'reservas.FECHA_RESERVA';

	/** the column name for the HORA_RESERVA field */
	const HORA_RESERVA = 'reservas.HORA_RESERVA';

	/** the column name for the EXPIRO_RESERVA field */
	const EXPIRO_RESERVA = 'reservas.EXPIRO_RESERVA';

	/** the column name for the ALQUILADA field */
	const ALQUILADA = 'reservas.ALQUILADA';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Reservas objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Reservas[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'SocioId', 'PeliculaId', 'FechaReserva', 'HoraReserva', 'ExpiroReserva', 'Alquilada', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'socioId', 'peliculaId', 'fechaReserva', 'horaReserva', 'expiroReserva', 'alquilada', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SOCIO_ID, self::PELICULA_ID, self::FECHA_RESERVA, self::HORA_RESERVA, self::EXPIRO_RESERVA, self::ALQUILADA, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SOCIO_ID', 'PELICULA_ID', 'FECHA_RESERVA', 'HORA_RESERVA', 'EXPIRO_RESERVA', 'ALQUILADA', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'socio_id', 'pelicula_id', 'fecha_reserva', 'hora_reserva', 'expiro_reserva', 'alquilada', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SocioId' => 1, 'PeliculaId' => 2, 'FechaReserva' => 3, 'HoraReserva' => 4, 'ExpiroReserva' => 5, 'Alquilada' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'socioId' => 1, 'peliculaId' => 2, 'fechaReserva' => 3, 'horaReserva' => 4, 'expiroReserva' => 5, 'alquilada' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SOCIO_ID => 1, self::PELICULA_ID => 2, self::FECHA_RESERVA => 3, self::HORA_RESERVA => 4, self::EXPIRO_RESERVA => 5, self::ALQUILADA => 6, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SOCIO_ID' => 1, 'PELICULA_ID' => 2, 'FECHA_RESERVA' => 3, 'HORA_RESERVA' => 4, 'EXPIRO_RESERVA' => 5, 'ALQUILADA' => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'socio_id' => 1, 'pelicula_id' => 2, 'fecha_reserva' => 3, 'hora_reserva' => 4, 'expiro_reserva' => 5, 'alquilada' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
	 * @param      string $column The column name for current table. (i.e. ReservasPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ReservasPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(ReservasPeer::ID);
			$criteria->addSelectColumn(ReservasPeer::SOCIO_ID);
			$criteria->addSelectColumn(ReservasPeer::PELICULA_ID);
			$criteria->addSelectColumn(ReservasPeer::FECHA_RESERVA);
			$criteria->addSelectColumn(ReservasPeer::HORA_RESERVA);
			$criteria->addSelectColumn(ReservasPeer::EXPIRO_RESERVA);
			$criteria->addSelectColumn(ReservasPeer::ALQUILADA);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.SOCIO_ID');
			$criteria->addSelectColumn($alias . '.PELICULA_ID');
			$criteria->addSelectColumn($alias . '.FECHA_RESERVA');
			$criteria->addSelectColumn($alias . '.HORA_RESERVA');
			$criteria->addSelectColumn($alias . '.EXPIRO_RESERVA');
			$criteria->addSelectColumn($alias . '.ALQUILADA');
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
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * @return     Reservas
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ReservasPeer::doSelect($critcopy, $con);
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
		return ReservasPeer::populateObjects(ReservasPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ReservasPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * @param      Reservas $value A Reservas object.
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
	 * @param      mixed $value A Reservas object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Reservas) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Reservas object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Reservas Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to reservas
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
		$cls = ReservasPeer::getOMClass();
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ReservasPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ReservasPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Reservas object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ReservasPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ReservasPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ReservasPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = ReservasPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ReservasPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Socio table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSocio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Pelicula table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPelicula(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * Selects a collection of Reservas objects pre-filled with their Socio objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Reservas objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSocio(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ReservasPeer::addSelectColumns($criteria);
		$startcol = ReservasPeer::NUM_HYDRATE_COLUMNS;
		SocioPeer::addSelectColumns($criteria);

		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ReservasPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ReservasPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ReservasPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SocioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SocioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SocioPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SocioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Reservas) to $obj2 (Socio)
				$obj2->addReservas($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Reservas objects pre-filled with their Pelicula objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Reservas objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPelicula(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ReservasPeer::addSelectColumns($criteria);
		$startcol = ReservasPeer::NUM_HYDRATE_COLUMNS;
		PeliculaPeer::addSelectColumns($criteria);

		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ReservasPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ReservasPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ReservasPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PeliculaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PeliculaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PeliculaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Reservas) to $obj2 (Pelicula)
				$obj2->addReservas($obj1);

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
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * Selects a collection of Reservas objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Reservas objects.
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

		ReservasPeer::addSelectColumns($criteria);
		$startcol2 = ReservasPeer::NUM_HYDRATE_COLUMNS;

		SocioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + SocioPeer::NUM_HYDRATE_COLUMNS;

		PeliculaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + PeliculaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
		}

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ReservasPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ReservasPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ReservasPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Socio rows

			$key2 = SocioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SocioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SocioPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SocioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Reservas) to the collection in $obj2 (Socio)
				$obj2->addReservas($obj1);
			} // if joined row not null

			// Add objects for joined Pelicula rows

			$key3 = PeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = PeliculaPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = PeliculaPeer::getOMClass();

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PeliculaPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Reservas) to the collection in $obj3 (Pelicula)
				$obj3->addReservas($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Socio table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSocio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * Returns the number of rows matching criteria, joining the related Pelicula table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPelicula(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ReservasPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
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
	 * Selects a collection of Reservas objects pre-filled with all related objects except Socio.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Reservas objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSocio(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ReservasPeer::addSelectColumns($criteria);
		$startcol2 = ReservasPeer::NUM_HYDRATE_COLUMNS;

		PeliculaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + PeliculaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ReservasPeer::PELICULA_ID, PeliculaPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ReservasPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ReservasPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ReservasPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Pelicula rows

				$key2 = PeliculaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PeliculaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PeliculaPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PeliculaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Reservas) to the collection in $obj2 (Pelicula)
				$obj2->addReservas($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Reservas objects pre-filled with all related objects except Pelicula.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Reservas objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPelicula(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ReservasPeer::addSelectColumns($criteria);
		$startcol2 = ReservasPeer::NUM_HYDRATE_COLUMNS;

		SocioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + SocioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ReservasPeer::SOCIO_ID, SocioPeer::ID, $join_behavior);

		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseReservasPeer', $criteria, $con);
		}


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ReservasPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ReservasPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ReservasPeer::getOMClass();

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ReservasPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Socio rows

				$key2 = SocioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SocioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SocioPeer::getOMClass();

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SocioPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Reservas) to the collection in $obj2 (Socio)
				$obj2->addReservas($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseReservasPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseReservasPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ReservasTableMap());
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
		return ReservasPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Reservas or Criteria object.
	 *
	 * @param      mixed $values Criteria or Reservas object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Reservas object
		}

		if ($criteria->containsKey(ReservasPeer::ID) && $criteria->keyContainsValue(ReservasPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ReservasPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a Reservas or Criteria object.
	 *
	 * @param      mixed $values Criteria or Reservas object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ReservasPeer::ID);
			$value = $criteria->remove(ReservasPeer::ID);
			if ($value) {
				$selectCriteria->add(ReservasPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ReservasPeer::TABLE_NAME);
			}

		} else { // $values is Reservas object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the reservas table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ReservasPeer::TABLE_NAME, $con, ReservasPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ReservasPeer::clearInstancePool();
			ReservasPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Reservas or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Reservas object or primary key or array of primary keys
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
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ReservasPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Reservas) { // it's a model object
			// invalidate the cache for this single object
			ReservasPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ReservasPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ReservasPeer::removeInstanceFromPool($singleval);
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
			ReservasPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Reservas object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Reservas $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ReservasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ReservasPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ReservasPeer::DATABASE_NAME, ReservasPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Reservas
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ReservasPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ReservasPeer::DATABASE_NAME);
		$criteria->add(ReservasPeer::ID, $pk);

		$v = ReservasPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ReservasPeer::DATABASE_NAME);
			$criteria->add(ReservasPeer::ID, $pks, Criteria::IN);
			$objs = ReservasPeer::doSelect($criteria, $con);
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
	    return sprintf('BaseReservasPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseReservasPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseReservasPeer::buildTableMap();

