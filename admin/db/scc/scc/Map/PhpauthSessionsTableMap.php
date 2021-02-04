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
use scc\scc\PhpauthSessions;
use scc\scc\PhpauthSessionsQuery;


/**
 * This class defines the structure of the 'phpauth_sessions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PhpauthSessionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.PhpauthSessionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'phpauth_sessions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\PhpauthSessions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.PhpauthSessions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'phpauth_sessions.id';

    /**
     * the column name for the uid field
     */
    const COL_UID = 'phpauth_sessions.uid';

    /**
     * the column name for the hash field
     */
    const COL_HASH = 'phpauth_sessions.hash';

    /**
     * the column name for the expiredate field
     */
    const COL_EXPIREDATE = 'phpauth_sessions.expiredate';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'phpauth_sessions.ip';

    /**
     * the column name for the agent field
     */
    const COL_AGENT = 'phpauth_sessions.agent';

    /**
     * the column name for the cookie_crc field
     */
    const COL_COOKIE_CRC = 'phpauth_sessions.cookie_crc';

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
        self::TYPE_PHPNAME       => array('Id', 'Uid', 'Hash', 'Expiredate', 'Ip', 'Agent', 'CookieCrc', ),
        self::TYPE_CAMELNAME     => array('id', 'uid', 'hash', 'expiredate', 'ip', 'agent', 'cookieCrc', ),
        self::TYPE_COLNAME       => array(PhpauthSessionsTableMap::COL_ID, PhpauthSessionsTableMap::COL_UID, PhpauthSessionsTableMap::COL_HASH, PhpauthSessionsTableMap::COL_EXPIREDATE, PhpauthSessionsTableMap::COL_IP, PhpauthSessionsTableMap::COL_AGENT, PhpauthSessionsTableMap::COL_COOKIE_CRC, ),
        self::TYPE_FIELDNAME     => array('id', 'uid', 'hash', 'expiredate', 'ip', 'agent', 'cookie_crc', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Uid' => 1, 'Hash' => 2, 'Expiredate' => 3, 'Ip' => 4, 'Agent' => 5, 'CookieCrc' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'uid' => 1, 'hash' => 2, 'expiredate' => 3, 'ip' => 4, 'agent' => 5, 'cookieCrc' => 6, ),
        self::TYPE_COLNAME       => array(PhpauthSessionsTableMap::COL_ID => 0, PhpauthSessionsTableMap::COL_UID => 1, PhpauthSessionsTableMap::COL_HASH => 2, PhpauthSessionsTableMap::COL_EXPIREDATE => 3, PhpauthSessionsTableMap::COL_IP => 4, PhpauthSessionsTableMap::COL_AGENT => 5, PhpauthSessionsTableMap::COL_COOKIE_CRC => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'uid' => 1, 'hash' => 2, 'expiredate' => 3, 'ip' => 4, 'agent' => 5, 'cookie_crc' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'ID',
        'PhpauthSessions.Id' => 'ID',
        'id' => 'ID',
        'phpauthSessions.id' => 'ID',
        'PhpauthSessionsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'id' => 'ID',
        'phpauth_sessions.id' => 'ID',
        'Uid' => 'UID',
        'PhpauthSessions.Uid' => 'UID',
        'uid' => 'UID',
        'phpauthSessions.uid' => 'UID',
        'PhpauthSessionsTableMap::COL_UID' => 'UID',
        'COL_UID' => 'UID',
        'uid' => 'UID',
        'phpauth_sessions.uid' => 'UID',
        'Hash' => 'HASH',
        'PhpauthSessions.Hash' => 'HASH',
        'hash' => 'HASH',
        'phpauthSessions.hash' => 'HASH',
        'PhpauthSessionsTableMap::COL_HASH' => 'HASH',
        'COL_HASH' => 'HASH',
        'hash' => 'HASH',
        'phpauth_sessions.hash' => 'HASH',
        'Expiredate' => 'EXPIREDATE',
        'PhpauthSessions.Expiredate' => 'EXPIREDATE',
        'expiredate' => 'EXPIREDATE',
        'phpauthSessions.expiredate' => 'EXPIREDATE',
        'PhpauthSessionsTableMap::COL_EXPIREDATE' => 'EXPIREDATE',
        'COL_EXPIREDATE' => 'EXPIREDATE',
        'expiredate' => 'EXPIREDATE',
        'phpauth_sessions.expiredate' => 'EXPIREDATE',
        'Ip' => 'IP',
        'PhpauthSessions.Ip' => 'IP',
        'ip' => 'IP',
        'phpauthSessions.ip' => 'IP',
        'PhpauthSessionsTableMap::COL_IP' => 'IP',
        'COL_IP' => 'IP',
        'ip' => 'IP',
        'phpauth_sessions.ip' => 'IP',
        'Agent' => 'AGENT',
        'PhpauthSessions.Agent' => 'AGENT',
        'agent' => 'AGENT',
        'phpauthSessions.agent' => 'AGENT',
        'PhpauthSessionsTableMap::COL_AGENT' => 'AGENT',
        'COL_AGENT' => 'AGENT',
        'agent' => 'AGENT',
        'phpauth_sessions.agent' => 'AGENT',
        'CookieCrc' => 'COOKIE_CRC',
        'PhpauthSessions.CookieCrc' => 'COOKIE_CRC',
        'cookieCrc' => 'COOKIE_CRC',
        'phpauthSessions.cookieCrc' => 'COOKIE_CRC',
        'PhpauthSessionsTableMap::COL_COOKIE_CRC' => 'COOKIE_CRC',
        'COL_COOKIE_CRC' => 'COOKIE_CRC',
        'cookie_crc' => 'COOKIE_CRC',
        'phpauth_sessions.cookie_crc' => 'COOKIE_CRC',
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
        $this->setName('phpauth_sessions');
        $this->setPhpName('PhpauthSessions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\PhpauthSessions');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('uid', 'Uid', 'INTEGER', true, null, null);
        $this->addColumn('hash', 'Hash', 'CHAR', true, 40, null);
        $this->addColumn('expiredate', 'Expiredate', 'TIMESTAMP', true, null, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', true, 39, null);
        $this->addColumn('agent', 'Agent', 'VARCHAR', true, 200, null);
        $this->addColumn('cookie_crc', 'CookieCrc', 'CHAR', true, 40, null);
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
        return $withPrefix ? PhpauthSessionsTableMap::CLASS_DEFAULT : PhpauthSessionsTableMap::OM_CLASS;
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
     * @return array           (PhpauthSessions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PhpauthSessionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PhpauthSessionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PhpauthSessionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PhpauthSessionsTableMap::OM_CLASS;
            /** @var PhpauthSessions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PhpauthSessionsTableMap::addInstanceToPool($obj, $key);
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
            $key = PhpauthSessionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PhpauthSessionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PhpauthSessions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PhpauthSessionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_ID);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_UID);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_HASH);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_EXPIREDATE);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_IP);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_AGENT);
            $criteria->addSelectColumn(PhpauthSessionsTableMap::COL_COOKIE_CRC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.uid');
            $criteria->addSelectColumn($alias . '.hash');
            $criteria->addSelectColumn($alias . '.expiredate');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.agent');
            $criteria->addSelectColumn($alias . '.cookie_crc');
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
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_ID);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_UID);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_HASH);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_EXPIREDATE);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_IP);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_AGENT);
            $criteria->removeSelectColumn(PhpauthSessionsTableMap::COL_COOKIE_CRC);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.uid');
            $criteria->removeSelectColumn($alias . '.hash');
            $criteria->removeSelectColumn($alias . '.expiredate');
            $criteria->removeSelectColumn($alias . '.ip');
            $criteria->removeSelectColumn($alias . '.agent');
            $criteria->removeSelectColumn($alias . '.cookie_crc');
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
        return Propel::getServiceContainer()->getDatabaseMap(PhpauthSessionsTableMap::DATABASE_NAME)->getTable(PhpauthSessionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PhpauthSessionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PhpauthSessionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PhpauthSessionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PhpauthSessions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PhpauthSessions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthSessionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\PhpauthSessions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PhpauthSessionsTableMap::DATABASE_NAME);
            $criteria->add(PhpauthSessionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PhpauthSessionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PhpauthSessionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PhpauthSessionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the phpauth_sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PhpauthSessionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PhpauthSessions or Criteria object.
     *
     * @param mixed               $criteria Criteria or PhpauthSessions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthSessionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PhpauthSessions object
        }

        if ($criteria->containsKey(PhpauthSessionsTableMap::COL_ID) && $criteria->keyContainsValue(PhpauthSessionsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PhpauthSessionsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PhpauthSessionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PhpauthSessionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PhpauthSessionsTableMap::buildTableMap();
