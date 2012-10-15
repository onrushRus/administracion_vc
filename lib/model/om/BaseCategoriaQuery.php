<?php


/**
 * Base class that represents a query for the 'categoria' table.
 *
 * 
 *
 * @method     CategoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CategoriaQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 *
 * @method     CategoriaQuery groupById() Group by the id column
 * @method     CategoriaQuery groupByTipo() Group by the tipo column
 *
 * @method     CategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoriaQuery leftJoinPelicula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pelicula relation
 * @method     CategoriaQuery rightJoinPelicula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pelicula relation
 * @method     CategoriaQuery innerJoinPelicula($relationAlias = null) Adds a INNER JOIN clause to the query using the Pelicula relation
 *
 * @method     Categoria findOne(PropelPDO $con = null) Return the first Categoria matching the query
 * @method     Categoria findOneOrCreate(PropelPDO $con = null) Return the first Categoria matching the query, or a new Categoria object populated from the query conditions when no match is found
 *
 * @method     Categoria findOneById(int $id) Return the first Categoria filtered by the id column
 * @method     Categoria findOneByTipo(string $tipo) Return the first Categoria filtered by the tipo column
 *
 * @method     array findById(int $id) Return Categoria objects filtered by the id column
 * @method     array findByTipo(string $tipo) Return Categoria objects filtered by the tipo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCategoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Categoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CategoriaQuery) {
			return $criteria;
		}
		$query = new CategoriaQuery();
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CategoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Categoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TIPO` FROM `categoria` WHERE `ID` = :p0';
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
			$obj = new Categoria();
			$obj->hydrate($row);
			CategoriaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CategoriaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the tipo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
	 * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByTipo($tipo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipo)) {
				$tipo = str_replace('*', '%', $tipo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::TIPO, $tipo, $comparison);
	}

	/**
	 * Filter the query by a related Pelicula object
	 *
	 * @param     Pelicula $pelicula  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPelicula($pelicula, $comparison = null)
	{
		if ($pelicula instanceof Pelicula) {
			return $this
				->addUsingAlias(CategoriaPeer::ID, $pelicula->getCategoriaId(), $comparison);
		} elseif ($pelicula instanceof PropelCollection) {
			return $this
				->usePeliculaQuery()
				->filterByPrimaryKeys($pelicula->getPrimaryKeys())
				->endUse();
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
	 * @return    CategoriaQuery The current query, for fluid interface
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
	 * @param     Categoria $categoria Object to remove from the list of results
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function prune($categoria = null)
	{
		if ($categoria) {
			$this->addUsingAlias(CategoriaPeer::ID, $categoria->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCategoriaQuery