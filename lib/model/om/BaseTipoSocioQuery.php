<?php


/**
 * Base class that represents a query for the 'tipo_socio' table.
 *
 * 
 *
 * @method     TipoSocioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TipoSocioQuery orderByTipoSocio($order = Criteria::ASC) Order by the tipo_socio column
 *
 * @method     TipoSocioQuery groupById() Group by the id column
 * @method     TipoSocioQuery groupByTipoSocio() Group by the tipo_socio column
 *
 * @method     TipoSocioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TipoSocioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TipoSocioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TipoSocioQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     TipoSocioQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     TipoSocioQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     TipoSocio findOne(PropelPDO $con = null) Return the first TipoSocio matching the query
 * @method     TipoSocio findOneOrCreate(PropelPDO $con = null) Return the first TipoSocio matching the query, or a new TipoSocio object populated from the query conditions when no match is found
 *
 * @method     TipoSocio findOneById(int $id) Return the first TipoSocio filtered by the id column
 * @method     TipoSocio findOneByTipoSocio(string $tipo_socio) Return the first TipoSocio filtered by the tipo_socio column
 *
 * @method     array findById(int $id) Return TipoSocio objects filtered by the id column
 * @method     array findByTipoSocio(string $tipo_socio) Return TipoSocio objects filtered by the tipo_socio column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTipoSocioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTipoSocioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TipoSocio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TipoSocioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TipoSocioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TipoSocioQuery) {
			return $criteria;
		}
		$query = new TipoSocioQuery();
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
	 * @return    TipoSocio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TipoSocioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TipoSocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TipoSocio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TIPO_SOCIO` FROM `tipo_socio` WHERE `ID` = :p0';
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
			$obj = new TipoSocio();
			$obj->hydrate($row);
			TipoSocioPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    TipoSocio|array|mixed the result, formatted by the current formatter
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
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TipoSocioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TipoSocioPeer::ID, $keys, Criteria::IN);
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
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TipoSocioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the tipo_socio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoSocio('fooValue');   // WHERE tipo_socio = 'fooValue'
	 * $query->filterByTipoSocio('%fooValue%'); // WHERE tipo_socio LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipoSocio The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function filterByTipoSocio($tipoSocio = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoSocio)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoSocio)) {
				$tipoSocio = str_replace('*', '%', $tipoSocio);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TipoSocioPeer::TIPO_SOCIO, $tipoSocio, $comparison);
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio $socio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(TipoSocioPeer::ID, $socio->getTipoSocioId(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			return $this
				->useSocioQuery()
				->filterByPrimaryKeys($socio->getPrimaryKeys())
				->endUse();
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
	 * @return    TipoSocioQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     TipoSocio $tipoSocio Object to remove from the list of results
	 *
	 * @return    TipoSocioQuery The current query, for fluid interface
	 */
	public function prune($tipoSocio = null)
	{
		if ($tipoSocio) {
			$this->addUsingAlias(TipoSocioPeer::ID, $tipoSocio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTipoSocioQuery