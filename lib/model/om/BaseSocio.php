<?php


/**
 * Base class that represents a row from the 'socio' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSocio extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SocioPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SocioPeer
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
	 * The value for the dni field.
	 * @var        string
	 */
	protected $dni;

	/**
	 * The value for the nombre field.
	 * @var        string
	 */
	protected $nombre;

	/**
	 * The value for the apellido field.
	 * @var        string
	 */
	protected $apellido;

	/**
	 * The value for the direccion field.
	 * @var        string
	 */
	protected $direccion;

	/**
	 * The value for the tel_cel field.
	 * @var        string
	 */
	protected $tel_cel;

	/**
	 * The value for the fecha_nacimiento field.
	 * @var        string
	 */
	protected $fecha_nacimiento;

	/**
	 * The value for the usuario field.
	 * @var        string
	 */
	protected $usuario;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the tipo_socio_id field.
	 * Note: this column has a database default value of: 3
	 * @var        int
	 */
	protected $tipo_socio_id;

	/**
	 * The value for the activo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $activo;

	/**
	 * @var        TipoSocio
	 */
	protected $aTipoSocio;

	/**
	 * @var        array Alquiler[] Collection to store aggregation of Alquiler objects.
	 */
	protected $collAlquilers;

	/**
	 * @var        array Comentario[] Collection to store aggregation of Comentario objects.
	 */
	protected $collComentarios;

	/**
	 * @var        array Reservas[] Collection to store aggregation of Reservas objects.
	 */
	protected $collReservass;

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
	protected $alquilersScheduledForDeletion = null;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->tipo_socio_id = 3;
		$this->activo = true;
	}

	/**
	 * Initializes internal state of BaseSocio object.
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
	 * Get the [dni] column value.
	 * 
	 * @return     string
	 */
	public function getDni()
	{
		return $this->dni;
	}

	/**
	 * Get the [nombre] column value.
	 * 
	 * @return     string
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Get the [apellido] column value.
	 * 
	 * @return     string
	 */
	public function getApellido()
	{
		return $this->apellido;
	}

	/**
	 * Get the [direccion] column value.
	 * 
	 * @return     string
	 */
	public function getDireccion()
	{
		return $this->direccion;
	}

	/**
	 * Get the [tel_cel] column value.
	 * 
	 * @return     string
	 */
	public function getTelCel()
	{
		return $this->tel_cel;
	}

	/**
	 * Get the [optionally formatted] temporal [fecha_nacimiento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaNacimiento($format = 'Y-m-d')
	{
		if ($this->fecha_nacimiento === null) {
			return null;
		}


		if ($this->fecha_nacimiento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_nacimiento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nacimiento, true), $x);
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
	 * Get the [usuario] column value.
	 * 
	 * @return     string
	 */
	public function getUsuario()
	{
		return $this->usuario;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [tipo_socio_id] column value.
	 * 
	 * @return     int
	 */
	public function getTipoSocioId()
	{
		return $this->tipo_socio_id;
	}

	/**
	 * Get the [activo] column value.
	 * 
	 * @return     boolean
	 */
	public function getActivo()
	{
		return $this->activo;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SocioPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [dni] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setDni($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dni !== $v) {
			$this->dni = $v;
			$this->modifiedColumns[] = SocioPeer::DNI;
		}

		return $this;
	} // setDni()

	/**
	 * Set the value of [nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = SocioPeer::NOMBRE;
		}

		return $this;
	} // setNombre()

	/**
	 * Set the value of [apellido] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = SocioPeer::APELLIDO;
		}

		return $this;
	} // setApellido()

	/**
	 * Set the value of [direccion] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = SocioPeer::DIRECCION;
		}

		return $this;
	} // setDireccion()

	/**
	 * Set the value of [tel_cel] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setTelCel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tel_cel !== $v) {
			$this->tel_cel = $v;
			$this->modifiedColumns[] = SocioPeer::TEL_CEL;
		}

		return $this;
	} // setTelCel()

	/**
	 * Sets the value of [fecha_nacimiento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setFechaNacimiento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_nacimiento !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_nacimiento !== null && $tmpDt = new DateTime($this->fecha_nacimiento)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_nacimiento = $newDateAsString;
				$this->modifiedColumns[] = SocioPeer::FECHA_NACIMIENTO;
			}
		} // if either are not null

		return $this;
	} // setFechaNacimiento()

	/**
	 * Set the value of [usuario] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setUsuario($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->usuario !== $v) {
			$this->usuario = $v;
			$this->modifiedColumns[] = SocioPeer::USUARIO;
		}

		return $this;
	} // setUsuario()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = SocioPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = SocioPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [tipo_socio_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setTipoSocioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo_socio_id !== $v) {
			$this->tipo_socio_id = $v;
			$this->modifiedColumns[] = SocioPeer::TIPO_SOCIO_ID;
		}

		if ($this->aTipoSocio !== null && $this->aTipoSocio->getId() !== $v) {
			$this->aTipoSocio = null;
		}

		return $this;
	} // setTipoSocioId()

	/**
	 * Sets the value of the [activo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Socio The current object (for fluent API support)
	 */
	public function setActivo($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->activo !== $v) {
			$this->activo = $v;
			$this->modifiedColumns[] = SocioPeer::ACTIVO;
		}

		return $this;
	} // setActivo()

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
			if ($this->tipo_socio_id !== 3) {
				return false;
			}

			if ($this->activo !== true) {
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
			$this->dni = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nombre = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->apellido = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->direccion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->tel_cel = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha_nacimiento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->usuario = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->password = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->tipo_socio_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->activo = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = SocioPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Socio object", $e);
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

		if ($this->aTipoSocio !== null && $this->tipo_socio_id !== $this->aTipoSocio->getId()) {
			$this->aTipoSocio = null;
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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SocioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aTipoSocio = null;
			$this->collAlquilers = null;

			$this->collComentarios = null;

			$this->collReservass = null;

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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SocioQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSocio:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseSocio:delete:post') as $callable)
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
			$con = Propel::getConnection(SocioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSocio:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseSocio:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				SocioPeer::addInstanceToPool($this);
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

			if ($this->aTipoSocio !== null) {
				if ($this->aTipoSocio->isModified() || $this->aTipoSocio->isNew()) {
					$affectedRows += $this->aTipoSocio->save($con);
				}
				$this->setTipoSocio($this->aTipoSocio);
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

			if ($this->alquilersScheduledForDeletion !== null) {
				if (!$this->alquilersScheduledForDeletion->isEmpty()) {
					AlquilerQuery::create()
						->filterByPrimaryKeys($this->alquilersScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->alquilersScheduledForDeletion = null;
				}
			}

			if ($this->collAlquilers !== null) {
				foreach ($this->collAlquilers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

		$this->modifiedColumns[] = SocioPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SocioPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SocioPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(SocioPeer::DNI)) {
			$modifiedColumns[':p' . $index++]  = '`DNI`';
		}
		if ($this->isColumnModified(SocioPeer::NOMBRE)) {
			$modifiedColumns[':p' . $index++]  = '`NOMBRE`';
		}
		if ($this->isColumnModified(SocioPeer::APELLIDO)) {
			$modifiedColumns[':p' . $index++]  = '`APELLIDO`';
		}
		if ($this->isColumnModified(SocioPeer::DIRECCION)) {
			$modifiedColumns[':p' . $index++]  = '`DIRECCION`';
		}
		if ($this->isColumnModified(SocioPeer::TEL_CEL)) {
			$modifiedColumns[':p' . $index++]  = '`TEL_CEL`';
		}
		if ($this->isColumnModified(SocioPeer::FECHA_NACIMIENTO)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_NACIMIENTO`';
		}
		if ($this->isColumnModified(SocioPeer::USUARIO)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO`';
		}
		if ($this->isColumnModified(SocioPeer::PASSWORD)) {
			$modifiedColumns[':p' . $index++]  = '`PASSWORD`';
		}
		if ($this->isColumnModified(SocioPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(SocioPeer::TIPO_SOCIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_SOCIO_ID`';
		}
		if ($this->isColumnModified(SocioPeer::ACTIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ACTIVO`';
		}

		$sql = sprintf(
			'INSERT INTO `socio` (%s) VALUES (%s)',
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
					case '`DNI`':
						$stmt->bindValue($identifier, $this->dni, PDO::PARAM_STR);
						break;
					case '`NOMBRE`':
						$stmt->bindValue($identifier, $this->nombre, PDO::PARAM_STR);
						break;
					case '`APELLIDO`':
						$stmt->bindValue($identifier, $this->apellido, PDO::PARAM_STR);
						break;
					case '`DIRECCION`':
						$stmt->bindValue($identifier, $this->direccion, PDO::PARAM_STR);
						break;
					case '`TEL_CEL`':
						$stmt->bindValue($identifier, $this->tel_cel, PDO::PARAM_STR);
						break;
					case '`FECHA_NACIMIENTO`':
						$stmt->bindValue($identifier, $this->fecha_nacimiento, PDO::PARAM_STR);
						break;
					case '`USUARIO`':
						$stmt->bindValue($identifier, $this->usuario, PDO::PARAM_STR);
						break;
					case '`PASSWORD`':
						$stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`TIPO_SOCIO_ID`':
						$stmt->bindValue($identifier, $this->tipo_socio_id, PDO::PARAM_INT);
						break;
					case '`ACTIVO`':
						$stmt->bindValue($identifier, (int) $this->activo, PDO::PARAM_INT);
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

			if ($this->aTipoSocio !== null) {
				if (!$this->aTipoSocio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoSocio->getValidationFailures());
				}
			}


			if (($retval = SocioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquilers !== null) {
					foreach ($this->collAlquilers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = SocioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDni();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getApellido();
				break;
			case 4:
				return $this->getDireccion();
				break;
			case 5:
				return $this->getTelCel();
				break;
			case 6:
				return $this->getFechaNacimiento();
				break;
			case 7:
				return $this->getUsuario();
				break;
			case 8:
				return $this->getPassword();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getTipoSocioId();
				break;
			case 11:
				return $this->getActivo();
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
		if (isset($alreadyDumpedObjects['Socio'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Socio'][$this->getPrimaryKey()] = true;
		$keys = SocioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDni(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getApellido(),
			$keys[4] => $this->getDireccion(),
			$keys[5] => $this->getTelCel(),
			$keys[6] => $this->getFechaNacimiento(),
			$keys[7] => $this->getUsuario(),
			$keys[8] => $this->getPassword(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getTipoSocioId(),
			$keys[11] => $this->getActivo(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aTipoSocio) {
				$result['TipoSocio'] = $this->aTipoSocio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAlquilers) {
				$result['Alquilers'] = $this->collAlquilers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collComentarios) {
				$result['Comentarios'] = $this->collComentarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collReservass) {
				$result['Reservass'] = $this->collReservass->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = SocioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDni($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setApellido($value);
				break;
			case 4:
				$this->setDireccion($value);
				break;
			case 5:
				$this->setTelCel($value);
				break;
			case 6:
				$this->setFechaNacimiento($value);
				break;
			case 7:
				$this->setUsuario($value);
				break;
			case 8:
				$this->setPassword($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setTipoSocioId($value);
				break;
			case 11:
				$this->setActivo($value);
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
		$keys = SocioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApellido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDireccion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelCel($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaNacimiento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUsuario($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPassword($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipoSocioId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setActivo($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SocioPeer::DATABASE_NAME);

		if ($this->isColumnModified(SocioPeer::ID)) $criteria->add(SocioPeer::ID, $this->id);
		if ($this->isColumnModified(SocioPeer::DNI)) $criteria->add(SocioPeer::DNI, $this->dni);
		if ($this->isColumnModified(SocioPeer::NOMBRE)) $criteria->add(SocioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(SocioPeer::APELLIDO)) $criteria->add(SocioPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(SocioPeer::DIRECCION)) $criteria->add(SocioPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(SocioPeer::TEL_CEL)) $criteria->add(SocioPeer::TEL_CEL, $this->tel_cel);
		if ($this->isColumnModified(SocioPeer::FECHA_NACIMIENTO)) $criteria->add(SocioPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(SocioPeer::USUARIO)) $criteria->add(SocioPeer::USUARIO, $this->usuario);
		if ($this->isColumnModified(SocioPeer::PASSWORD)) $criteria->add(SocioPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(SocioPeer::EMAIL)) $criteria->add(SocioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(SocioPeer::TIPO_SOCIO_ID)) $criteria->add(SocioPeer::TIPO_SOCIO_ID, $this->tipo_socio_id);
		if ($this->isColumnModified(SocioPeer::ACTIVO)) $criteria->add(SocioPeer::ACTIVO, $this->activo);

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
		$criteria = new Criteria(SocioPeer::DATABASE_NAME);
		$criteria->add(SocioPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Socio (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setDni($this->getDni());
		$copyObj->setNombre($this->getNombre());
		$copyObj->setApellido($this->getApellido());
		$copyObj->setDireccion($this->getDireccion());
		$copyObj->setTelCel($this->getTelCel());
		$copyObj->setFechaNacimiento($this->getFechaNacimiento());
		$copyObj->setUsuario($this->getUsuario());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setTipoSocioId($this->getTipoSocioId());
		$copyObj->setActivo($this->getActivo());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAlquilers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlquiler($relObj->copy($deepCopy));
				}
			}

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
	 * @return     Socio Clone of current object.
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
	 * @return     SocioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SocioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a TipoSocio object.
	 *
	 * @param      TipoSocio $v
	 * @return     Socio The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTipoSocio(TipoSocio $v = null)
	{
		if ($v === null) {
			$this->setTipoSocioId(3);
		} else {
			$this->setTipoSocioId($v->getId());
		}

		$this->aTipoSocio = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TipoSocio object, it will not be re-added.
		if ($v !== null) {
			$v->addSocio($this);
		}

		return $this;
	}


	/**
	 * Get the associated TipoSocio object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TipoSocio The associated TipoSocio object.
	 * @throws     PropelException
	 */
	public function getTipoSocio(PropelPDO $con = null)
	{
		if ($this->aTipoSocio === null && ($this->tipo_socio_id !== null)) {
			$this->aTipoSocio = TipoSocioQuery::create()->findPk($this->tipo_socio_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTipoSocio->addSocios($this);
			 */
		}
		return $this->aTipoSocio;
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
		if ('Alquiler' == $relationName) {
			return $this->initAlquilers();
		}
		if ('Comentario' == $relationName) {
			return $this->initComentarios();
		}
		if ('Reservas' == $relationName) {
			return $this->initReservass();
		}
	}

	/**
	 * Clears out the collAlquilers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlquilers()
	 */
	public function clearAlquilers()
	{
		$this->collAlquilers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlquilers collection.
	 *
	 * By default this just sets the collAlquilers collection to an empty array (like clearcollAlquilers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAlquilers($overrideExisting = true)
	{
		if (null !== $this->collAlquilers && !$overrideExisting) {
			return;
		}
		$this->collAlquilers = new PropelObjectCollection();
		$this->collAlquilers->setModel('Alquiler');
	}

	/**
	 * Gets an array of Alquiler objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Socio is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Alquiler[] List of Alquiler objects
	 * @throws     PropelException
	 */
	public function getAlquilers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlquilers) {
				// return empty collection
				$this->initAlquilers();
			} else {
				$collAlquilers = AlquilerQuery::create(null, $criteria)
					->filterBySocio($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlquilers;
				}
				$this->collAlquilers = $collAlquilers;
			}
		}
		return $this->collAlquilers;
	}

	/**
	 * Sets a collection of Alquiler objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $alquilers A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAlquilers(PropelCollection $alquilers, PropelPDO $con = null)
	{
		$this->alquilersScheduledForDeletion = $this->getAlquilers(new Criteria(), $con)->diff($alquilers);

		foreach ($alquilers as $alquiler) {
			// Fix issue with collection modified by reference
			if ($alquiler->isNew()) {
				$alquiler->setSocio($this);
			}
			$this->addAlquiler($alquiler);
		}

		$this->collAlquilers = $alquilers;
	}

	/**
	 * Returns the number of related Alquiler objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Alquiler objects.
	 * @throws     PropelException
	 */
	public function countAlquilers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlquilers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlquilers) {
				return 0;
			} else {
				$query = AlquilerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySocio($this)
					->count($con);
			}
		} else {
			return count($this->collAlquilers);
		}
	}

	/**
	 * Method called to associate a Alquiler object to this object
	 * through the Alquiler foreign key attribute.
	 *
	 * @param      Alquiler $l Alquiler
	 * @return     Socio The current object (for fluent API support)
	 */
	public function addAlquiler(Alquiler $l)
	{
		if ($this->collAlquilers === null) {
			$this->initAlquilers();
		}
		if (!$this->collAlquilers->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAlquiler($l);
		}

		return $this;
	}

	/**
	 * @param	Alquiler $alquiler The alquiler object to add.
	 */
	protected function doAddAlquiler($alquiler)
	{
		$this->collAlquilers[]= $alquiler;
		$alquiler->setSocio($this);
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
	 * If this Socio is new, it will return
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
					->filterBySocio($this)
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
				$comentario->setSocio($this);
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
					->filterBySocio($this)
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
	 * @return     Socio The current object (for fluent API support)
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
		$comentario->setSocio($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Socio is new, it will return
	 * an empty collection; or if this Socio has previously
	 * been saved, it will retrieve related Comentarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Socio.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comentario[] List of Comentario objects
	 */
	public function getComentariosJoinPelicula($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComentarioQuery::create(null, $criteria);
		$query->joinWith('Pelicula', $join_behavior);

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
	 * If this Socio is new, it will return
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
					->filterBySocio($this)
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
				$reservas->setSocio($this);
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
					->filterBySocio($this)
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
	 * @return     Socio The current object (for fluent API support)
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
		$reservas->setSocio($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Socio is new, it will return
	 * an empty collection; or if this Socio has previously
	 * been saved, it will retrieve related Reservass from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Socio.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Reservas[] List of Reservas objects
	 */
	public function getReservassJoinPelicula($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ReservasQuery::create(null, $criteria);
		$query->joinWith('Pelicula', $join_behavior);

		return $this->getReservass($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->dni = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->direccion = null;
		$this->tel_cel = null;
		$this->fecha_nacimiento = null;
		$this->usuario = null;
		$this->password = null;
		$this->email = null;
		$this->tipo_socio_id = null;
		$this->activo = null;
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
			if ($this->collAlquilers) {
				foreach ($this->collAlquilers as $o) {
					$o->clearAllReferences($deep);
				}
			}
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
		} // if ($deep)

		if ($this->collAlquilers instanceof PropelCollection) {
			$this->collAlquilers->clearIterator();
		}
		$this->collAlquilers = null;
		if ($this->collComentarios instanceof PropelCollection) {
			$this->collComentarios->clearIterator();
		}
		$this->collComentarios = null;
		if ($this->collReservass instanceof PropelCollection) {
			$this->collReservass->clearIterator();
		}
		$this->collReservass = null;
		$this->aTipoSocio = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SocioPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseSocio:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseSocio
