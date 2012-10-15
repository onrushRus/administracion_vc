<?php


/**
 * Base class that represents a query for the 'pelicula' table.
 *
 * 
 *
 * @method     PeliculaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PeliculaQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     PeliculaQuery orderByDuracion($order = Criteria::ASC) Order by the duracion column
 * @method     PeliculaQuery orderByFechaEstreno($order = Criteria::ASC) Order by the fecha_estreno column
 * @method     PeliculaQuery orderByEstreno($order = Criteria::ASC) Order by the estreno column
 * @method     PeliculaQuery orderByActor1Nom($order = Criteria::ASC) Order by the actor1_nom column
 * @method     PeliculaQuery orderByActor1Apell($order = Criteria::ASC) Order by the actor1_apell column
 * @method     PeliculaQuery orderByActor2Nom($order = Criteria::ASC) Order by the actor2_nom column
 * @method     PeliculaQuery orderByActor2Apell($order = Criteria::ASC) Order by the actor2_apell column
 * @method     PeliculaQuery orderByCategoriaId($order = Criteria::ASC) Order by the categoria_id column
 * @method     PeliculaQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     PeliculaQuery orderBySinopsis($order = Criteria::ASC) Order by the sinopsis column
 * @method     PeliculaQuery orderByImagen($order = Criteria::ASC) Order by the imagen column
 *
 * @method     PeliculaQuery groupById() Group by the id column
 * @method     PeliculaQuery groupByTitulo() Group by the titulo column
 * @method     PeliculaQuery groupByDuracion() Group by the duracion column
 * @method     PeliculaQuery groupByFechaEstreno() Group by the fecha_estreno column
 * @method     PeliculaQuery groupByEstreno() Group by the estreno column
 * @method     PeliculaQuery groupByActor1Nom() Group by the actor1_nom column
 * @method     PeliculaQuery groupByActor1Apell() Group by the actor1_apell column
 * @method     PeliculaQuery groupByActor2Nom() Group by the actor2_nom column
 * @method     PeliculaQuery groupByActor2Apell() Group by the actor2_apell column
 * @method     PeliculaQuery groupByCategoriaId() Group by the categoria_id column
 * @method     PeliculaQuery groupByEstado() Group by the estado column
 * @method     PeliculaQuery groupBySinopsis() Group by the sinopsis column
 * @method     PeliculaQuery groupByImagen() Group by the imagen column
 *
 * @method     PeliculaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PeliculaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PeliculaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PeliculaQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     PeliculaQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     PeliculaQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     PeliculaQuery leftJoinEstadoPelicula($relationAlias = null) Adds a LEFT JOIN clause to the query using the EstadoPelicula relation
 * @method     PeliculaQuery rightJoinEstadoPelicula($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EstadoPelicula relation
 * @method     PeliculaQuery innerJoinEstadoPelicula($relationAlias = null) Adds a INNER JOIN clause to the query using the EstadoPelicula relation
 *
 * @method     PeliculaQuery leftJoinComentario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comentario relation
 * @method     PeliculaQuery rightJoinComentario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comentario relation
 * @method     PeliculaQuery innerJoinComentario($relationAlias = null) Adds a INNER JOIN clause to the query using the Comentario relation
 *
 * @method     PeliculaQuery leftJoinReservas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reservas relation
 * @method     PeliculaQuery rightJoinReservas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reservas relation
 * @method     PeliculaQuery innerJoinReservas($relationAlias = null) Adds a INNER JOIN clause to the query using the Reservas relation
 *
 * @method     PeliculaQuery leftJoinSocioAlquiler($relationAlias = null) Adds a LEFT JOIN clause to the query using the SocioAlquiler relation
 * @method     PeliculaQuery rightJoinSocioAlquiler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SocioAlquiler relation
 * @method     PeliculaQuery innerJoinSocioAlquiler($relationAlias = null) Adds a INNER JOIN clause to the query using the SocioAlquiler relation
 *
 * @method     Pelicula findOne(PropelPDO $con = null) Return the first Pelicula matching the query
 * @method     Pelicula findOneOrCreate(PropelPDO $con = null) Return the first Pelicula matching the query, or a new Pelicula object populated from the query conditions when no match is found
 *
 * @method     Pelicula findOneById(int $id) Return the first Pelicula filtered by the id column
 * @method     Pelicula findOneByTitulo(string $titulo) Return the first Pelicula filtered by the titulo column
 * @method     Pelicula findOneByDuracion(string $duracion) Return the first Pelicula filtered by the duracion column
 * @method     Pelicula findOneByFechaEstreno(string $fecha_estreno) Return the first Pelicula filtered by the fecha_estreno column
 * @method     Pelicula findOneByEstreno(boolean $estreno) Return the first Pelicula filtered by the estreno column
 * @method     Pelicula findOneByActor1Nom(string $actor1_nom) Return the first Pelicula filtered by the actor1_nom column
 * @method     Pelicula findOneByActor1Apell(string $actor1_apell) Return the first Pelicula filtered by the actor1_apell column
 * @method     Pelicula findOneByActor2Nom(string $actor2_nom) Return the first Pelicula filtered by the actor2_nom column
 * @method     Pelicula findOneByActor2Apell(string $actor2_apell) Return the first Pelicula filtered by the actor2_apell column
 * @method     Pelicula findOneByCategoriaId(int $categoria_id) Return the first Pelicula filtered by the categoria_id column
 * @method     Pelicula findOneByEstado(int $estado) Return the first Pelicula filtered by the estado column
 * @method     Pelicula findOneBySinopsis(string $sinopsis) Return the first Pelicula filtered by the sinopsis column
 * @method     Pelicula findOneByImagen(string $imagen) Return the first Pelicula filtered by the imagen column
 *
 * @method     array findById(int $id) Return Pelicula objects filtered by the id column
 * @method     array findByTitulo(string $titulo) Return Pelicula objects filtered by the titulo column
 * @method     array findByDuracion(string $duracion) Return Pelicula objects filtered by the duracion column
 * @method     array findByFechaEstreno(string $fecha_estreno) Return Pelicula objects filtered by the fecha_estreno column
 * @method     array findByEstreno(boolean $estreno) Return Pelicula objects filtered by the estreno column
 * @method     array findByActor1Nom(string $actor1_nom) Return Pelicula objects filtered by the actor1_nom column
 * @method     array findByActor1Apell(string $actor1_apell) Return Pelicula objects filtered by the actor1_apell column
 * @method     array findByActor2Nom(string $actor2_nom) Return Pelicula objects filtered by the actor2_nom column
 * @method     array findByActor2Apell(string $actor2_apell) Return Pelicula objects filtered by the actor2_apell column
 * @method     array findByCategoriaId(int $categoria_id) Return Pelicula objects filtered by the categoria_id column
 * @method     array findByEstado(int $estado) Return Pelicula objects filtered by the estado column
 * @method     array findBySinopsis(string $sinopsis) Return Pelicula objects filtered by the sinopsis column
 * @method     array findByImagen(string $imagen) Return Pelicula objects filtered by the imagen column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePeliculaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePeliculaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Pelicula', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PeliculaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PeliculaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PeliculaQuery) {
			return $criteria;
		}
		$query = new PeliculaQuery();
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
	 * @return    Pelicula|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PeliculaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pelicula A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TITULO`, `DURACION`, `FECHA_ESTRENO`, `ESTRENO`, `ACTOR1_NOM`, `ACTOR1_APELL`, `ACTOR2_NOM`, `ACTOR2_APELL`, `CATEGORIA_ID`, `ESTADO`, `SINOPSIS`, `IMAGEN` FROM `pelicula` WHERE `ID` = :p0';
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
			$obj = new Pelicula();
			$obj->hydrate($row);
			PeliculaPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Pelicula|array|mixed the result, formatted by the current formatter
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
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PeliculaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PeliculaPeer::ID, $keys, Criteria::IN);
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
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PeliculaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the titulo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTitulo('fooValue');   // WHERE titulo = 'fooValue'
	 * $query->filterByTitulo('%fooValue%'); // WHERE titulo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $titulo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByTitulo($titulo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($titulo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $titulo)) {
				$titulo = str_replace('*', '%', $titulo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::TITULO, $titulo, $comparison);
	}

	/**
	 * Filter the query on the duracion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDuracion('2011-03-14'); // WHERE duracion = '2011-03-14'
	 * $query->filterByDuracion('now'); // WHERE duracion = '2011-03-14'
	 * $query->filterByDuracion(array('max' => 'yesterday')); // WHERE duracion > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $duracion The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByDuracion($duracion = null, $comparison = null)
	{
		if (is_array($duracion)) {
			$useMinMax = false;
			if (isset($duracion['min'])) {
				$this->addUsingAlias(PeliculaPeer::DURACION, $duracion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($duracion['max'])) {
				$this->addUsingAlias(PeliculaPeer::DURACION, $duracion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::DURACION, $duracion, $comparison);
	}

	/**
	 * Filter the query on the fecha_estreno column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaEstreno('2011-03-14'); // WHERE fecha_estreno = '2011-03-14'
	 * $query->filterByFechaEstreno('now'); // WHERE fecha_estreno = '2011-03-14'
	 * $query->filterByFechaEstreno(array('max' => 'yesterday')); // WHERE fecha_estreno > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaEstreno The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByFechaEstreno($fechaEstreno = null, $comparison = null)
	{
		if (is_array($fechaEstreno)) {
			$useMinMax = false;
			if (isset($fechaEstreno['min'])) {
				$this->addUsingAlias(PeliculaPeer::FECHA_ESTRENO, $fechaEstreno['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaEstreno['max'])) {
				$this->addUsingAlias(PeliculaPeer::FECHA_ESTRENO, $fechaEstreno['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::FECHA_ESTRENO, $fechaEstreno, $comparison);
	}

	/**
	 * Filter the query on the estreno column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEstreno(true); // WHERE estreno = true
	 * $query->filterByEstreno('yes'); // WHERE estreno = true
	 * </code>
	 *
	 * @param     boolean|string $estreno The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByEstreno($estreno = null, $comparison = null)
	{
		if (is_string($estreno)) {
			$estreno = in_array(strtolower($estreno), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PeliculaPeer::ESTRENO, $estreno, $comparison);
	}

	/**
	 * Filter the query on the actor1_nom column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActor1Nom('fooValue');   // WHERE actor1_nom = 'fooValue'
	 * $query->filterByActor1Nom('%fooValue%'); // WHERE actor1_nom LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actor1Nom The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByActor1Nom($actor1Nom = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actor1Nom)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actor1Nom)) {
				$actor1Nom = str_replace('*', '%', $actor1Nom);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::ACTOR1_NOM, $actor1Nom, $comparison);
	}

	/**
	 * Filter the query on the actor1_apell column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActor1Apell('fooValue');   // WHERE actor1_apell = 'fooValue'
	 * $query->filterByActor1Apell('%fooValue%'); // WHERE actor1_apell LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actor1Apell The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByActor1Apell($actor1Apell = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actor1Apell)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actor1Apell)) {
				$actor1Apell = str_replace('*', '%', $actor1Apell);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::ACTOR1_APELL, $actor1Apell, $comparison);
	}

	/**
	 * Filter the query on the actor2_nom column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActor2Nom('fooValue');   // WHERE actor2_nom = 'fooValue'
	 * $query->filterByActor2Nom('%fooValue%'); // WHERE actor2_nom LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actor2Nom The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByActor2Nom($actor2Nom = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actor2Nom)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actor2Nom)) {
				$actor2Nom = str_replace('*', '%', $actor2Nom);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::ACTOR2_NOM, $actor2Nom, $comparison);
	}

	/**
	 * Filter the query on the actor2_apell column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActor2Apell('fooValue');   // WHERE actor2_apell = 'fooValue'
	 * $query->filterByActor2Apell('%fooValue%'); // WHERE actor2_apell LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $actor2Apell The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByActor2Apell($actor2Apell = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actor2Apell)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actor2Apell)) {
				$actor2Apell = str_replace('*', '%', $actor2Apell);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::ACTOR2_APELL, $actor2Apell, $comparison);
	}

	/**
	 * Filter the query on the categoria_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoriaId(1234); // WHERE categoria_id = 1234
	 * $query->filterByCategoriaId(array(12, 34)); // WHERE categoria_id IN (12, 34)
	 * $query->filterByCategoriaId(array('min' => 12)); // WHERE categoria_id > 12
	 * </code>
	 *
	 * @see       filterByCategoria()
	 *
	 * @param     mixed $categoriaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByCategoriaId($categoriaId = null, $comparison = null)
	{
		if (is_array($categoriaId)) {
			$useMinMax = false;
			if (isset($categoriaId['min'])) {
				$this->addUsingAlias(PeliculaPeer::CATEGORIA_ID, $categoriaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoriaId['max'])) {
				$this->addUsingAlias(PeliculaPeer::CATEGORIA_ID, $categoriaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::CATEGORIA_ID, $categoriaId, $comparison);
	}

	/**
	 * Filter the query on the estado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEstado(1234); // WHERE estado = 1234
	 * $query->filterByEstado(array(12, 34)); // WHERE estado IN (12, 34)
	 * $query->filterByEstado(array('min' => 12)); // WHERE estado > 12
	 * </code>
	 *
	 * @see       filterByEstadoPelicula()
	 *
	 * @param     mixed $estado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByEstado($estado = null, $comparison = null)
	{
		if (is_array($estado)) {
			$useMinMax = false;
			if (isset($estado['min'])) {
				$this->addUsingAlias(PeliculaPeer::ESTADO, $estado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($estado['max'])) {
				$this->addUsingAlias(PeliculaPeer::ESTADO, $estado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::ESTADO, $estado, $comparison);
	}

	/**
	 * Filter the query on the sinopsis column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySinopsis('fooValue');   // WHERE sinopsis = 'fooValue'
	 * $query->filterBySinopsis('%fooValue%'); // WHERE sinopsis LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sinopsis The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterBySinopsis($sinopsis = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sinopsis)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sinopsis)) {
				$sinopsis = str_replace('*', '%', $sinopsis);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::SINOPSIS, $sinopsis, $comparison);
	}

	/**
	 * Filter the query on the imagen column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImagen('fooValue');   // WHERE imagen = 'fooValue'
	 * $query->filterByImagen('%fooValue%'); // WHERE imagen LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $imagen The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByImagen($imagen = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imagen)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imagen)) {
				$imagen = str_replace('*', '%', $imagen);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PeliculaPeer::IMAGEN, $imagen, $comparison);
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(PeliculaPeer::CATEGORIA_ID, $categoria->getId(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PeliculaPeer::CATEGORIA_ID, $categoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategoria() only accepts arguments of type Categoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Categoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function joinCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Categoria');

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
			$this->addJoinObject($join, 'Categoria');
		}

		return $this;
	}

	/**
	 * Use the Categoria relation Categoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Categoria', 'CategoriaQuery');
	}

	/**
	 * Filter the query by a related EstadoPelicula object
	 *
	 * @param     EstadoPelicula|PropelCollection $estadoPelicula The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByEstadoPelicula($estadoPelicula, $comparison = null)
	{
		if ($estadoPelicula instanceof EstadoPelicula) {
			return $this
				->addUsingAlias(PeliculaPeer::ESTADO, $estadoPelicula->getId(), $comparison);
		} elseif ($estadoPelicula instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PeliculaPeer::ESTADO, $estadoPelicula->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByEstadoPelicula() only accepts arguments of type EstadoPelicula or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the EstadoPelicula relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function joinEstadoPelicula($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EstadoPelicula');

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
			$this->addJoinObject($join, 'EstadoPelicula');
		}

		return $this;
	}

	/**
	 * Use the EstadoPelicula relation EstadoPelicula object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EstadoPeliculaQuery A secondary query class using the current class as primary query
	 */
	public function useEstadoPeliculaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEstadoPelicula($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EstadoPelicula', 'EstadoPeliculaQuery');
	}

	/**
	 * Filter the query by a related Comentario object
	 *
	 * @param     Comentario $comentario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByComentario($comentario, $comparison = null)
	{
		if ($comentario instanceof Comentario) {
			return $this
				->addUsingAlias(PeliculaPeer::ID, $comentario->getPeliculaId(), $comparison);
		} elseif ($comentario instanceof PropelCollection) {
			return $this
				->useComentarioQuery()
				->filterByPrimaryKeys($comentario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByComentario() only accepts arguments of type Comentario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Comentario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function joinComentario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Comentario');

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
			$this->addJoinObject($join, 'Comentario');
		}

		return $this;
	}

	/**
	 * Use the Comentario relation Comentario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComentarioQuery A secondary query class using the current class as primary query
	 */
	public function useComentarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinComentario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Comentario', 'ComentarioQuery');
	}

	/**
	 * Filter the query by a related Reservas object
	 *
	 * @param     Reservas $reservas  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterByReservas($reservas, $comparison = null)
	{
		if ($reservas instanceof Reservas) {
			return $this
				->addUsingAlias(PeliculaPeer::ID, $reservas->getPeliculaId(), $comparison);
		} elseif ($reservas instanceof PropelCollection) {
			return $this
				->useReservasQuery()
				->filterByPrimaryKeys($reservas->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByReservas() only accepts arguments of type Reservas or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Reservas relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function joinReservas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Reservas');

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
			$this->addJoinObject($join, 'Reservas');
		}

		return $this;
	}

	/**
	 * Use the Reservas relation Reservas object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ReservasQuery A secondary query class using the current class as primary query
	 */
	public function useReservasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinReservas($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Reservas', 'ReservasQuery');
	}

	/**
	 * Filter the query by a related SocioAlquiler object
	 *
	 * @param     SocioAlquiler $socioAlquiler  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function filterBySocioAlquiler($socioAlquiler, $comparison = null)
	{
		if ($socioAlquiler instanceof SocioAlquiler) {
			return $this
				->addUsingAlias(PeliculaPeer::ID, $socioAlquiler->getPeliculaId(), $comparison);
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
	 * @return    PeliculaQuery The current query, for fluid interface
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
	 * @param     Pelicula $pelicula Object to remove from the list of results
	 *
	 * @return    PeliculaQuery The current query, for fluid interface
	 */
	public function prune($pelicula = null)
	{
		if ($pelicula) {
			$this->addUsingAlias(PeliculaPeer::ID, $pelicula->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePeliculaQuery