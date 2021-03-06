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
use scc\scc\PhpauthAttempts;
use scc\scc\PhpauthAttemptsQuery;


/**
 * This class defines the structure of the 'phpauth_attempts' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PhpauthAttemptsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.PhpauthAttemptsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'phpauth_attempts';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\PhpauthAttempts';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.PhpauthAttempts';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id field
     */
    const COL_ID = 'phpauth_attempts.id';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'phpauth_attempts.ip';

    /**
     * the column name for the expiredate field
     */
    const COL_EXPIREDATE = 'phpauth_attempts.expiredate';

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
        self::TYPE_PHPNAME       => array('Id', 'Ip', 'Expiredate', ),
        self::TYPE_CAMELNAME     => array('id', 'ip', 'expiredate', ),
        self::TYPE_COLNAME       => array(PhpauthAttemptsTableMap::COL_ID, PhpauthAttemptsTableMap::COL_IP, PhpauthAttemptsTableMap::COL_EXPIREDATE, ),
        self::TYPE_FIELDNAME     => array('id', 'ip', 'expiredate', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Ip' => 1, 'Expiredate' => 2, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'ip' => 1, 'expiredate' => 2, ),
        self::TYPE_COLNAME       => array(PhpauthAttemptsTableMap::COL_ID => 0, PhpauthAttemptsTableMap::COL_IP => 1, PhpauthAttemptsTableMap::COL_EXPIREDATE => 2, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ip' => 1, 'expiredate' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'ID',
        'PhpauthAttempts.Id' => 'ID',
        'id' => 'ID',
        'phpauthAttempts.id' => 'ID',
        'PhpauthAttemptsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'id' => 'ID',
        'phpauth_attempts.id' => 'ID',
        'Ip' => 'IP',
        'PhpauthAttempts.Ip' => 'IP',
        'ip' => 'IP',
        'phpauthAttempts.ip' => 'IP',
        'PhpauthAttemptsTableMap::COL_IP' => 'IP',
        'COL_IP' => 'IP',
        'ip' => 'IP',
        'phpauth_attempts.ip' => 'IP',
        'Expiredate' => 'EXPIREDATE',
        'PhpauthAttempts.Expiredate' => 'EXPIREDATE',
        'expiredate' => 'EXPIREDATE',
        'phpauthAttempts.expiredate' => 'EXPIREDATE',
        'PhpauthAttemptsTableMap::COL_EXPIREDATE' => 'EXPIREDATE',
        'COL_EXPIREDATE' => 'EXPIREDATE',
        'expiredate' => 'EXPIREDATE',
        'phpauth_attempts.expiredate' => 'EXPIREDATE',
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
        $this->setName('phpauth_attempts');
        $this->setPhpName('PhpauthAttempts');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\PhpauthAttempts');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('ip', 'Ip', 'CHAR', true, 39, null);
        $this->addColumn('expiredate', 'Expiredate', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? PhpauthAttemptsTableMap::CLASS_DEFAULT : PhpauthAttemptsTableMap::OM_CLASS;
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
     * @return array           (PhpauthAttempts object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PhpauthAttemptsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PhpauthAttemptsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PhpauthAttemptsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PhpauthAttemptsTableMap::OM_CLASS;
            /** @var PhpauthAttempts $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PhpauthAttemptsTableMap::addInstanceToPool($obj, $key);
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
            $key = PhpauthAttemptsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PhpauthAttemptsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PhpauthAttempts $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PhpauthAttemptsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PhpauthAttemptsTableMap::COL_ID);
            $criteria->addSelectColumn(PhpauthAttemptsTableMap::COL_IP);
            $criteria->addSelectColumn(PhpauthAttemptsTableMap::COL_EXPIREDATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.expiredate');
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
            $criteria->removeSelectColumn(PhpauthAttemptsTableMap::COL_ID);
            $criteria->removeSelectColumn(PhpauthAttemptsTableMap::COL_IP);
            $criteria->removeSelectColumn(PhpauthAttemptsTableMap::COL_EXPIREDATE);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.ip');
            $criteria->removeSelectColumn($alias . '.expiredate');
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
        return Propel::getServiceContainer()->getDatabaseMap(PhpauthAttemptsTableMap::DATABASE_NAME)->getTable(PhpauthAttemptsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PhpauthAttemptsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PhpauthAttemptsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PhpauthAttemptsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PhpauthAttempts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PhpauthAttempts object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthAttemptsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\PhpauthAttempts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PhpauthAttemptsTableMap::DATABASE_NAME);
            $criteria->add(PhpauthAttemptsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PhpauthAttemptsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PhpauthAttemptsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PhpauthAttemptsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the phpauth_attempts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PhpauthAttemptsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PhpauthAttempts or Criteria object.
     *
     * @param mixed               $criteria Criteria or PhpauthAttempts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthAttemptsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PhpauthAttempts object
        }

        if ($criteria->containsKey(PhpauthAttemptsTableMap::COL_ID) && $criteria->keyContainsValue(PhpauthAttemptsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PhpauthAttemptsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PhpauthAttemptsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PhpauthAttemptsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PhpauthAttemptsTableMap::buildTableMap();
