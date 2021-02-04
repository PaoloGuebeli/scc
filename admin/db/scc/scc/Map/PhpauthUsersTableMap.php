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
use scc\scc\PhpauthUsers;
use scc\scc\PhpauthUsersQuery;


/**
 * This class defines the structure of the 'phpauth_users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PhpauthUsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.PhpauthUsersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'phpauth_users';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\PhpauthUsers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.PhpauthUsers';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'phpauth_users.id';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'phpauth_users.email';

    /**
     * the column name for the Nome field
     */
    const COL_NOME = 'phpauth_users.Nome';

    /**
     * the column name for the Cognome field
     */
    const COL_COGNOME = 'phpauth_users.Cognome';

    /**
     * the column name for the Phone field
     */
    const COL_PHONE = 'phpauth_users.Phone';

    /**
     * the column name for the Level field
     */
    const COL_LEVEL = 'phpauth_users.Level';

    /**
     * the column name for the Bithyear field
     */
    const COL_BITHYEAR = 'phpauth_users.Bithyear';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'phpauth_users.password';

    /**
     * the column name for the isactive field
     */
    const COL_ISACTIVE = 'phpauth_users.isactive';

    /**
     * the column name for the dt field
     */
    const COL_DT = 'phpauth_users.dt';

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
        self::TYPE_PHPNAME       => array('Id', 'Email', 'Nome', 'Cognome', 'Phone', 'Level', 'Bithyear', 'Password', 'Isactive', 'Dt', ),
        self::TYPE_CAMELNAME     => array('id', 'email', 'nome', 'cognome', 'phone', 'level', 'bithyear', 'password', 'isactive', 'dt', ),
        self::TYPE_COLNAME       => array(PhpauthUsersTableMap::COL_ID, PhpauthUsersTableMap::COL_EMAIL, PhpauthUsersTableMap::COL_NOME, PhpauthUsersTableMap::COL_COGNOME, PhpauthUsersTableMap::COL_PHONE, PhpauthUsersTableMap::COL_LEVEL, PhpauthUsersTableMap::COL_BITHYEAR, PhpauthUsersTableMap::COL_PASSWORD, PhpauthUsersTableMap::COL_ISACTIVE, PhpauthUsersTableMap::COL_DT, ),
        self::TYPE_FIELDNAME     => array('id', 'email', 'Nome', 'Cognome', 'Phone', 'Level', 'Bithyear', 'password', 'isactive', 'dt', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Email' => 1, 'Nome' => 2, 'Cognome' => 3, 'Phone' => 4, 'Level' => 5, 'Bithyear' => 6, 'Password' => 7, 'Isactive' => 8, 'Dt' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'email' => 1, 'nome' => 2, 'cognome' => 3, 'phone' => 4, 'level' => 5, 'bithyear' => 6, 'password' => 7, 'isactive' => 8, 'dt' => 9, ),
        self::TYPE_COLNAME       => array(PhpauthUsersTableMap::COL_ID => 0, PhpauthUsersTableMap::COL_EMAIL => 1, PhpauthUsersTableMap::COL_NOME => 2, PhpauthUsersTableMap::COL_COGNOME => 3, PhpauthUsersTableMap::COL_PHONE => 4, PhpauthUsersTableMap::COL_LEVEL => 5, PhpauthUsersTableMap::COL_BITHYEAR => 6, PhpauthUsersTableMap::COL_PASSWORD => 7, PhpauthUsersTableMap::COL_ISACTIVE => 8, PhpauthUsersTableMap::COL_DT => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'email' => 1, 'Nome' => 2, 'Cognome' => 3, 'Phone' => 4, 'Level' => 5, 'Bithyear' => 6, 'password' => 7, 'isactive' => 8, 'dt' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'ID',
        'PhpauthUsers.Id' => 'ID',
        'id' => 'ID',
        'phpauthUsers.id' => 'ID',
        'PhpauthUsersTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'id' => 'ID',
        'phpauth_users.id' => 'ID',
        'Email' => 'EMAIL',
        'PhpauthUsers.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'phpauthUsers.email' => 'EMAIL',
        'PhpauthUsersTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'email' => 'EMAIL',
        'phpauth_users.email' => 'EMAIL',
        'Nome' => 'NOME',
        'PhpauthUsers.Nome' => 'NOME',
        'nome' => 'NOME',
        'phpauthUsers.nome' => 'NOME',
        'PhpauthUsersTableMap::COL_NOME' => 'NOME',
        'COL_NOME' => 'NOME',
        'Nome' => 'NOME',
        'phpauth_users.Nome' => 'NOME',
        'Cognome' => 'COGNOME',
        'PhpauthUsers.Cognome' => 'COGNOME',
        'cognome' => 'COGNOME',
        'phpauthUsers.cognome' => 'COGNOME',
        'PhpauthUsersTableMap::COL_COGNOME' => 'COGNOME',
        'COL_COGNOME' => 'COGNOME',
        'Cognome' => 'COGNOME',
        'phpauth_users.Cognome' => 'COGNOME',
        'Phone' => 'PHONE',
        'PhpauthUsers.Phone' => 'PHONE',
        'phone' => 'PHONE',
        'phpauthUsers.phone' => 'PHONE',
        'PhpauthUsersTableMap::COL_PHONE' => 'PHONE',
        'COL_PHONE' => 'PHONE',
        'Phone' => 'PHONE',
        'phpauth_users.Phone' => 'PHONE',
        'Level' => 'LEVEL',
        'PhpauthUsers.Level' => 'LEVEL',
        'level' => 'LEVEL',
        'phpauthUsers.level' => 'LEVEL',
        'PhpauthUsersTableMap::COL_LEVEL' => 'LEVEL',
        'COL_LEVEL' => 'LEVEL',
        'Level' => 'LEVEL',
        'phpauth_users.Level' => 'LEVEL',
        'Bithyear' => 'BITHYEAR',
        'PhpauthUsers.Bithyear' => 'BITHYEAR',
        'bithyear' => 'BITHYEAR',
        'phpauthUsers.bithyear' => 'BITHYEAR',
        'PhpauthUsersTableMap::COL_BITHYEAR' => 'BITHYEAR',
        'COL_BITHYEAR' => 'BITHYEAR',
        'Bithyear' => 'BITHYEAR',
        'phpauth_users.Bithyear' => 'BITHYEAR',
        'Password' => 'PASSWORD',
        'PhpauthUsers.Password' => 'PASSWORD',
        'password' => 'PASSWORD',
        'phpauthUsers.password' => 'PASSWORD',
        'PhpauthUsersTableMap::COL_PASSWORD' => 'PASSWORD',
        'COL_PASSWORD' => 'PASSWORD',
        'password' => 'PASSWORD',
        'phpauth_users.password' => 'PASSWORD',
        'Isactive' => 'ISACTIVE',
        'PhpauthUsers.Isactive' => 'ISACTIVE',
        'isactive' => 'ISACTIVE',
        'phpauthUsers.isactive' => 'ISACTIVE',
        'PhpauthUsersTableMap::COL_ISACTIVE' => 'ISACTIVE',
        'COL_ISACTIVE' => 'ISACTIVE',
        'isactive' => 'ISACTIVE',
        'phpauth_users.isactive' => 'ISACTIVE',
        'Dt' => 'DT',
        'PhpauthUsers.Dt' => 'DT',
        'dt' => 'DT',
        'phpauthUsers.dt' => 'DT',
        'PhpauthUsersTableMap::COL_DT' => 'DT',
        'COL_DT' => 'DT',
        'dt' => 'DT',
        'phpauth_users.dt' => 'DT',
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
        $this->setName('phpauth_users');
        $this->setPhpName('PhpauthUsers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\PhpauthUsers');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 100, null);
        $this->addColumn('Nome', 'Nome', 'VARCHAR', true, 60, null);
        $this->addColumn('Cognome', 'Cognome', 'VARCHAR', true, 60, null);
        $this->addColumn('Phone', 'Phone', 'VARCHAR', true, 60, null);
        $this->addColumn('Level', 'Level', 'INTEGER', true, null, 3);
        $this->addColumn('Bithyear', 'Bithyear', 'INTEGER', true, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('isactive', 'Isactive', 'BOOLEAN', true, 1, false);
        $this->addColumn('dt', 'Dt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? PhpauthUsersTableMap::CLASS_DEFAULT : PhpauthUsersTableMap::OM_CLASS;
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
     * @return array           (PhpauthUsers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PhpauthUsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PhpauthUsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PhpauthUsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PhpauthUsersTableMap::OM_CLASS;
            /** @var PhpauthUsers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PhpauthUsersTableMap::addInstanceToPool($obj, $key);
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
            $key = PhpauthUsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PhpauthUsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PhpauthUsers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PhpauthUsersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_ID);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_NOME);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_COGNOME);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_PHONE);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_LEVEL);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_BITHYEAR);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_ISACTIVE);
            $criteria->addSelectColumn(PhpauthUsersTableMap::COL_DT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.Nome');
            $criteria->addSelectColumn($alias . '.Cognome');
            $criteria->addSelectColumn($alias . '.Phone');
            $criteria->addSelectColumn($alias . '.Level');
            $criteria->addSelectColumn($alias . '.Bithyear');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.isactive');
            $criteria->addSelectColumn($alias . '.dt');
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
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_ID);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_NOME);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_COGNOME);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_PHONE);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_LEVEL);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_BITHYEAR);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_PASSWORD);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_ISACTIVE);
            $criteria->removeSelectColumn(PhpauthUsersTableMap::COL_DT);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.Nome');
            $criteria->removeSelectColumn($alias . '.Cognome');
            $criteria->removeSelectColumn($alias . '.Phone');
            $criteria->removeSelectColumn($alias . '.Level');
            $criteria->removeSelectColumn($alias . '.Bithyear');
            $criteria->removeSelectColumn($alias . '.password');
            $criteria->removeSelectColumn($alias . '.isactive');
            $criteria->removeSelectColumn($alias . '.dt');
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
        return Propel::getServiceContainer()->getDatabaseMap(PhpauthUsersTableMap::DATABASE_NAME)->getTable(PhpauthUsersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PhpauthUsersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PhpauthUsersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PhpauthUsersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PhpauthUsers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PhpauthUsers object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthUsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\PhpauthUsers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PhpauthUsersTableMap::DATABASE_NAME);
            $criteria->add(PhpauthUsersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PhpauthUsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PhpauthUsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PhpauthUsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the phpauth_users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PhpauthUsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PhpauthUsers or Criteria object.
     *
     * @param mixed               $criteria Criteria or PhpauthUsers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthUsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PhpauthUsers object
        }

        if ($criteria->containsKey(PhpauthUsersTableMap::COL_ID) && $criteria->keyContainsValue(PhpauthUsersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PhpauthUsersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PhpauthUsersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PhpauthUsersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PhpauthUsersTableMap::buildTableMap();
