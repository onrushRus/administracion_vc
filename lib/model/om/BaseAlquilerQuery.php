<?php


/**
 * Base class that represents a query for the 'alquiler' table.
 *
 * 
 *
 * @method     AlquilerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AlquilerQuery orderByFechaAlquiler($order = Criteria::ASC) Order by the fecha_alquiler column
 * @method     AlquilerQuery orderByFechaDevolucion($order = Criteria::ASC) Order by the fecha_devolucion column
 * @method     AlquilerQuery orderByTotalACobrar($order = Criteria::ASC) Order by the total_a_cobrar column
 * @method     AlquilerQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 *
 * @method     AlquilerQuery groupById() Group by the id column
 * @method     AlquilerQuery groupByFechaAlquiler() Group by the fecha_alquiler column
 * @method     AlquilerQuery groupByFechaDevolucion() Group by the fecha_devolucion column
 * @method     AlquilerQuery groupByTotalACobrar() Group by the total_a_cobrar column
 * @method     AlquilerQuery groupBySocioId() Group by the socio_id column
 *
 * @method     AlquilerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlquilerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlquilerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlquilerQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     AlquilerQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     AlquilerQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     AlquilerQuery leftJoinSocioAlquiler($relationAlias = null) Adds a LEFT JOIN clause to the query using the SocioAlquiler relation
 * @method     AlquilerQuery rightJoinSocioAlquiler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SocioAlquiler relation
 * @method     AlquilerQuery innerJoinSocioAlquiler($relationAlias = null) Adds a INNER JOIN clause to the query using the SocioAlquiler relation
 *
 * @method     Alquiler findOne(PropelPDO $con = null) Return the first Alquiler matching the query
 * @method     Alquiler findOneOrCreate(PropelPDO $con = null) Return the first Alquiler matching the query, or a new Alquiler object populated from the query conditions when no match is found
 *
 * @method     Alquiler findOneById(int $id) Return the first Alquiler filtered by the id column
 * @method     Alquiler findOneByFechaAlquiler(string $fecha_alquiler) Return the first Alquiler filtered by the fecha_alquiler column
 * @method     Alquiler findOneByFechaDevolucion(string $fecha_devolucion) Return the first Alquiler filtered by the fecha_devolucion column
 * @method     Alquiler findOneByTotalACobrar(string $total_a_cobrar) Return the first Alquiler filtered by the total_a_cobrar column
 * @method     Alquiler findOneBySocioId(int $socio_id) Return the first Alquiler filtered by the socio_id column
 *
 * @method     array findById(int $id) Return Alquiler objects filtered by the id column
 * @method     array findByFechaAlquiler(string $fecha_alquiler) Return Alquiler objects filtered by the fecha_alquiler column
 * @method     array findByFechaDevolucion(string $fecha_devolucion) Return Alquiler objects filtered by the fecha_devolucion column
 * @method     array findByTotalACobrar(string $total_a_cobrar) Return Alquiler objects filtered by the total_a_cobrar column
 * @method     array findBySocioId(int $socio_id) Return Alquiler objects filtered by the socio_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlquilerQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAlquilerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Alquiler', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlquilerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlquilerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlquilerQuery) {
			return $criteria;
		}
		$query = new AlquilerQuery();
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
	 * @return    Alquiler|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AlquilerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Alquiler A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `FECHA_ALQUILER`, `FECHA_DEVOLUCION`, `TOTAL_A_COBRAR`, `SOCIO_ID` FROM `alquiler` WHERE `ID` = :p0';
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
			$obj = new Alquiler();
			$obj->hydrate($row);
			AlquilerPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Alquiler|array|mixed the result, formatted by the current formatter
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlquilerPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlquilerPeer::ID, $keys, Criteria::IN);
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlquilerPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the fecha_alquiler column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaAlquiler('2011-03-14'); // WHERE fecha_alquiler = '2011-03-14'
	 * $query->filterByFechaAlquiler('now'); // WHERE fecha_alquiler = '2011-03-14'
	 * $query->filterByFechaAlquiler(array('max' => 'yesterday')); // WHERE fecha_alquiler > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaAlquiler The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByFechaAlquiler($fechaAlquiler = null, $comparison = null)
	{
		if (is_array($fechaAlquiler)) {
			$useMinMax = false;
			if (isset($fechaAlquiler['min'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA_ALQUILER, $fechaAlquiler['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaAlquiler['max'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA_ALQUILER, $fechaAlquiler['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::FECHA_ALQUILER, $fechaAlquiler, $comparison);
	}

	/**
	 * Filter the query on the fecha_devolucion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaDevolucion('2011-03-14'); // WHERE fecha_devolucion = '2011-03-14'
	 * $query->filterByFechaDevolucion('now'); // WHERE fecha_devolucion = '2011-03-14'
	 * $query->filterByFechaDevolucion(array('max' => 'yesterday')); // WHERE fecha_devolucion > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaDevolucion The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByFechaDevolucion($fechaDevolucion = null, $comparison = null)
	{
		if (is_array($fechaDevolucion)) {
			$useMinMax = false;
			if (isset($fechaDevolucion['min'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA_DEVOLUCION, $fechaDevolucion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaDevolucion['max'])) {
				$this->addUsingAlias(AlquilerPeer::FECHA_DEVOLUCION, $fechaDevolucion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::FECHA_DEVOLUCION, $fechaDevolucion, $comparison);
	}

	/**
	 * Filter the query on the total_a_cobrar column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTotalACobrar(1234); // WHERE total_a_cobrar = 1234
	 * $query->filterByTotalACobrar(array(12, 34)); // WHERE total_a_cobrar IN (12, 34)
	 * $query->filterByTotalACobrar(array('min' => 12)); // WHERE total_a_cobrar > 12
	 * </code>
	 *
	 * @param     mixed $totalACobrar The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterByTotalACobrar($totalACobrar = null, $comparison = null)
	{
		if (is_array($totalACobrar)) {
			$useMinMax = false;
			if (isset($totalACobrar['min'])) {
				$this->addUsingAlias(AlquilerPeer::TOTAL_A_COBRAR, $totalACobrar['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($totalACobrar['max'])) {
				$this->addUsingAlias(AlquilerPeer::TOTAL_A_COBRAR, $totalACobrar['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::TOTAL_A_COBRAR, $totalACobrar, $comparison);
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
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterBySocioId($socioId = null, $comparison = null)
	{
		if (is_array($socioId)) {
			$useMinMax = false;
			if (isset($socioId['min'])) {
				$this->addUsingAlias(AlquilerPeer::SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($socioId['max'])) {
				$this->addUsingAlias(AlquilerPeer::SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlquilerPeer::SOCIO_ID, $socioId, $comparison);
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio|PropelCollection $socio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(AlquilerPeer::SOCIO_ID, $socio->getId(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AlquilerPeer::SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AlquilerQuery The current query, for fluid interface
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
	 * Filter the query by a related SocioAlquiler object
	 *
	 * @param     SocioAlquiler $socioAlquiler  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function filterBySocioAlquiler($socioAlquiler, $comparison = null)
	{
		if ($socioAlquiler instanceof SocioAlquiler) {
			return $this
				->addUsingAlias(AlquilerPeer::ID, $socioAlquiler->getAlquilerId(), $comparison);
		} elseif ($socioAlquiler instanceof PropelCollection) {
			return $this
				->useSocioAlquilerQuery()
				->filterByPrimaryKeys($socioAlquiler->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySocioAlquiler() only accepts arguments of type SocioAlquiler or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SocioAlquiler relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function joinSocioAlquiler($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SocioAlquiler');

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
			$this->addJoinObject($join, 'SocioAlquiler');
		}

		return $this;
	}

	/**
	 * Use the SocioAlquiler relation SocioAlquiler object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioAlquilerQuery A secondary query class using the current class as primary query
	 */
	public function useSocioAlquilerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSocioAlquiler($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SocioAlquiler', 'SocioAlquilerQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Alquiler $alquiler Object to remove from the list of results
	 *
	 * @return    AlquilerQuery The current query, for fluid interface
	 */
	public function prune($alquiler = null)
	{
		if ($alquiler) {
			$this->addUsingAlias(AlquilerPeer::ID, $alquiler->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAlquilerQuery