<?php


/**
 * Base class that represents a row from the 'pelicula' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePelicula extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PeliculaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PeliculaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the duracion field.
	 * @var        string
	 */
	protected $duracion;

	/**
	 * The value for the fecha_estreno field.
	 * @var        string
	 */
	protected $fecha_estreno;

	/**
	 * The value for the estreno field.
	 * @var        boolean
	 */
	protected $estreno;

	/**
	 * The value for the actor1_nom field.
	 * @var        string
	 */
	protected $actor1_nom;

	/**
	 * The value for the actor1_apell field.
	 * @var        string
	 */
	protected $actor1_apell;

	/**
	 * The value for the actor2_nom field.
	 * @var        string
	 */
	protected $actor2_nom;

	/**
	 * The value for the actor2_apell field.
	 * @var        string
	 */
	protected $actor2_apell;

	/**
	 * The value for the categoria_id field.
	 * @var        int
	 */
	protected $categoria_id;

	/**
	 * The value for the estado field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $estado;

	/**
	 * The value for the sinopsis field.
	 * @var        string
	 */
	protected $sinopsis;

	/**
	 * The value for the imagen field.
	 * @var        string
	 */
	protected $imagen;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

	/**
	 * @var        EstadoPelicula
	 */
	protected $aEstadoPelicula;

	/**
	 * @var        array Comentario[] Collection to store aggregation of Comentario objects.
	 */
	protected $collComentarios;

	/**
	 * @var        array Reservas[] Collection to store aggregation of Reservas objects.
	 */
	protected $collReservass;

	/**
	 * @var        array SocioAlquiler[] Collection to store aggregation of SocioAlquiler objects.
	 */
	protected $collSocioAlquilers;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $comentariosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $reservassScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $socioAlquilersScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->estado = 1;
	}

	/**
	 * Initializes internal state of BasePelicula object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [titulo] column value.
	 * 
	 * @return     string
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * Get the [optionally formatted] temporal [duracion] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDuracion($format = 'H:i:s')
	{
		if ($this->duracion === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->duracion);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->duracion, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [fecha_estreno] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaEstreno($format = 'Y-m-d')
	{
		if ($this->fecha_estreno === null) {
			return null;
		}


		if ($this->fecha_estreno === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_estreno);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_estreno, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [estreno] column value.
	 * 
	 * @return     boolean
	 */
	public function getEstreno()
	{
		return $this->estreno;
	}

	/**
	 * Get the [actor1_nom] column value.
	 * 
	 * @return     string
	 */
	public function getActor1Nom()
	{
		return $this->actor1_nom;
	}

	/**
	 * Get the [actor1_apell] column value.
	 * 
	 * @return     string
	 */
	public function getActor1Apell()
	{
		return $this->actor1_apell;
	}

	/**
	 * Get the [actor2_nom] column value.
	 * 
	 * @return     string
	 */
	public function getActor2Nom()
	{
		return $this->actor2_nom;
	}

	/**
	 * Get the [actor2_apell] column value.
	 * 
	 * @return     string
	 */
	public function getActor2Apell()
	{
		return $this->actor2_apell;
	}

	/**
	 * Get the [categoria_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaId()
	{
		return $this->categoria_id;
	}

	/**
	 * Get the [estado] column value.
	 * 
	 * @return     int
	 */
	public function getEstado()
	{
		return $this->estado;
	}

	/**
	 * Get the [sinopsis] column value.
	 * 
	 * @return     string
	 */
	public function getSinopsis()
	{
		return $this->sinopsis;
	}

	/**
	 * Get the [imagen] column value.
	 * 
	 * @return     string
	 */
	public function getImagen()
	{
		return $this->imagen;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PeliculaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = PeliculaPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Sets the value of [duracion] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setDuracion($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->duracion !== null || $dt !== null) {
			$currentDateAsString = ($this->duracion !== null && $tmpDt = new DateTime($this->duracion)) ? $tmpDt->format('H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->duracion = $newDateAsString;
				$this->modifiedColumns[] = PeliculaPeer::DURACION;
			}
		} // if either are not null

		return $this;
	} // setDuracion()

	/**
	 * Sets the value of [fecha_estreno] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setFechaEstreno($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_estreno !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_estreno !== null && $tmpDt = new DateTime($this->fecha_estreno)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_estreno = $newDateAsString;
				$this->modifiedColumns[] = PeliculaPeer::FECHA_ESTRENO;
			}
		} // if either are not null

		return $this;
	} // setFechaEstreno()

	/**
	 * Sets the value of the [estreno] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setEstreno($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->estreno !== $v) {
			$this->estreno = $v;
			$this->modifiedColumns[] = PeliculaPeer::ESTRENO;
		}

		return $this;
	} // setEstreno()

	/**
	 * Set the value of [actor1_nom] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setActor1Nom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor1_nom !== $v) {
			$this->actor1_nom = $v;
			$this->modifiedColumns[] = PeliculaPeer::ACTOR1_NOM;
		}

		return $this;
	} // setActor1Nom()

	/**
	 * Set the value of [actor1_apell] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setActor1Apell($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor1_apell !== $v) {
			$this->actor1_apell = $v;
			$this->modifiedColumns[] = PeliculaPeer::ACTOR1_APELL;
		}

		return $this;
	} // setActor1Apell()

	/**
	 * Set the value of [actor2_nom] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setActor2Nom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor2_nom !== $v) {
			$this->actor2_nom = $v;
			$this->modifiedColumns[] = PeliculaPeer::ACTOR2_NOM;
		}

		return $this;
	} // setActor2Nom()

	/**
	 * Set the value of [actor2_apell] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setActor2Apell($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->actor2_apell !== $v) {
			$this->actor2_apell = $v;
			$this->modifiedColumns[] = PeliculaPeer::ACTOR2_APELL;
		}

		return $this;
	} // setActor2Apell()

	/**
	 * Set the value of [categoria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setCategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_id !== $v) {
			$this->categoria_id = $v;
			$this->modifiedColumns[] = PeliculaPeer::CATEGORIA_ID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaId()

	/**
	 * Set the value of [estado] column.
	 * 
	 * @param      int $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setEstado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = PeliculaPeer::ESTADO;
		}

		if ($this->aEstadoPelicula !== null && $this->aEstadoPelicula->getId() !== $v) {
			$this->aEstadoPelicula = null;
		}

		return $this;
	} // setEstado()

	/**
	 * Set the value of [sinopsis] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setSinopsis($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sinopsis !== $v) {
			$this->sinopsis = $v;
			$this->modifiedColumns[] = PeliculaPeer::SINOPSIS;
		}

		return $this;
	} // setSinopsis()

	/**
	 * Set the value of [imagen] column.
	 * 
	 * @param      string $v new value
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function setImagen($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->imagen !== $v) {
			$this->imagen = $v;
			$this->modifiedColumns[] = PeliculaPeer::IMAGEN;
		}

		return $this;
	} // setImagen()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->estado !== 1) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->titulo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->duracion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_estreno = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->estreno = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->actor1_nom = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->actor1_apell = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->actor2_nom = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->actor2_apell = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->categoria_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->estado = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->sinopsis = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->imagen = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = PeliculaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pelicula object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aCategoria !== null && $this->categoria_id !== $this->aCategoria->getId()) {
			$this->aCategoria = null;
		}
		if ($this->aEstadoPelicula !== null && $this->estado !== $this->aEstadoPelicula->getId()) {
			$this->aEstadoPelicula = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PeliculaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCategoria = null;
			$this->aEstadoPelicula = null;
			$this->collComentarios = null;

			$this->collReservass = null;

			$this->collSocioAlquilers = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PeliculaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePelicula:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePelicula:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PeliculaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePelicula:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePelicula:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				PeliculaPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified() || $this->aCategoria->isNew()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
			}

			if ($this->aEstadoPelicula !== null) {
				if ($this->aEstadoPelicula->isModified() || $this->aEstadoPelicula->isNew()) {
					$affectedRows += $this->aEstadoPelicula->save($con);
				}
				$this->setEstadoPelicula($this->aEstadoPelicula);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->comentariosScheduledForDeletion !== null) {
				if (!$this->comentariosScheduledForDeletion->isEmpty()) {
					ComentarioQuery::create()
						->filterByPrimaryKeys($this->comentariosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comentariosScheduledForDeletion = null;
				}
			}

			if ($this->collComentarios !== null) {
				foreach ($this->collComentarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->reservassScheduledForDeletion !== null) {
				if (!$this->reservassScheduledForDeletion->isEmpty()) {
					ReservasQuery::create()
						->filterByPrimaryKeys($this->reservassScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->reservassScheduledForDeletion = null;
				}
			}

			if ($this->collReservass !== null) {
				foreach ($this->collReservass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->socioAlquilersScheduledForDeletion !== null) {
				if (!$this->socioAlquilersScheduledForDeletion->isEmpty()) {
					SocioAlquilerQuery::create()
						->filterByPrimaryKeys($this->socioAlquilersScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->socioAlquilersScheduledForDeletion = null;
				}
			}

			if ($this->collSocioAlquilers !== null) {
				foreach ($this->collSocioAlquilers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = PeliculaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PeliculaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PeliculaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PeliculaPeer::TITULO)) {
			$modifiedColumns[':p' . $index++]  = '`TITULO`';
		}
		if ($this->isColumnModified(PeliculaPeer::DURACION)) {
			$modifiedColumns[':p' . $index++]  = '`DURACION`';
		}
		if ($this->isColumnModified(PeliculaPeer::FECHA_ESTRENO)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_ESTRENO`';
		}
		if ($this->isColumnModified(PeliculaPeer::ESTRENO)) {
			$modifiedColumns[':p' . $index++]  = '`ESTRENO`';
		}
		if ($this->isColumnModified(PeliculaPeer::ACTOR1_NOM)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR1_NOM`';
		}
		if ($this->isColumnModified(PeliculaPeer::ACTOR1_APELL)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR1_APELL`';
		}
		if ($this->isColumnModified(PeliculaPeer::ACTOR2_NOM)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR2_NOM`';
		}
		if ($this->isColumnModified(PeliculaPeer::ACTOR2_APELL)) {
			$modifiedColumns[':p' . $index++]  = '`ACTOR2_APELL`';
		}
		if ($this->isColumnModified(PeliculaPeer::CATEGORIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORIA_ID`';
		}
		if ($this->isColumnModified(PeliculaPeer::ESTADO)) {
			$modifiedColumns[':p' . $index++]  = '`ESTADO`';
		}
		if ($this->isColumnModified(PeliculaPeer::SINOPSIS)) {
			$modifiedColumns[':p' . $index++]  = '`SINOPSIS`';
		}
		if ($this->isColumnModified(PeliculaPeer::IMAGEN)) {
			$modifiedColumns[':p' . $index++]  = '`IMAGEN`';
		}

		$sql = sprintf(
			'INSERT INTO `pelicula` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`TITULO`':
						$stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
						break;
					case '`DURACION`':
						$stmt->bindValue($identifier, $this->duracion, PDO::PARAM_STR);
						break;
					case '`FECHA_ESTRENO`':
						$stmt->bindValue($identifier, $this->fecha_estreno, PDO::PARAM_STR);
						break;
					case '`ESTRENO`':
						$stmt->bindValue($identifier, (int) $this->estreno, PDO::PARAM_INT);
						break;
					case '`ACTOR1_NOM`':
						$stmt->bindValue($identifier, $this->actor1_nom, PDO::PARAM_STR);
						break;
					case '`ACTOR1_APELL`':
						$stmt->bindValue($identifier, $this->actor1_apell, PDO::PARAM_STR);
						break;
					case '`ACTOR2_NOM`':
						$stmt->bindValue($identifier, $this->actor2_nom, PDO::PARAM_STR);
						break;
					case '`ACTOR2_APELL`':
						$stmt->bindValue($identifier, $this->actor2_apell, PDO::PARAM_STR);
						break;
					case '`CATEGORIA_ID`':
						$stmt->bindValue($identifier, $this->categoria_id, PDO::PARAM_INT);
						break;
					case '`ESTADO`':
						$stmt->bindValue($identifier, $this->estado, PDO::PARAM_INT);
						break;
					case '`SINOPSIS`':
						$stmt->bindValue($identifier, $this->sinopsis, PDO::PARAM_STR);
						break;
					case '`IMAGEN`':
						$stmt->bindValue($identifier, $this->imagen, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}

			if ($this->aEstadoPelicula !== null) {
				if (!$this->aEstadoPelicula->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadoPelicula->getValidationFailures());
				}
			}


			if (($retval = PeliculaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collComentarios !== null) {
					foreach ($this->collComentarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collReservass !== null) {
					foreach ($this->collReservass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSocioAlquilers !== null) {
					foreach ($this->collSocioAlquilers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PeliculaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitulo();
				break;
			case 2:
				return $this->getDuracion();
				break;
			case 3:
				return $this->getFechaEstreno();
				break;
			case 4:
				return $this->getEstreno();
				break;
			case 5:
				return $this->getActor1Nom();
				break;
			case 6:
				return $this->getActor1Apell();
				break;
			case 7:
				return $this->getActor2Nom();
				break;
			case 8:
				return $this->getActor2Apell();
				break;
			case 9:
				return $this->getCategoriaId();
				break;
			case 10:
				return $this->getEstado();
				break;
			case 11:
				return $this->getSinopsis();
				break;
			case 12:
				return $this->getImagen();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Pelicula'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pelicula'][$this->getPrimaryKey()] = true;
		$keys = PeliculaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitulo(),
			$keys[2] => $this->getDuracion(),
			$keys[3] => $this->getFechaEstreno(),
			$keys[4] => $this->getEstreno(),
			$keys[5] => $this->getActor1Nom(),
			$keys[6] => $this->getActor1Apell(),
			$keys[7] => $this->getActor2Nom(),
			$keys[8] => $this->getActor2Apell(),
			$keys[9] => $this->getCategoriaId(),
			$keys[10] => $this->getEstado(),
			$keys[11] => $this->getSinopsis(),
			$keys[12] => $this->getImagen(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCategoria) {
				$result['Categoria'] = $this->aCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aEstadoPelicula) {
				$result['EstadoPelicula'] = $this->aEstadoPelicula->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collComentarios) {
				$result['Comentarios'] = $this->collComentarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collReservass) {
				$result['Reservass'] = $this->collReservass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSocioAlquilers) {
				$result['SocioAlquilers'] = $this->collSocioAlquilers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PeliculaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitulo($value);
				break;
			case 2:
				$this->setDuracion($value);
				break;
			case 3:
				$this->setFechaEstreno($value);
				break;
			case 4:
				$this->setEstreno($value);
				break;
			case 5:
				$this->setActor1Nom($value);
				break;
			case 6:
				$this->setActor1Apell($value);
				break;
			case 7:
				$this->setActor2Nom($value);
				break;
			case 8:
				$this->setActor2Apell($value);
				break;
			case 9:
				$this->setCategoriaId($value);
				break;
			case 10:
				$this->setEstado($value);
				break;
			case 11:
				$this->setSinopsis($value);
				break;
			case 12:
				$this->setImagen($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PeliculaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDuracion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaEstreno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstreno($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActor1Nom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setActor1Apell($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setActor2Nom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setActor2Apell($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCategoriaId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEstado($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSinopsis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setImagen($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PeliculaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PeliculaPeer::ID)) $criteria->add(PeliculaPeer::ID, $this->id);
		if ($this->isColumnModified(PeliculaPeer::TITULO)) $criteria->add(PeliculaPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(PeliculaPeer::DURACION)) $criteria->add(PeliculaPeer::DURACION, $this->duracion);
		if ($this->isColumnModified(PeliculaPeer::FECHA_ESTRENO)) $criteria->add(PeliculaPeer::FECHA_ESTRENO, $this->fecha_estreno);
		if ($this->isColumnModified(PeliculaPeer::ESTRENO)) $criteria->add(PeliculaPeer::ESTRENO, $this->estreno);
		if ($this->isColumnModified(PeliculaPeer::ACTOR1_NOM)) $criteria->add(PeliculaPeer::ACTOR1_NOM, $this->actor1_nom);
		if ($this->isColumnModified(PeliculaPeer::ACTOR1_APELL)) $criteria->add(PeliculaPeer::ACTOR1_APELL, $this->actor1_apell);
		if ($this->isColumnModified(PeliculaPeer::ACTOR2_NOM)) $criteria->add(PeliculaPeer::ACTOR2_NOM, $this->actor2_nom);
		if ($this->isColumnModified(PeliculaPeer::ACTOR2_APELL)) $criteria->add(PeliculaPeer::ACTOR2_APELL, $this->actor2_apell);
		if ($this->isColumnModified(PeliculaPeer::CATEGORIA_ID)) $criteria->add(PeliculaPeer::CATEGORIA_ID, $this->categoria_id);
		if ($this->isColumnModified(PeliculaPeer::ESTADO)) $criteria->add(PeliculaPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(PeliculaPeer::SINOPSIS)) $criteria->add(PeliculaPeer::SINOPSIS, $this->sinopsis);
		if ($this->isColumnModified(PeliculaPeer::IMAGEN)) $criteria->add(PeliculaPeer::IMAGEN, $this->imagen);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PeliculaPeer::DATABASE_NAME);
		$criteria->add(PeliculaPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Pelicula (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTitulo($this->getTitulo());
		$copyObj->setDuracion($this->getDuracion());
		$copyObj->setFechaEstreno($this->getFechaEstreno());
		$copyObj->setEstreno($this->getEstreno());
		$copyObj->setActor1Nom($this->getActor1Nom());
		$copyObj->setActor1Apell($this->getActor1Apell());
		$copyObj->setActor2Nom($this->getActor2Nom());
		$copyObj->setActor2Apell($this->getActor2Apell());
		$copyObj->setCategoriaId($this->getCategoriaId());
		$copyObj->setEstado($this->getEstado());
		$copyObj->setSinopsis($this->getSinopsis());
		$copyObj->setImagen($this->getImagen());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getComentarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComentario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getReservass() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addReservas($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSocioAlquilers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSocioAlquiler($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Pelicula Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     PeliculaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PeliculaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     Pelicula The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaId(NULL);
		} else {
			$this->setCategoriaId($v->getId());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addPelicula($this);
		}

		return $this;
	}


	/**
	 * Get the associated Categoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Categoria The associated Categoria object.
	 * @throws     PropelException
	 */
	public function getCategoria(PropelPDO $con = null)
	{
		if ($this->aCategoria === null && ($this->categoria_id !== null)) {
			$this->aCategoria = CategoriaQuery::create()->findPk($this->categoria_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCategoria->addPeliculas($this);
			 */
		}
		return $this->aCategoria;
	}

	/**
	 * Declares an association between this object and a EstadoPelicula object.
	 *
	 * @param      EstadoPelicula $v
	 * @return     Pelicula The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEstadoPelicula(EstadoPelicula $v = null)
	{
		if ($v === null) {
			$this->setEstado(1);
		} else {
			$this->setEstado($v->getId());
		}

		$this->aEstadoPelicula = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the EstadoPelicula object, it will not be re-added.
		if ($v !== null) {
			$v->addPelicula($this);
		}

		return $this;
	}


	/**
	 * Get the associated EstadoPelicula object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     EstadoPelicula The associated EstadoPelicula object.
	 * @throws     PropelException
	 */
	public function getEstadoPelicula(PropelPDO $con = null)
	{
		if ($this->aEstadoPelicula === null && ($this->estado !== null)) {
			$this->aEstadoPelicula = EstadoPeliculaQuery::create()->findPk($this->estado, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aEstadoPelicula->addPeliculas($this);
			 */
		}
		return $this->aEstadoPelicula;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Comentario' == $relationName) {
			return $this->initComentarios();
		}
		if ('Reservas' == $relationName) {
			return $this->initReservass();
		}
		if ('SocioAlquiler' == $relationName) {
			return $this->initSocioAlquilers();
		}
	}

	/**
	 * Clears out the collComentarios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComentarios()
	 */
	public function clearComentarios()
	{
		$this->collComentarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComentarios collection.
	 *
	 * By default this just sets the collComentarios collection to an empty array (like clearcollComentarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initComentarios($overrideExisting = true)
	{
		if (null !== $this->collComentarios && !$overrideExisting) {
			return;
		}
		$this->collComentarios = new PropelObjectCollection();
		$this->collComentarios->setModel('Comentario');
	}

	/**
	 * Gets an array of Comentario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pelicula is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 * @throws     PropelException
	 */
	public function getComentarios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComentarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarios) {
				// return empty collection
				$this->initComentarios();
			} else {
				$collComentarios = ComentarioQuery::create(null, $criteria)
					->filterByPelicula($this)
					->find($con);
				if (null !== $criteria) {
					return $collComentarios;
				}
				$this->collComentarios = $collComentarios;
			}
		}
		return $this->collComentarios;
	}

	/**
	 * Sets a collection of Comentario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $comentarios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setComentarios(PropelCollection $comentarios, PropelPDO $con = null)
	{
		$this->comentariosScheduledForDeletion = $this->getComentarios(new Criteria(), $con)->diff($comentarios);

		foreach ($comentarios as $comentario) {
			// Fix issue with collection modified by reference
			if ($comentario->isNew()) {
				$comentario->setPelicula($this);
			}
			$this->addComentario($comentario);
		}

		$this->collComentarios = $comentarios;
	}

	/**
	 * Returns the number of related Comentario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Comentario objects.
	 * @throws     PropelException
	 */
	public function countComentarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComentarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarios) {
				return 0;
			} else {
				$query = ComentarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPelicula($this)
					->count($con);
			}
		} else {
			return count($this->collComentarios);
		}
	}

	/**
	 * Method called to associate a Comentario object to this object
	 * through the Comentario foreign key attribute.
	 *
	 * @param      Comentario $l Comentario
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function addComentario(Comentario $l)
	{
		if ($this->collComentarios === null) {
			$this->initComentarios();
		}
		if (!$this->collComentarios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddComentario($l);
		}

		return $this;
	}

	/**
	 * @param	Comentario $comentario The comentario object to add.
	 */
	protected function doAddComentario($comentario)
	{
		$this->collComentarios[]= $comentario;
		$comentario->setPelicula($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pelicula is new, it will return
	 * an empty collection; or if this Pelicula has previously
	 * been saved, it will retrieve related Comentarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pelicula.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 */
	public function getComentariosJoinSocio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComentarioQuery::create(null, $criteria);
		$query->joinWith('Socio', $join_behavior);

		return $this->getComentarios($query, $con);
	}

	/**
	 * Clears out the collReservass collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addReservass()
	 */
	public function clearReservass()
	{
		$this->collReservass = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collReservass collection.
	 *
	 * By default this just sets the collReservass collection to an empty array (like clearcollReservass());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initReservass($overrideExisting = true)
	{
		if (null !== $this->collReservass && !$overrideExisting) {
			return;
		}
		$this->collReservass = new PropelObjectCollection();
		$this->collReservass->setModel('Reservas');
	}

	/**
	 * Gets an array of Reservas objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pelicula is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Reservas[] List of Reservas objects
	 * @throws     PropelException
	 */
	public function getReservass($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collReservass || null !== $criteria) {
			if ($this->isNew() && null === $this->collReservass) {
				// return empty collection
				$this->initReservass();
			} else {
				$collReservass = ReservasQuery::create(null, $criteria)
					->filterByPelicula($this)
					->find($con);
				if (null !== $criteria) {
					return $collReservass;
				}
				$this->collReservass = $collReservass;
			}
		}
		return $this->collReservass;
	}

	/**
	 * Sets a collection of Reservas objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $reservass A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setReservass(PropelCollection $reservass, PropelPDO $con = null)
	{
		$this->reservassScheduledForDeletion = $this->getReservass(new Criteria(), $con)->diff($reservass);

		foreach ($reservass as $reservas) {
			// Fix issue with collection modified by reference
			if ($reservas->isNew()) {
				$reservas->setPelicula($this);
			}
			$this->addReservas($reservas);
		}

		$this->collReservass = $reservass;
	}

	/**
	 * Returns the number of related Reservas objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Reservas objects.
	 * @throws     PropelException
	 */
	public function countReservass(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collReservass || null !== $criteria) {
			if ($this->isNew() && null === $this->collReservass) {
				return 0;
			} else {
				$query = ReservasQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPelicula($this)
					->count($con);
			}
		} else {
			return count($this->collReservass);
		}
	}

	/**
	 * Method called to associate a Reservas object to this object
	 * through the Reservas foreign key attribute.
	 *
	 * @param      Reservas $l Reservas
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function addReservas(Reservas $l)
	{
		if ($this->collReservass === null) {
			$this->initReservass();
		}
		if (!$this->collReservass->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddReservas($l);
		}

		return $this;
	}

	/**
	 * @param	Reservas $reservas The reservas object to add.
	 */
	protected function doAddReservas($reservas)
	{
		$this->collReservass[]= $reservas;
		$reservas->setPelicula($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pelicula is new, it will return
	 * an empty collection; or if this Pelicula has previously
	 * been saved, it will retrieve related Reservass from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pelicula.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Reservas[] List of Reservas objects
	 */
	public function getReservassJoinSocio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ReservasQuery::create(null, $criteria);
		$query->joinWith('Socio', $join_behavior);

		return $this->getReservass($query, $con);
	}

	/**
	 * Clears out the collSocioAlquilers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSocioAlquilers()
	 */
	public function clearSocioAlquilers()
	{
		$this->collSocioAlquilers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSocioAlquilers collection.
	 *
	 * By default this just sets the collSocioAlquilers collection to an empty array (like clearcollSocioAlquilers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSocioAlquilers($overrideExisting = true)
	{
		if (null !== $this->collSocioAlquilers && !$overrideExisting) {
			return;
		}
		$this->collSocioAlquilers = new PropelObjectCollection();
		$this->collSocioAlquilers->setModel('SocioAlquiler');
	}

	/**
	 * Gets an array of SocioAlquiler objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pelicula is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SocioAlquiler[] List of SocioAlquiler objects
	 * @throws     PropelException
	 */
	public function getSocioAlquilers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSocioAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSocioAlquilers) {
				// return empty collection
				$this->initSocioAlquilers();
			} else {
				$collSocioAlquilers = SocioAlquilerQuery::create(null, $criteria)
					->filterByPelicula($this)
					->find($con);
				if (null !== $criteria) {
					return $collSocioAlquilers;
				}
				$this->collSocioAlquilers = $collSocioAlquilers;
			}
		}
		return $this->collSocioAlquilers;
	}

	/**
	 * Sets a collection of SocioAlquiler objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $socioAlquilers A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSocioAlquilers(PropelCollection $socioAlquilers, PropelPDO $con = null)
	{
		$this->socioAlquilersScheduledForDeletion = $this->getSocioAlquilers(new Criteria(), $con)->diff($socioAlquilers);

		foreach ($socioAlquilers as $socioAlquiler) {
			// Fix issue with collection modified by reference
			if ($socioAlquiler->isNew()) {
				$socioAlquiler->setPelicula($this);
			}
			$this->addSocioAlquiler($socioAlquiler);
		}

		$this->collSocioAlquilers = $socioAlquilers;
	}

	/**
	 * Returns the number of related SocioAlquiler objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SocioAlquiler objects.
	 * @throws     PropelException
	 */
	public function countSocioAlquilers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSocioAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collSocioAlquilers) {
				return 0;
			} else {
				$query = SocioAlquilerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPelicula($this)
					->count($con);
			}
		} else {
			return count($this->collSocioAlquilers);
		}
	}

	/**
	 * Method called to associate a SocioAlquiler object to this object
	 * through the SocioAlquiler foreign key attribute.
	 *
	 * @param      SocioAlquiler $l SocioAlquiler
	 * @return     Pelicula The current object (for fluent API support)
	 */
	public function addSocioAlquiler(SocioAlquiler $l)
	{
		if ($this->collSocioAlquilers === null) {
			$this->initSocioAlquilers();
		}
		if (!$this->collSocioAlquilers->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSocioAlquiler($l);
		}

		return $this;
	}

	/**
	 * @param	SocioAlquiler $socioAlquiler The socioAlquiler object to add.
	 */
	protected function doAddSocioAlquiler($socioAlquiler)
	{
		$this->collSocioAlquilers[]= $socioAlquiler;
		$socioAlquiler->setPelicula($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pelicula is new, it will return
	 * an empty collection; or if this Pelicula has previously
	 * been saved, it will retrieve related SocioAlquilers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pelicula.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SocioAlquiler[] List of SocioAlquiler objects
	 */
	public function getSocioAlquilersJoinAlquiler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SocioAlquilerQuery::create(null, $criteria);
		$query->joinWith('Alquiler', $join_behavior);

		return $this->getSocioAlquilers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->titulo = null;
		$this->duracion = null;
		$this->fecha_estreno = null;
		$this->estreno = null;
		$this->actor1_nom = null;
		$this->actor1_apell = null;
		$this->actor2_nom = null;
		$this->actor2_apell = null;
		$this->categoria_id = null;
		$this->estado = null;
		$this->sinopsis = null;
		$this->imagen = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collComentarios) {
				foreach ($this->collComentarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collReservass) {
				foreach ($this->collReservass as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSocioAlquilers) {
				foreach ($this->collSocioAlquilers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collComentarios instanceof PropelCollection) {
			$this->collComentarios->clearIterator();
		}
		$this->collComentarios = null;
		if ($this->collReservass instanceof PropelCollection) {
			$this->collReservass->clearIterator();
		}
		$this->collReservass = null;
		if ($this->collSocioAlquilers instanceof PropelCollection) {
			$this->collSocioAlquilers->clearIterator();
		}
		$this->collSocioAlquilers = null;
		$this->aCategoria = null;
		$this->aEstadoPelicula = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PeliculaPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasePelicula:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BasePelicula
