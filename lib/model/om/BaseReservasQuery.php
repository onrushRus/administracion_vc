<?php


/**
 * Base class that represents a query for the 'reservas' table.
 *
 * 
 *
 * @method     ReservasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ReservasQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 * @method     ReservasQuery orderByPeliculaId($order = Criteria::ASC) Order by the pelicula_id column
 * @method     ReservasQuery orderByFechaReserva($order = Criteria::ASC) Order by the fecha_reserva column
 * @method     ReservasQuery orderByHoraReserva($order = Criteria::ASC) Order by the hora_reserva column
 * @method     ReservasQuery orderByExpiroReserva($order = Criteria::ASC) Order by the expiro_reserva column
 * @method     ReservasQuery orderByAlquilada($order = Criteria::ASC) Order by the alquilada column
 *
 * @method     ReservasQuery groupById() Group by the id column
 * @method     ReservasQuery groupBySocioId() Group by the socio_id column
 * @method     ReservasQuery groupByPeliculaId() Group by the pelicula_id column
 * @method     ReservasQuery groupByFechaReserva() Group by the fecha_reserva column
 * @method     ReservasQuery groupByHoraReserva() Group by the hora_reserva column
 * @method     ReservasQuery groupByExpiroReserva() Group by the expiro_reserva column
 * @method     ReservasQuery groupByAlquilada() Group by the alquilada column
 *
 * @method     ReservasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ReservasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ReservasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ReservasQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ReservasQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ReservasQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ReservasQuery leftJoinPelicula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pelicula relation
 * @method     ReservasQuery rightJoinPelicula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pelicula relation
 * @method     ReservasQuery innerJoinPelicula($relationAlias = null) Adds a INNER JOIN clause to the query using the Pelicula relation
 *
 * @method     Reservas findOne(PropelPDO $con = null) Return the first Reservas matching the query
 * @method     Reservas findOneOrCreate(PropelPDO $con = null) Return the first Reservas matching the query, or a new Reservas object populated from the query conditions when no match is found
 *
 * @method     Reservas findOneById(int $id) Return the first Reservas filtered by the id column
 * @method     Reservas findOneBySocioId(int $socio_id) Return the first Reservas filtered by the socio_id column
 * @method     Reservas findOneByPeliculaId(int $pelicula_id) Return the first Reservas filtered by the pelicula_id column
 * @method     Reservas findOneByFechaReserva(string $fecha_reserva) Return the first Reservas filtered by the fecha_reserva column
 * @method     Reservas findOneByHoraReserva(string $hora_reserva) Return the first Reservas filtered by the hora_reserva column
 * @method     Reservas findOneByExpiroReserva(boolean $expiro_reserva) Return the first Reservas filtered by the expiro_reserva column
 * @method     Reservas findOneByAlquilada(boolean $alquilada) Return the first Reservas filtered by the alquilada column
 *
 * @method     array findById(int $id) Return Reservas objects filtered by the id column
 * @method     array findBySocioId(int $socio_id) Return Reservas objects filtered by the socio_id column
 * @method     array findByPeliculaId(int $pelicula_id) Return Reservas objects filtered by the pelicula_id column
 * @method     array findByFechaReserva(string $fecha_reserva) Return Reservas objects filtered by the fecha_reserva column
 * @method     array findByHoraReserva(string $hora_reserva) Return Reservas objects filtered by the hora_reserva column
 * @method     array findByExpiroReserva(boolean $expiro_reserva) Return Reservas objects filtered by the expiro_reserva column
 * @method     array findByAlquilada(boolean $alquilada) Return Reservas objects filtered by the alquilada column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseReservasQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseReservasQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Reservas', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ReservasQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ReservasQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ReservasQuery) {
			return $criteria;
		}
		$query = new ReservasQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Reservas|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ReservasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ReservasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Reservas A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SOCIO_ID`, `PELICULA_ID`, `FECHA_RESERVA`, `HORA_RESERVA`, `EXPIRO_RESERVA`, `ALQUILADA` FROM `reservas` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Reservas();
			$obj->hydrate($row);
			ReservasPeer::addInstanceToPool($obj, (string) $key);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Reservas|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ReservasPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ReservasPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ReservasPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the socio_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySocioId(1234); // WHERE socio_id = 1234
	 * $query->filterBySocioId(array(12, 34)); // WHERE socio_id IN (12, 34)
	 * $query->filterBySocioId(array('min' => 12)); // WHERE socio_id > 12
	 * </code>
	 *
	 * @see       filterBySocio()
	 *
	 * @param     mixed $socioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterBySocioId($socioId = null, $comparison = null)
	{
		if (is_array($socioId)) {
			$useMinMax = false;
			if (isset($socioId['min'])) {
				$this->addUsingAlias(ReservasPeer::SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($socioId['max'])) {
				$this->addUsingAlias(ReservasPeer::SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservasPeer::SOCIO_ID, $socioId, $comparison);
	}

	/**
	 * Filter the query on the pelicula_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPeliculaId(1234); // WHERE pelicula_id = 1234
	 * $query->filterByPeliculaId(array(12, 34)); // WHERE pelicula_id IN (12, 34)
	 * $query->filterByPeliculaId(array('min' => 12)); // WHERE pelicula_id > 12
	 * </code>
	 *
	 * @see       filterByPelicula()
	 *
	 * @param     mixed $peliculaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByPeliculaId($peliculaId = null, $comparison = null)
	{
		if (is_array($peliculaId)) {
			$useMinMax = false;
			if (isset($peliculaId['min'])) {
				$this->addUsingAlias(ReservasPeer::PELICULA_ID, $peliculaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($peliculaId['max'])) {
				$this->addUsingAlias(ReservasPeer::PELICULA_ID, $peliculaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservasPeer::PELICULA_ID, $peliculaId, $comparison);
	}

	/**
	 * Filter the query on the fecha_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaReserva('2011-03-14'); // WHERE fecha_reserva = '2011-03-14'
	 * $query->filterByFechaReserva('now'); // WHERE fecha_reserva = '2011-03-14'
	 * $query->filterByFechaReserva(array('max' => 'yesterday')); // WHERE fecha_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByFechaReserva($fechaReserva = null, $comparison = null)
	{
		if (is_array($fechaReserva)) {
			$useMinMax = false;
			if (isset($fechaReserva['min'])) {
				$this->addUsingAlias(ReservasPeer::FECHA_RESERVA, $fechaReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaReserva['max'])) {
				$this->addUsingAlias(ReservasPeer::FECHA_RESERVA, $fechaReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservasPeer::FECHA_RESERVA, $fechaReserva, $comparison);
	}

	/**
	 * Filter the query on the hora_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHoraReserva('2011-03-14'); // WHERE hora_reserva = '2011-03-14'
	 * $query->filterByHoraReserva('now'); // WHERE hora_reserva = '2011-03-14'
	 * $query->filterByHoraReserva(array('max' => 'yesterday')); // WHERE hora_reserva > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $horaReserva The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByHoraReserva($horaReserva = null, $comparison = null)
	{
		if (is_array($horaReserva)) {
			$useMinMax = false;
			if (isset($horaReserva['min'])) {
				$this->addUsingAlias(ReservasPeer::HORA_RESERVA, $horaReserva['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($horaReserva['max'])) {
				$this->addUsingAlias(ReservasPeer::HORA_RESERVA, $horaReserva['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ReservasPeer::HORA_RESERVA, $horaReserva, $comparison);
	}

	/**
	 * Filter the query on the expiro_reserva column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExpiroReserva(true); // WHERE expiro_reserva = true
	 * $query->filterByExpiroReserva('yes'); // WHERE expiro_reserva = true
	 * </code>
	 *
	 * @param     boolean|string $expiroReserva The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByExpiroReserva($expiroReserva = null, $comparison = null)
	{
		if (is_string($expiroReserva)) {
			$expiro_reserva = in_array(strtolower($expiroReserva), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ReservasPeer::EXPIRO_RESERVA, $expiroReserva, $comparison);
	}

	/**
	 * Filter the query on the alquilada column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAlquilada(true); // WHERE alquilada = true
	 * $query->filterByAlquilada('yes'); // WHERE alquilada = true
	 * </code>
	 *
	 * @param     boolean|string $alquilada The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByAlquilada($alquilada = null, $comparison = null)
	{
		if (is_string($alquilada)) {
			$alquilada = in_array(strtolower($alquilada), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ReservasPeer::ALQUILADA, $alquilada, $comparison);
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio|PropelCollection $socio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(ReservasPeer::SOCIO_ID, $socio->getId(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ReservasPeer::SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySocio() only accepts arguments of type Socio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Socio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function joinSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Socio');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Socio');
		}

		return $this;
	}

	/**
	 * Use the Socio relation Socio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery A secondary query class using the current class as primary query
	 */
	public function useSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSocio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Socio', 'SocioQuery');
	}

	/**
	 * Filter the query by a related Pelicula object
	 *
	 * @param     Pelicula|PropelCollection $pelicula The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function filterByPelicula($pelicula, $comparison = null)
	{
		if ($pelicula instanceof Pelicula) {
			return $this
				->addUsingAlias(ReservasPeer::PELICULA_ID, $pelicula->getId(), $comparison);
		} elseif ($pelicula instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ReservasPeer::PELICULA_ID, $pelicula->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPelicula() only accepts arguments of type Pelicula or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pelicula relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function joinPelicula($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pelicula');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Pelicula');
		}

		return $this;
	}

	/**
	 * Use the Pelicula relation Pelicula object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PeliculaQuery A secondary query class using the current class as primary query
	 */
	public function usePeliculaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPelicula($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pelicula', 'PeliculaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Reservas $reservas Object to remove from the list of results
	 *
	 * @return    ReservasQuery The current query, for fluid interface
	 */
	public function prune($reservas = null)
	{
		if ($reservas) {
			$this->addUsingAlias(ReservasPeer::ID, $reservas->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseReservasQuery