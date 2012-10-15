<?php


/**
 * Base class that represents a query for the 'socio' table.
 *
 * 
 *
 * @method     SocioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SocioQuery orderByDni($order = Criteria::ASC) Order by the dni column
 * @method     SocioQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     SocioQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     SocioQuery orderByDireccion($order = Criteria::ASC) Order by the direccion column
 * @method     SocioQuery orderByTelCel($order = Criteria::ASC) Order by the tel_cel column
 * @method     SocioQuery orderByFechaNacimiento($order = Criteria::ASC) Order by the fecha_nacimiento column
 * @method     SocioQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method     SocioQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     SocioQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     SocioQuery orderByTipoSocioId($order = Criteria::ASC) Order by the tipo_socio_id column
 * @method     SocioQuery orderByActivo($order = Criteria::ASC) Order by the activo column
 *
 * @method     SocioQuery groupById() Group by the id column
 * @method     SocioQuery groupByDni() Group by the dni column
 * @method     SocioQuery groupByNombre() Group by the nombre column
 * @method     SocioQuery groupByApellido() Group by the apellido column
 * @method     SocioQuery groupByDireccion() Group by the direccion column
 * @method     SocioQuery groupByTelCel() Group by the tel_cel column
 * @method     SocioQuery groupByFechaNacimiento() Group by the fecha_nacimiento column
 * @method     SocioQuery groupByUsuario() Group by the usuario column
 * @method     SocioQuery groupByPassword() Group by the password column
 * @method     SocioQuery groupByEmail() Group by the email column
 * @method     SocioQuery groupByTipoSocioId() Group by the tipo_socio_id column
 * @method     SocioQuery groupByActivo() Group by the activo column
 *
 * @method     SocioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SocioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SocioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SocioQuery leftJoinTipoSocio($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoSocio relation
 * @method     SocioQuery rightJoinTipoSocio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoSocio relation
 * @method     SocioQuery innerJoinTipoSocio($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoSocio relation
 *
 * @method     SocioQuery leftJoinAlquiler($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alquiler relation
 * @method     SocioQuery rightJoinAlquiler($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alquiler relation
 * @method     SocioQuery innerJoinAlquiler($relationAlias = null) Adds a INNER JOIN clause to the query using the Alquiler relation
 *
 * @method     SocioQuery leftJoinComentario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comentario relation
 * @method     SocioQuery rightJoinComentario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comentario relation
 * @method     SocioQuery innerJoinComentario($relationAlias = null) Adds a INNER JOIN clause to the query using the Comentario relation
 *
 * @method     SocioQuery leftJoinReservas($relationAlias = null) Adds a LEFT JOIN clause to the query using the Reservas relation
 * @method     SocioQuery rightJoinReservas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Reservas relation
 * @method     SocioQuery innerJoinReservas($relationAlias = null) Adds a INNER JOIN clause to the query using the Reservas relation
 *
 * @method     Socio findOne(PropelPDO $con = null) Return the first Socio matching the query
 * @method     Socio findOneOrCreate(PropelPDO $con = null) Return the first Socio matching the query, or a new Socio object populated from the query conditions when no match is found
 *
 * @method     Socio findOneById(int $id) Return the first Socio filtered by the id column
 * @method     Socio findOneByDni(string $dni) Return the first Socio filtered by the dni column
 * @method     Socio findOneByNombre(string $nombre) Return the first Socio filtered by the nombre column
 * @method     Socio findOneByApellido(string $apellido) Return the first Socio filtered by the apellido column
 * @method     Socio findOneByDireccion(string $direccion) Return the first Socio filtered by the direccion column
 * @method     Socio findOneByTelCel(string $tel_cel) Return the first Socio filtered by the tel_cel column
 * @method     Socio findOneByFechaNacimiento(string $fecha_nacimiento) Return the first Socio filtered by the fecha_nacimiento column
 * @method     Socio findOneByUsuario(string $usuario) Return the first Socio filtered by the usuario column
 * @method     Socio findOneByPassword(string $password) Return the first Socio filtered by the password column
 * @method     Socio findOneByEmail(string $email) Return the first Socio filtered by the email column
 * @method     Socio findOneByTipoSocioId(int $tipo_socio_id) Return the first Socio filtered by the tipo_socio_id column
 * @method     Socio findOneByActivo(boolean $activo) Return the first Socio filtered by the activo column
 *
 * @method     array findById(int $id) Return Socio objects filtered by the id column
 * @method     array findByDni(string $dni) Return Socio objects filtered by the dni column
 * @method     array findByNombre(string $nombre) Return Socio objects filtered by the nombre column
 * @method     array findByApellido(string $apellido) Return Socio objects filtered by the apellido column
 * @method     array findByDireccion(string $direccion) Return Socio objects filtered by the direccion column
 * @method     array findByTelCel(string $tel_cel) Return Socio objects filtered by the tel_cel column
 * @method     array findByFechaNacimiento(string $fecha_nacimiento) Return Socio objects filtered by the fecha_nacimiento column
 * @method     array findByUsuario(string $usuario) Return Socio objects filtered by the usuario column
 * @method     array findByPassword(string $password) Return Socio objects filtered by the password column
 * @method     array findByEmail(string $email) Return Socio objects filtered by the email column
 * @method     array findByTipoSocioId(int $tipo_socio_id) Return Socio objects filtered by the tipo_socio_id column
 * @method     array findByActivo(boolean $activo) Return Socio objects filtered by the activo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSocioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSocioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Socio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SocioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SocioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SocioQuery) {
			return $criteria;
		}
		$query = new SocioQuery();
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
	 * @return    Socio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SocioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Socio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DNI`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `TEL_CEL`, `FECHA_NACIMIENTO`, `USUARIO`, `PASSWORD`, `EMAIL`, `TIPO_SOCIO_ID`, `ACTIVO` FROM `socio` WHERE `ID` = :p0';
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
			$obj = new Socio();
			$obj->hydrate($row);
			SocioPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    Socio|array|mixed the result, formatted by the current formatter
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
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SocioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SocioPeer::ID, $keys, Criteria::IN);
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
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SocioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the dni column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDni('fooValue');   // WHERE dni = 'fooValue'
	 * $query->filterByDni('%fooValue%'); // WHERE dni LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dni The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByDni($dni = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dni)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dni)) {
				$dni = str_replace('*', '%', $dni);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::DNI, $dni, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
	 * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nombre The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the apellido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApellido('fooValue');   // WHERE apellido = 'fooValue'
	 * $query->filterByApellido('%fooValue%'); // WHERE apellido LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $apellido The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByApellido($apellido = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($apellido)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $apellido)) {
				$apellido = str_replace('*', '%', $apellido);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::APELLIDO, $apellido, $comparison);
	}

	/**
	 * Filter the query on the direccion column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDireccion('fooValue');   // WHERE direccion = 'fooValue'
	 * $query->filterByDireccion('%fooValue%'); // WHERE direccion LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $direccion The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByDireccion($direccion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($direccion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $direccion)) {
				$direccion = str_replace('*', '%', $direccion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::DIRECCION, $direccion, $comparison);
	}

	/**
	 * Filter the query on the tel_cel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelCel('fooValue');   // WHERE tel_cel = 'fooValue'
	 * $query->filterByTelCel('%fooValue%'); // WHERE tel_cel LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telCel The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByTelCel($telCel = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telCel)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telCel)) {
				$telCel = str_replace('*', '%', $telCel);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::TEL_CEL, $telCel, $comparison);
	}

	/**
	 * Filter the query on the fecha_nacimiento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFechaNacimiento('2011-03-14'); // WHERE fecha_nacimiento = '2011-03-14'
	 * $query->filterByFechaNacimiento('now'); // WHERE fecha_nacimiento = '2011-03-14'
	 * $query->filterByFechaNacimiento(array('max' => 'yesterday')); // WHERE fecha_nacimiento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fechaNacimiento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByFechaNacimiento($fechaNacimiento = null, $comparison = null)
	{
		if (is_array($fechaNacimiento)) {
			$useMinMax = false;
			if (isset($fechaNacimiento['min'])) {
				$this->addUsingAlias(SocioPeer::FECHA_NACIMIENTO, $fechaNacimiento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaNacimiento['max'])) {
				$this->addUsingAlias(SocioPeer::FECHA_NACIMIENTO, $fechaNacimiento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SocioPeer::FECHA_NACIMIENTO, $fechaNacimiento, $comparison);
	}

	/**
	 * Filter the query on the usuario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
	 * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $usuario The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($usuario)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $usuario)) {
				$usuario = str_replace('*', '%', $usuario);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::USUARIO, $usuario, $comparison);
	}

	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SocioPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the tipo_socio_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoSocioId(1234); // WHERE tipo_socio_id = 1234
	 * $query->filterByTipoSocioId(array(12, 34)); // WHERE tipo_socio_id IN (12, 34)
	 * $query->filterByTipoSocioId(array('min' => 12)); // WHERE tipo_socio_id > 12
	 * </code>
	 *
	 * @see       filterByTipoSocio()
	 *
	 * @param     mixed $tipoSocioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByTipoSocioId($tipoSocioId = null, $comparison = null)
	{
		if (is_array($tipoSocioId)) {
			$useMinMax = false;
			if (isset($tipoSocioId['min'])) {
				$this->addUsingAlias(SocioPeer::TIPO_SOCIO_ID, $tipoSocioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tipoSocioId['max'])) {
				$this->addUsingAlias(SocioPeer::TIPO_SOCIO_ID, $tipoSocioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SocioPeer::TIPO_SOCIO_ID, $tipoSocioId, $comparison);
	}

	/**
	 * Filter the query on the activo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByActivo(true); // WHERE activo = true
	 * $query->filterByActivo('yes'); // WHERE activo = true
	 * </code>
	 *
	 * @param     boolean|string $activo The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByActivo($activo = null, $comparison = null)
	{
		if (is_string($activo)) {
			$activo = in_array(strtolower($activo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SocioPeer::ACTIVO, $activo, $comparison);
	}

	/**
	 * Filter the query by a related TipoSocio object
	 *
	 * @param     TipoSocio|PropelCollection $tipoSocio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByTipoSocio($tipoSocio, $comparison = null)
	{
		if ($tipoSocio instanceof TipoSocio) {
			return $this
				->addUsingAlias(SocioPeer::TIPO_SOCIO_ID, $tipoSocio->getId(), $comparison);
		} elseif ($tipoSocio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SocioPeer::TIPO_SOCIO_ID, $tipoSocio->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTipoSocio() only accepts arguments of type TipoSocio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TipoSocio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function joinTipoSocio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TipoSocio');

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
			$this->addJoinObject($join, 'TipoSocio');
		}

		return $this;
	}

	/**
	 * Use the TipoSocio relation TipoSocio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoSocioQuery A secondary query class using the current class as primary query
	 */
	public function useTipoSocioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTipoSocio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TipoSocio', 'TipoSocioQuery');
	}

	/**
	 * Filter the query by a related Alquiler object
	 *
	 * @param     Alquiler $alquiler  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByAlquiler($alquiler, $comparison = null)
	{
		if ($alquiler instanceof Alquiler) {
			return $this
				->addUsingAlias(SocioPeer::ID, $alquiler->getSocioId(), $comparison);
		} elseif ($alquiler instanceof PropelCollection) {
			return $this
				->useAlquilerQuery()
				->filterByPrimaryKeys($alquiler->getPrimaryKeys())
				->endUse();
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
	 * @return    SocioQuery The current query, for fluid interface
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
	 * Filter the query by a related Comentario object
	 *
	 * @param     Comentario $comentario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByComentario($comentario, $comparison = null)
	{
		if ($comentario instanceof Comentario) {
			return $this
				->addUsingAlias(SocioPeer::ID, $comentario->getSocioId(), $comparison);
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
	 * @return    SocioQuery The current query, for fluid interface
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
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function filterByReservas($reservas, $comparison = null)
	{
		if ($reservas instanceof Reservas) {
			return $this
				->addUsingAlias(SocioPeer::ID, $reservas->getSocioId(), $comparison);
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
	 * @return    SocioQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Socio $socio Object to remove from the list of results
	 *
	 * @return    SocioQuery The current query, for fluid interface
	 */
	public function prune($socio = null)
	{
		if ($socio) {
			$this->addUsingAlias(SocioPeer::ID, $socio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSocioQuery