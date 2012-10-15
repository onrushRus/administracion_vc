<?php


/**
 * Base class that represents a query for the 'horarios' table.
 *
 * 
 *
 * @method     HorariosQuery orderByLadTmOn($order = Criteria::ASC) Order by the LaD_TM_on column
 * @method     HorariosQuery orderByLadTmOff($order = Criteria::ASC) Order by the LaD_TM_off column
 * @method     HorariosQuery orderByLadTtOn($order = Criteria::ASC) Order by the LaD_TT_on column
 * @method     HorariosQuery orderByLadTtOff($order = Criteria::ASC) Order by the LaD_TT_off column
 * @method     HorariosQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     HorariosQuery groupByLadTmOn() Group by the LaD_TM_on column
 * @method     HorariosQuery groupByLadTmOff() Group by the LaD_TM_off column
 * @method     HorariosQuery groupByLadTtOn() Group by the LaD_TT_on column
 * @method     HorariosQuery groupByLadTtOff() Group by the LaD_TT_off column
 * @method     HorariosQuery groupById() Group by the id column
 *
 * @method     HorariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     HorariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     HorariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Horarios findOne(PropelPDO $con = null) Return the first Horarios matching the query
 * @method     Horarios findOneOrCreate(PropelPDO $con = null) Return the first Horarios matching the query, or a new Horarios object populated from the query conditions when no match is found
 *
 * @method     Horarios findOneByLadTmOn(string $LaD_TM_on) Return the first Horarios filtered by the LaD_TM_on column
 * @method     Horarios findOneByLadTmOff(string $LaD_TM_off) Return the first Horarios filtered by the LaD_TM_off column
 * @method     Horarios findOneByLadTtOn(string $LaD_TT_on) Return the first Horarios filtered by the LaD_TT_on column
 * @method     Horarios findOneByLadTtOff(string $LaD_TT_off) Return the first Horarios filtered by the LaD_TT_off column
 * @method     Horarios findOneById(int $id) Return the first Horarios filtered by the id column
 *
 * @method     array findByLadTmOn(string $LaD_TM_on) Return Horarios objects filtered by the LaD_TM_on column
 * @method     array findByLadTmOff(string $LaD_TM_off) Return Horarios objects filtered by the LaD_TM_off column
 * @method     array findByLadTtOn(string $LaD_TT_on) Return Horarios objects filtered by the LaD_TT_on column
 * @method     array findByLadTtOff(string $LaD_TT_off) Return Horarios objects filtered by the LaD_TT_off column
 * @method     array findById(int $id) Return Horarios objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseHorariosQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseHorariosQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Horarios', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new HorariosQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    HorariosQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof HorariosQuery) {
			return $criteria;
		}
		$query = new HorariosQuery();
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
	 * @return    Horarios|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = HorariosPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(HorariosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Horarios A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `LAD_TM_ON`, `LAD_TM_OFF`, `LAD_TT_ON`, `LAD_TT_OFF`, `ID` FROM `horarios` WHERE `ID` = :p0';
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
			$obj = new Horarios();
			$obj->hydrate($row);
			HorariosPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Horarios|array|mixed the result, formatted by the current formatter
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
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(HorariosPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(HorariosPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the LaD_TM_on column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLadTmOn('2011-03-14'); // WHERE LaD_TM_on = '2011-03-14'
	 * $query->filterByLadTmOn('now'); // WHERE LaD_TM_on = '2011-03-14'
	 * $query->filterByLadTmOn(array('max' => 'yesterday')); // WHERE LaD_TM_on > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $ladTmOn The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByLadTmOn($ladTmOn = null, $comparison = null)
	{
		if (is_array($ladTmOn)) {
			$useMinMax = false;
			if (isset($ladTmOn['min'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TM_ON, $ladTmOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ladTmOn['max'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TM_ON, $ladTmOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HorariosPeer::LAD_TM_ON, $ladTmOn, $comparison);
	}

	/**
	 * Filter the query on the LaD_TM_off column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLadTmOff('2011-03-14'); // WHERE LaD_TM_off = '2011-03-14'
	 * $query->filterByLadTmOff('now'); // WHERE LaD_TM_off = '2011-03-14'
	 * $query->filterByLadTmOff(array('max' => 'yesterday')); // WHERE LaD_TM_off > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $ladTmOff The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByLadTmOff($ladTmOff = null, $comparison = null)
	{
		if (is_array($ladTmOff)) {
			$useMinMax = false;
			if (isset($ladTmOff['min'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TM_OFF, $ladTmOff['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ladTmOff['max'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TM_OFF, $ladTmOff['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HorariosPeer::LAD_TM_OFF, $ladTmOff, $comparison);
	}

	/**
	 * Filter the query on the LaD_TT_on column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLadTtOn('2011-03-14'); // WHERE LaD_TT_on = '2011-03-14'
	 * $query->filterByLadTtOn('now'); // WHERE LaD_TT_on = '2011-03-14'
	 * $query->filterByLadTtOn(array('max' => 'yesterday')); // WHERE LaD_TT_on > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $ladTtOn The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByLadTtOn($ladTtOn = null, $comparison = null)
	{
		if (is_array($ladTtOn)) {
			$useMinMax = false;
			if (isset($ladTtOn['min'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TT_ON, $ladTtOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ladTtOn['max'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TT_ON, $ladTtOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HorariosPeer::LAD_TT_ON, $ladTtOn, $comparison);
	}

	/**
	 * Filter the query on the LaD_TT_off column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLadTtOff('2011-03-14'); // WHERE LaD_TT_off = '2011-03-14'
	 * $query->filterByLadTtOff('now'); // WHERE LaD_TT_off = '2011-03-14'
	 * $query->filterByLadTtOff(array('max' => 'yesterday')); // WHERE LaD_TT_off > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $ladTtOff The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterByLadTtOff($ladTtOff = null, $comparison = null)
	{
		if (is_array($ladTtOff)) {
			$useMinMax = false;
			if (isset($ladTtOff['min'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TT_OFF, $ladTtOff['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ladTtOff['max'])) {
				$this->addUsingAlias(HorariosPeer::LAD_TT_OFF, $ladTtOff['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(HorariosPeer::LAD_TT_OFF, $ladTtOff, $comparison);
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
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(HorariosPeer::ID, $id, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Horarios $horarios Object to remove from the list of results
	 *
	 * @return    HorariosQuery The current query, for fluid interface
	 */
	public function prune($horarios = null)
	{
		if ($horarios) {
			$this->addUsingAlias(HorariosPeer::ID, $horarios->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseHorariosQuery