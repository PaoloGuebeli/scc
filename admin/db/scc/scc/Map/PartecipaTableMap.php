<?php

namespace scc\scc\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use scc\scc\Partecipa;
use scc\scc\PartecipaQuery;


/**
 * This class defines the structure of the 'partecipa' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PartecipaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.PartecipaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'partecipa';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\Partecipa';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.Partecipa';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the Id_Utente field
     */
    const COL_ID_UTENTE = 'partecipa.Id_Utente';

    /**
     * the column name for the Id_Evento field
     */
    const COL_ID_EVENTO = 'partecipa.Id_Evento';

    /**
     * the column name for the Tipo field
     */
    const COL_TIPO = 'partecipa.Tipo';

    /**
     * the column name for the Id_Gruppo field
     */
    const COL_ID_GRUPPO = 'partecipa.Id_Gruppo';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('IdUtente', 'IdEvento', 'Tipo', 'IdGruppo', ),
        self::TYPE_CAMELNAME     => array('idUtente', 'idEvento', 'tipo', 'idGruppo', ),
        self::TYPE_COLNAME       => array(PartecipaTableMap::COL_ID_UTENTE, PartecipaTableMap::COL_ID_EVENTO, PartecipaTableMap::COL_TIPO, PartecipaTableMap::COL_ID_GRUPPO, ),
        self::TYPE_FIELDNAME     => array('Id_Utente', 'Id_Evento', 'Tipo', 'Id_Gruppo', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdUtente' => 0, 'IdEvento' => 1, 'Tipo' => 2, 'IdGruppo' => 3, ),
        self::TYPE_CAMELNAME     => array('idUtente' => 0, 'idEvento' => 1, 'tipo' => 2, 'idGruppo' => 3, ),
        self::TYPE_COLNAME       => array(PartecipaTableMap::COL_ID_UTENTE => 0, PartecipaTableMap::COL_ID_EVENTO => 1, PartecipaTableMap::COL_TIPO => 2, PartecipaTableMap::COL_ID_GRUPPO => 3, ),
        self::TYPE_FIELDNAME     => array('Id_Utente' => 0, 'Id_Evento' => 1, 'Tipo' => 2, 'Id_Gruppo' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'IdUtente' => 'ID_UTENTE',
        'Partecipa.IdUtente' => 'ID_UTENTE',
        'idUtente' => 'ID_UTENTE',
        'partecipa.idUtente' => 'ID_UTENTE',
        'PartecipaTableMap::COL_ID_UTENTE' => 'ID_UTENTE',
        'COL_ID_UTENTE' => 'ID_UTENTE',
        'Id_Utente' => 'ID_UTENTE',
        'partecipa.Id_Utente' => 'ID_UTENTE',
        'IdEvento' => 'ID_EVENTO',
        'Partecipa.IdEvento' => 'ID_EVENTO',
        'idEvento' => 'ID_EVENTO',
        'partecipa.idEvento' => 'ID_EVENTO',
        'PartecipaTableMap::COL_ID_EVENTO' => 'ID_EVENTO',
        'COL_ID_EVENTO' => 'ID_EVENTO',
        'Id_Evento' => 'ID_EVENTO',
        'partecipa.Id_Evento' => 'ID_EVENTO',
        'Tipo' => 'TIPO',
        'Partecipa.Tipo' => 'TIPO',
        'tipo' => 'TIPO',
        'partecipa.tipo' => 'TIPO',
        'PartecipaTableMap::COL_TIPO' => 'TIPO',
        'COL_TIPO' => 'TIPO',
        'Tipo' => 'TIPO',
        'partecipa.Tipo' => 'TIPO',
        'IdGruppo' => 'ID_GRUPPO',
        'Partecipa.IdGruppo' => 'ID_GRUPPO',
        'idGruppo' => 'ID_GRUPPO',
        'partecipa.idGruppo' => 'ID_GRUPPO',
        'PartecipaTableMap::COL_ID_GRUPPO' => 'ID_GRUPPO',
        'COL_ID_GRUPPO' => 'ID_GRUPPO',
        'Id_Gruppo' => 'ID_GRUPPO',
        'partecipa.Id_Gruppo' => 'ID_GRUPPO',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('partecipa');
        $this->setPhpName('Partecipa');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\Partecipa');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('Id_Utente', 'IdUtente', 'VARCHAR' , 'utente', 'Username', true, 50, null);
        $this->addForeignPrimaryKey('Id_Evento', 'IdEvento', 'INTEGER' , 'evento', 'id', true, null, null);
        $this->addColumn('Tipo', 'Tipo', 'CHAR', true, null, 'Partecipante');
        $this->addForeignKey('Id_Gruppo', 'IdGruppo', 'INTEGER', 'gruppo', 'Id', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Evento', '\\scc\\scc\\Evento', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Id_Evento',
    1 => ':id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Gruppo', '\\scc\\scc\\Gruppo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Id_Gruppo',
    1 => ':Id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Utente', '\\scc\\scc\\Utente', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Id_Utente',
    1 => ':Username',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \scc\scc\Partecipa $obj A \scc\scc\Partecipa object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getIdUtente() || is_scalar($obj->getIdUtente()) || is_callable([$obj->getIdUtente(), '__toString']) ? (string) $obj->getIdUtente() : $obj->getIdUtente()), (null === $obj->getIdEvento() || is_scalar($obj->getIdEvento()) || is_callable([$obj->getIdEvento(), '__toString']) ? (string) $obj->getIdEvento() : $obj->getIdEvento())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \scc\scc\Partecipa object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \scc\scc\Partecipa) {
                $key = serialize([(null === $value->getIdUtente() || is_scalar($value->getIdUtente()) || is_callable([$value->getIdUtente(), '__toString']) ? (string) $value->getIdUtente() : $value->getIdUtente()), (null === $value->getIdEvento() || is_scalar($value->getIdEvento()) || is_callable([$value->getIdEvento(), '__toString']) ? (string) $value->getIdEvento() : $value->getIdEvento())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \scc\scc\Partecipa object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('IdUtente', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('IdEvento', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? PartecipaTableMap::CLASS_DEFAULT : PartecipaTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Partecipa object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PartecipaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PartecipaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PartecipaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PartecipaTableMap::OM_CLASS;
            /** @var Partecipa $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PartecipaTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = PartecipaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PartecipaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Partecipa $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PartecipaTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PartecipaTableMap::COL_ID_UTENTE);
            $criteria->addSelectColumn(PartecipaTableMap::COL_ID_EVENTO);
            $criteria->addSelectColumn(PartecipaTableMap::COL_TIPO);
            $criteria->addSelectColumn(PartecipaTableMap::COL_ID_GRUPPO);
        } else {
            $criteria->addSelectColumn($alias . '.Id_Utente');
            $criteria->addSelectColumn($alias . '.Id_Evento');
            $criteria->addSelectColumn($alias . '.Tipo');
            $criteria->addSelectColumn($alias . '.Id_Gruppo');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(PartecipaTableMap::COL_ID_UTENTE);
            $criteria->removeSelectColumn(PartecipaTableMap::COL_ID_EVENTO);
            $criteria->removeSelectColumn(PartecipaTableMap::COL_TIPO);
            $criteria->removeSelectColumn(PartecipaTableMap::COL_ID_GRUPPO);
        } else {
            $criteria->removeSelectColumn($alias . '.Id_Utente');
            $criteria->removeSelectColumn($alias . '.Id_Evento');
            $criteria->removeSelectColumn($alias . '.Tipo');
            $criteria->removeSelectColumn($alias . '.Id_Gruppo');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(PartecipaTableMap::DATABASE_NAME)->getTable(PartecipaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PartecipaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PartecipaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PartecipaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Partecipa or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Partecipa object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PartecipaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\Partecipa) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PartecipaTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(PartecipaTableMap::COL_ID_UTENTE, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(PartecipaTableMap::COL_ID_EVENTO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = PartecipaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PartecipaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PartecipaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the partecipa table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PartecipaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Partecipa or Criteria object.
     *
     * @param mixed               $criteria Criteria or Partecipa object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PartecipaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Partecipa object
        }


        // Set the correct dbName
        $query = PartecipaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PartecipaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PartecipaTableMap::buildTableMap();
