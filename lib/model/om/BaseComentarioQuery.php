<?php


/**
 * Base class that represents a query for the 'comentario' table.
 *
 * 
 *
 * @method     ComentarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ComentarioQuery orderBySocioId($order = Criteria::ASC) Order by the socio_id column
 * @method     ComentarioQuery orderByPeliculaId($order = Criteria::ASC) Order by the pelicula_id column
 * @method     ComentarioQuery orderByDetalle($order = Criteria::ASC) Order by the detalle column
 * @method     ComentarioQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 *
 * @method     ComentarioQuery groupById() Group by the id column
 * @method     ComentarioQuery groupBySocioId() Group by the socio_id column
 * @method     ComentarioQuery groupByPeliculaId() Group by the pelicula_id column
 * @method     ComentarioQuery groupByDetalle() Group by the detalle column
 * @method     ComentarioQuery groupByFecha() Group by the fecha column
 *
 * @method     ComentarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ComentarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ComentarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ComentarioQuery leftJoinSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Socio relation
 * @method     ComentarioQuery rightJoinSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Socio relation
 * @method     ComentarioQuery innerJoinSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the Socio relation
 *
 * @method     ComentarioQuery leftJoinPelicula($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pelicula relation
 * @method     ComentarioQuery rightJoinPelicula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pelicula relation
 * @method     ComentarioQuery innerJoinPelicula($relationAlias = null) Adds a INNER JOIN clause to the query using the Pelicula relation
 *
 * @method     Comentario findOne(PropelPDO $con = null) Return the first Comentario matching the query
 * @method     Comentario findOneOrCreate(PropelPDO $con = null) Return the first Comentario matching the query, or a new Comentario object populated from the query conditions when no match is found
 *
 * @method     Comentario findOneById(int $id) Return the first Comentario filtered by the id column
 * @method     Comentario findOneBySocioId(int $socio_id) Return the first Comentario filtered by the socio_id column
 * @method     Comentario findOneByPeliculaId(int $pelicula_id) Return the first Comentario filtered by the pelicula_id column
 * @method     Comentario findOneByDetalle(string $detalle) Return the first Comentario filtered by the detalle column
 * @method     Comentario findOneByFecha(string $fecha) Return the first Comentario filtered by the fecha column
 *
 * @method     array findById(int $id) Return Comentario objects filtered by the id column
 * @method     array findBySocioId(int $socio_id) Return Comentario objects filtered by the socio_id column
 * @method     array findByPeliculaId(int $pelicula_id) Return Comentario objects filtered by the pelicula_id column
 * @method     array findByDetalle(string $detalle) Return Comentario objects filtered by the detalle column
 * @method     array findByFecha(string $fecha) Return Comentario objects filtered by the fecha column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseComentarioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseComentarioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Comentario', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ComentarioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ComentarioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ComentarioQuery) {
			return $criteria;
		}
		$query = new ComentarioQuery();
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
	 * @return    Comentario|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ComentarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ComentarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Comentario A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SOCIO_ID`, `PELICULA_ID`, `DETALLE`, `FECHA` FROM `comentario` WHERE `ID` = :p0';
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
			$obj = new Comentario();
			$obj->hydrate($row);
			ComentarioPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Comentario|array|mixed the result, formatted by the current formatter
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
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ComentarioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ComentarioPeer::ID, $keys, Criteria::IN);
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
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ComentarioPeer::ID, $id, $comparison);
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
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterBySocioId($socioId = null, $comparison = null)
	{
		if (is_array($socioId)) {
			$useMinMax = false;
			if (isset($socioId['min'])) {
				$this->addUsingAlias(ComentarioPeer::SOCIO_ID, $socioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($socioId['max'])) {
				$this->addUsingAlias(ComentarioPeer::SOCIO_ID, $socioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioPeer::SOCIO_ID, $socioId, $comparison);
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
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByPeliculaId($peliculaId = null, $comparison = null)
	{
		if (is_array($peliculaId)) {
			$useMinMax = false;
			if (isset($peliculaId['min'])) {
				$this->addUsingAlias(ComentarioPeer::PELICULA_ID, $peliculaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($peliculaId['max'])) {
				$this->addUsingAlias(ComentarioPeer::PELICULA_ID, $peliculaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioPeer::PELICULA_ID, $peliculaId, $comparison);
	}

	/**
	 * Filter the query on the detalle column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDetalle('fooValue');   // WHERE detalle = 'fooValue'
	 * $query->filterByDetalle('%fooValue%'); // WHERE detalle LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $detalle The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByDetalle($detalle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($detalle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $detalle)) {
				$detalle = str_replace('*', '%', $detalle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ComentarioPeer::DETALLE, $detalle, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(ComentarioPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(ComentarioPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query by a related Socio object
	 *
	 * @param     Socio|PropelCollection $socio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterBySocio($socio, $comparison = null)
	{
		if ($socio instanceof Socio) {
			return $this
				->addUsingAlias(ComentarioPeer::SOCIO_ID, $socio->getId(), $comparison);
		} elseif ($socio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComentarioPeer::SOCIO_ID, $socio->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ComentarioQuery The current query, for fluid interface
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
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function filterByPelicula($pelicula, $comparison = null)
	{
		if ($pelicula instanceof Pelicula) {
			return $this
				->addUsingAlias(ComentarioPeer::PELICULA_ID, $pelicula->getId(), $comparison);
		} elseif ($pelicula instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComentarioPeer::PELICULA_ID, $pelicula->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ComentarioQuery The current query, for fluid interface
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
	 * @param     Comentario $comentario Object to remove from the list of results
	 *
	 * @return    ComentarioQuery The current query, for fluid interface
	 */
	public function prune($comentario = null)
	{
		if ($comentario) {
			$this->addUsingAlias(ComentarioPeer::ID, $comentario->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseComentarioQuery