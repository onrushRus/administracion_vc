<?php


/**
 * Base class that represents a row from the 'alquiler' table.
 *
 * 
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAlquiler extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AlquilerPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlquilerPeer
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
	 * The value for the fecha_alquiler field.
	 * @var        string
	 */
	protected $fecha_alquiler;

	/**
	 * The value for the fecha_devolucion field.
	 * @var        string
	 */
	protected $fecha_devolucion;

	/**
	 * The value for the total_a_cobrar field.
	 * @var        string
	 */
	protected $total_a_cobrar;

	/**
	 * The value for the socio_id field.
	 * @var        int
	 */
	protected $socio_id;

	/**
	 * @var        Socio
	 */
	protected $aSocio;

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
	protected $socioAlquilersScheduledForDeletion = null;

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
	 * Get the [optionally formatted] temporal [fecha_alquiler] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaAlquiler($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_alquiler === null) {
			return null;
		}


		if ($this->fecha_alquiler === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_alquiler);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_alquiler, true), $x);
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
	 * Get the [optionally formatted] temporal [fecha_devolucion] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFechaDevolucion($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_devolucion === null) {
			return null;
		}


		if ($this->fecha_devolucion === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_devolucion);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_devolucion, true), $x);
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
	 * Get the [total_a_cobrar] column value.
	 * 
	 * @return     string
	 */
	public function getTotalACobrar()
	{
		return $this->total_a_cobrar;
	}

	/**
	 * Get the [socio_id] column value.
	 * 
	 * @return     int
	 */
	public function getSocioId()
	{
		return $this->socio_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [fecha_alquiler] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setFechaAlquiler($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_alquiler !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_alquiler !== null && $tmpDt = new DateTime($this->fecha_alquiler)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_alquiler = $newDateAsString;
				$this->modifiedColumns[] = AlquilerPeer::FECHA_ALQUILER;
			}
		} // if either are not null

		return $this;
	} // setFechaAlquiler()

	/**
	 * Sets the value of [fecha_devolucion] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setFechaDevolucion($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->fecha_devolucion !== null || $dt !== null) {
			$currentDateAsString = ($this->fecha_devolucion !== null && $tmpDt = new DateTime($this->fecha_devolucion)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->fecha_devolucion = $newDateAsString;
				$this->modifiedColumns[] = AlquilerPeer::FECHA_DEVOLUCION;
			}
		} // if either are not null

		return $this;
	} // setFechaDevolucion()

	/**
	 * Set the value of [total_a_cobrar] column.
	 * 
	 * @param      string $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setTotalACobrar($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->total_a_cobrar !== $v) {
			$this->total_a_cobrar = $v;
			$this->modifiedColumns[] = AlquilerPeer::TOTAL_A_COBRAR;
		}

		return $this;
	} // setTotalACobrar()

	/**
	 * Set the value of [socio_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Alquiler The current object (for fluent API support)
	 */
	public function setSocioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->socio_id !== $v) {
			$this->socio_id = $v;
			$this->modifiedColumns[] = AlquilerPeer::SOCIO_ID;
		}

		if ($this->aSocio !== null && $this->aSocio->getId() !== $v) {
			$this->aSocio = null;
		}

		return $this;
	} // setSocioId()

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
			$this->fecha_alquiler = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha_devolucion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->total_a_cobrar = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->socio_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = AlquilerPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Alquiler object", $e);
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

		if ($this->aSocio !== null && $this->socio_id !== $this->aSocio->getId()) {
			$this->aSocio = null;
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlquilerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aSocio = null;
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = AlquilerQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAlquiler:delete:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseAlquiler:delete:post') as $callable)
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseAlquiler:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseAlquiler:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				AlquilerPeer::addInstanceToPool($this);
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

			if ($this->aSocio !== null) {
				if ($this->aSocio->isModified() || $this->aSocio->isNew()) {
					$affectedRows += $this->aSocio->save($con);
				}
				$this->setSocio($this->aSocio);
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

		$this->modifiedColumns[] = AlquilerPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . AlquilerPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(AlquilerPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(AlquilerPeer::FECHA_ALQUILER)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_ALQUILER`';
		}
		if ($this->isColumnModified(AlquilerPeer::FECHA_DEVOLUCION)) {
			$modifiedColumns[':p' . $index++]  = '`FECHA_DEVOLUCION`';
		}
		if ($this->isColumnModified(AlquilerPeer::TOTAL_A_COBRAR)) {
			$modifiedColumns[':p' . $index++]  = '`TOTAL_A_COBRAR`';
		}
		if ($this->isColumnModified(AlquilerPeer::SOCIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`SOCIO_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `alquiler` (%s) VALUES (%s)',
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
					case '`FECHA_ALQUILER`':
						$stmt->bindValue($identifier, $this->fecha_alquiler, PDO::PARAM_STR);
						break;
					case '`FECHA_DEVOLUCION`':
						$stmt->bindValue($identifier, $this->fecha_devolucion, PDO::PARAM_STR);
						break;
					case '`TOTAL_A_COBRAR`':
						$stmt->bindValue($identifier, $this->total_a_cobrar, PDO::PARAM_STR);
						break;
					case '`SOCIO_ID`':
						$stmt->bindValue($identifier, $this->socio_id, PDO::PARAM_INT);
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

			if ($this->aSocio !== null) {
				if (!$this->aSocio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSocio->getValidationFailures());
				}
			}


			if (($retval = AlquilerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFechaAlquiler();
				break;
			case 2:
				return $this->getFechaDevolucion();
				break;
			case 3:
				return $this->getTotalACobrar();
				break;
			case 4:
				return $this->getSocioId();
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
		if (isset($alreadyDumpedObjects['Alquiler'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Alquiler'][$this->getPrimaryKey()] = true;
		$keys = AlquilerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFechaAlquiler(),
			$keys[2] => $this->getFechaDevolucion(),
			$keys[3] => $this->getTotalACobrar(),
			$keys[4] => $this->getSocioId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aSocio) {
				$result['Socio'] = $this->aSocio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFechaAlquiler($value);
				break;
			case 2:
				$this->setFechaDevolucion($value);
				break;
			case 3:
				$this->setTotalACobrar($value);
				break;
			case 4:
				$this->setSocioId($value);
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
		$keys = AlquilerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaAlquiler($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaDevolucion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotalACobrar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSocioId($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlquilerPeer::ID)) $criteria->add(AlquilerPeer::ID, $this->id);
		if ($this->isColumnModified(AlquilerPeer::FECHA_ALQUILER)) $criteria->add(AlquilerPeer::FECHA_ALQUILER, $this->fecha_alquiler);
		if ($this->isColumnModified(AlquilerPeer::FECHA_DEVOLUCION)) $criteria->add(AlquilerPeer::FECHA_DEVOLUCION, $this->fecha_devolucion);
		if ($this->isColumnModified(AlquilerPeer::TOTAL_A_COBRAR)) $criteria->add(AlquilerPeer::TOTAL_A_COBRAR, $this->total_a_cobrar);
		if ($this->isColumnModified(AlquilerPeer::SOCIO_ID)) $criteria->add(AlquilerPeer::SOCIO_ID, $this->socio_id);

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
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);
		$criteria->add(AlquilerPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Alquiler (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setFechaAlquiler($this->getFechaAlquiler());
		$copyObj->setFechaDevolucion($this->getFechaDevolucion());
		$copyObj->setTotalACobrar($this->getTotalACobrar());
		$copyObj->setSocioId($this->getSocioId());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

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
	 * @return     Alquiler Clone of current object.
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
	 * @return     AlquilerPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlquilerPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Socio object.
	 *
	 * @param      Socio $v
	 * @return     Alquiler The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSocio(Socio $v = null)
	{
		if ($v === null) {
			$this->setSocioId(NULL);
		} else {
			$this->setSocioId($v->getId());
		}

		$this->aSocio = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Socio object, it will not be re-added.
		if ($v !== null) {
			$v->addAlquiler($this);
		}

		return $this;
	}


	/**
	 * Get the associated Socio object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Socio The associated Socio object.
	 * @throws     PropelException
	 */
	public function getSocio(PropelPDO $con = null)
	{
		if ($this->aSocio === null && ($this->socio_id !== null)) {
			$this->aSocio = SocioQuery::create()->findPk($this->socio_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSocio->addAlquilers($this);
			 */
		}
		return $this->aSocio;
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
		if ('SocioAlquiler' == $relationName) {
			return $this->initSocioAlquilers();
		}
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
	 * If this Alquiler is new, it will return
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
					->filterByAlquiler($this)
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
				$socioAlquiler->setAlquiler($this);
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
					->filterByAlquiler($this)
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
	 * @return     Alquiler The current object (for fluent API support)
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
		$socioAlquiler->setAlquiler($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Alquiler is new, it will return
	 * an empty collection; or if this Alquiler has previously
	 * been saved, it will retrieve related SocioAlquilers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Alquiler.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SocioAlquiler[] List of SocioAlquiler objects
	 */
	public function getSocioAlquilersJoinPelicula($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SocioAlquilerQuery::create(null, $criteria);
		$query->joinWith('Pelicula', $join_behavior);

		return $this->getSocioAlquilers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->fecha_alquiler = null;
		$this->fecha_devolucion = null;
		$this->total_a_cobrar = null;
		$this->socio_id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collSocioAlquilers) {
				foreach ($this->collSocioAlquilers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collSocioAlquilers instanceof PropelCollection) {
			$this->collSocioAlquilers->clearIterator();
		}
		$this->collSocioAlquilers = null;
		$this->aSocio = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AlquilerPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseAlquiler:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		return parent::__call($name, $params);
	}

} // BaseAlquiler
