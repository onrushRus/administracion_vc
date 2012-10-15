<?php


/**
 * Base class that represents a query for the 'socio_alquiler' table.
 *
 * 
 *
 * @method     SocioAlquilerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SocioAlquilerQuery orderByAlquilerId($order = Criteria::ASC) Order by the alquiler_id column
 * @method     SocioAlquilerQuery orderByPeliculaId($order = Criteria::ASC) Order by the pelicula_id column
 *
 * @method     SocioAlquilerQuery groupById() Group by the id column
 * @method     SocioAlquilerQuery groupByAlquilerId() Group by the alquiler_id column
 * @method     SocioAlquilerQuery groupByPeliculaId() Group by the pelicula_id column
 *
 * @method     SocioAlquilerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SocioAlquilerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SocioAlquilerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SocioAlquilerQuery leftJoinAlquiler($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alquiler relation
 * @method     SocioAlquilerQuery rightJoinAlquiler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alquiler relation
 * @method     SocioAlquilerQuery innerJoinAlquiler($relationAlias = null) Adds a INNER JOIN clause to the query using the Alquiler relation
 *
 * @method     SocioAlquilerQuery leftJoinPelicula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pelicula relation
 * @method     SocioAlquilerQuery rightJoinPelicula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pelicula relation
 * @method     SocioAlquilerQuery innerJoinPelicula($relationAlias = null) Adds a INNER JOIN clause to the query using the Pelicula relation
 *
 * @method     SocioAlquiler findOne(PropelPDO $con = null) Return the first SocioAlquiler matching the query
 * @method     SocioAlquiler findOneOrCreate(PropelPDO $con = null) Return the first SocioAlquiler matching the query, or a new SocioAlquiler object populated from the query conditions when no match is found
 *
 * @method     SocioAlquiler findOneById(int $id) Return the first SocioAlquiler filtered by the id column
 * @method     SocioAlquiler findOneByAlquilerId(int $alquiler_id) Return the first SocioAlquiler filtered by the alquiler_id column
 * @method     SocioAlquiler findOneByPeliculaId(int $pelicula_id) Return the first SocioAlquiler filtered by the pelicula_id column
 *
 * @method     array findById(int $id) Return SocioAlquiler objects filtered by the id column
 * @method     array findByAlquilerId(int $alquiler_id) Return SocioAlquiler objects filtered by the alquiler_id column
 * @method     array findByPeliculaId(int $pelicula_id) Return SocioAlquiler objects filtered by the pelicula_id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSocioAlquilerQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSocioAlquilerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SocioAlquiler', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SocioAlquilerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SocioAlquilerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SocioAlquilerQuery) {
			return $criteria;
		}
		$query = new SocioAlquilerQuery();
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
	 * @return    SocioAlquiler|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SocioAlquilerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SocioAlquilerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SocioAlquiler A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ALQUILER_ID`, `PELICULA_ID` FROM `socio_alquiler` WHERE `ID` = :p0';
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
			$obj = new SocioAlquiler();
			$obj->hydrate($row);
			SocioAlquilerPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    SocioAlquiler|array|mixed the result, formatted by the current formatter
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
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SocioAlquilerPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SocioAlquilerPeer::ID, $keys, Criteria::IN);
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
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SocioAlquilerPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the alquiler_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAlquilerId(1234); // WHERE alquiler_id = 1234
	 * $query->filterByAlquilerId(array(12, 34)); // WHERE alquiler_id IN (12, 34)
	 * $query->filterByAlquilerId(array('min' => 12)); // WHERE alquiler_id > 12
	 * </code>
	 *
	 * @see       filterByAlquiler()
	 *
	 * @param     mixed $alquilerId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByAlquilerId($alquilerId = null, $comparison = null)
	{
		if (is_array($alquilerId)) {
			$useMinMax = false;
			if (isset($alquilerId['min'])) {
				$this->addUsingAlias(SocioAlquilerPeer::ALQUILER_ID, $alquilerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($alquilerId['max'])) {
				$this->addUsingAlias(SocioAlquilerPeer::ALQUILER_ID, $alquilerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SocioAlquilerPeer::ALQUILER_ID, $alquilerId, $comparison);
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
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByPeliculaId($peliculaId = null, $comparison = null)
	{
		if (is_array($peliculaId)) {
			$useMinMax = false;
			if (isset($peliculaId['min'])) {
				$this->addUsingAlias(SocioAlquilerPeer::PELICULA_ID, $peliculaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($peliculaId['max'])) {
				$this->addUsingAlias(SocioAlquilerPeer::PELICULA_ID, $peliculaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SocioAlquilerPeer::PELICULA_ID, $peliculaId, $comparison);
	}

	/**
	 * Filter the query by a related Alquiler object
	 *
	 * @param     Alquiler|PropelCollection $alquiler The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByAlquiler($alquiler, $comparison = null)
	{
		if ($alquiler instanceof Alquiler) {
			return $this
				->addUsingAlias(SocioAlquilerPeer::ALQUILER_ID, $alquiler->getId(), $comparison);
		} elseif ($alquiler instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SocioAlquilerPeer::ALQUILER_ID, $alquiler->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAlquiler() only accepts arguments of type Alquiler or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Alquiler relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function joinAlquiler($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Alquiler');

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
			$this->addJoinObject($join, 'Alquiler');
		}

		return $this;
	}

	/**
	 * Use the Alquiler relation Alquiler object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlquilerQuery A secondary query class using the current class as primary query
	 */
	public function useAlquilerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlquiler($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Alquiler', 'AlquilerQuery');
	}

	/**
	 * Filter the query by a related Pelicula object
	 *
	 * @param     Pelicula|PropelCollection $pelicula The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function filterByPelicula($pelicula, $comparison = null)
	{
		if ($pelicula instanceof Pelicula) {
			return $this
				->addUsingAlias(SocioAlquilerPeer::PELICULA_ID, $pelicula->getId(), $comparison);
		} elseif ($pelicula instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SocioAlquilerPeer::PELICULA_ID, $pelicula->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SocioAlquilerQuery The current query, for fluid interface
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
	 * @param     SocioAlquiler $socioAlquiler Object to remove from the list of results
	 *
	 * @return    SocioAlquilerQuery The current query, for fluid interface
	 */
	public function prune($socioAlquiler = null)
	{
		if ($socioAlquiler) {
			$this->addUsingAlias(SocioAlquilerPeer::ID, $socioAlquiler->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSocioAlquilerQuery