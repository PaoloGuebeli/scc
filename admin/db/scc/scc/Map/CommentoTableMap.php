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
use scc\scc\Commento;
use scc\scc\CommentoQuery;


/**
 * This class defines the structure of the 'commento' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CommentoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.CommentoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'commento';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\Commento';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.Commento';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the Id field
     */
    const COL_ID = 'commento.Id';

    /**
     * the column name for the Id_Monitore field
     */
    const COL_ID_MONITORE = 'commento.Id_Monitore';

    /**
     * the column name for the Id_Partecipante field
     */
    const COL_ID_PARTECIPANTE = 'commento.Id_Partecipante';

    /**
     * the column name for the Data_Creazione field
     */
    const COL_DATA_CREAZIONE = 'commento.Data_Creazione';

    /**
     * the column name for the Commento field
     */
    const COL_COMMENTO = 'commento.Commento';

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
        self::TYPE_PHPNAME       => array('Id', 'IdMonitore', 'IdPartecipante', 'DataCreazione', 'Commento', ),
        self::TYPE_CAMELNAME     => array('id', 'idMonitore', 'idPartecipante', 'dataCreazione', 'commento', ),
        self::TYPE_COLNAME       => array(CommentoTableMap::COL_ID, CommentoTableMap::COL_ID_MONITORE, CommentoTableMap::COL_ID_PARTECIPANTE, CommentoTableMap::COL_DATA_CREAZIONE, CommentoTableMap::COL_COMMENTO, ),
        self::TYPE_FIELDNAME     => array('Id', 'Id_Monitore', 'Id_Partecipante', 'Data_Creazione', 'Commento', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'IdMonitore' => 1, 'IdPartecipante' => 2, 'DataCreazione' => 3, 'Commento' => 4, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idMonitore' => 1, 'idPartecipante' => 2, 'dataCreazione' => 3, 'commento' => 4, ),
        self::TYPE_COLNAME       => array(CommentoTableMap::COL_ID => 0, CommentoTableMap::COL_ID_MONITORE => 1, CommentoTableMap::COL_ID_PARTECIPANTE => 2, CommentoTableMap::COL_DATA_CREAZIONE => 3, CommentoTableMap::COL_COMMENTO => 4, ),
        self::TYPE_FIELDNAME     => array('Id' => 0, 'Id_Monitore' => 1, 'Id_Partecipante' => 2, 'Data_Creazione' => 3, 'Commento' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Id' => 'ID',
        'Commento.Id' => 'ID',
        'id' => 'ID',
        'commento.id' => 'ID',
        'CommentoTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Id' => 'ID',
        'commento.Id' => 'ID',
        'IdMonitore' => 'ID_MONITORE',
        'Commento.IdMonitore' => 'ID_MONITORE',
        'idMonitore' => 'ID_MONITORE',
        'commento.idMonitore' => 'ID_MONITORE',
        'CommentoTableMap::COL_ID_MONITORE' => 'ID_MONITORE',
        'COL_ID_MONITORE' => 'ID_MONITORE',
        'Id_Monitore' => 'ID_MONITORE',
        'commento.Id_Monitore' => 'ID_MONITORE',
        'IdPartecipante' => 'ID_PARTECIPANTE',
        'Commento.IdPartecipante' => 'ID_PARTECIPANTE',
        'idPartecipante' => 'ID_PARTECIPANTE',
        'commento.idPartecipante' => 'ID_PARTECIPANTE',
        'CommentoTableMap::COL_ID_PARTECIPANTE' => 'ID_PARTECIPANTE',
        'COL_ID_PARTECIPANTE' => 'ID_PARTECIPANTE',
        'Id_Partecipante' => 'ID_PARTECIPANTE',
        'commento.Id_Partecipante' => 'ID_PARTECIPANTE',
        'DataCreazione' => 'DATA_CREAZIONE',
        'Commento.DataCreazione' => 'DATA_CREAZIONE',
        'dataCreazione' => 'DATA_CREAZIONE',
        'commento.dataCreazione' => 'DATA_CREAZIONE',
        'CommentoTableMap::COL_DATA_CREAZIONE' => 'DATA_CREAZIONE',
        'COL_DATA_CREAZIONE' => 'DATA_CREAZIONE',
        'Data_Creazione' => 'DATA_CREAZIONE',
        'commento.Data_Creazione' => 'DATA_CREAZIONE',
        'Commento' => 'COMMENTO',
        'Commento.Commento' => 'COMMENTO',
        'commento' => 'COMMENTO',
        'commento.commento' => 'COMMENTO',
        'CommentoTableMap::COL_COMMENTO' => 'COMMENTO',
        'COL_COMMENTO' => 'COMMENTO',
        'Commento' => 'COMMENTO',
        'commento.Commento' => 'COMMENTO',
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
        $this->setName('commento');
        $this->setPhpName('Commento');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\Commento');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('Id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Id_Monitore', 'IdMonitore', 'INTEGER', true, null, null);
        $this->addColumn('Id_Partecipante', 'IdPartecipante', 'INTEGER', true, null, null);
        $this->addColumn('Data_Creazione', 'DataCreazione', 'DATE', true, null, null);
        $this->addColumn('Commento', 'Commento', 'VARCHAR', true, 1000, null);
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
        return $withPrefix ? CommentoTableMap::CLASS_DEFAULT : CommentoTableMap::OM_CLASS;
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
     * @return array           (Commento object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CommentoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CommentoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CommentoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CommentoTableMap::OM_CLASS;
            /** @var Commento $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CommentoTableMap::addInstanceToPool($obj, $key);
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
            $key = CommentoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CommentoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Commento $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CommentoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CommentoTableMap::COL_ID);
            $criteria->addSelectColumn(CommentoTableMap::COL_ID_MONITORE);
            $criteria->addSelectColumn(CommentoTableMap::COL_ID_PARTECIPANTE);
            $criteria->addSelectColumn(CommentoTableMap::COL_DATA_CREAZIONE);
            $criteria->addSelectColumn(CommentoTableMap::COL_COMMENTO);
        } else {
            $criteria->addSelectColumn($alias . '.Id');
            $criteria->addSelectColumn($alias . '.Id_Monitore');
            $criteria->addSelectColumn($alias . '.Id_Partecipante');
            $criteria->addSelectColumn($alias . '.Data_Creazione');
            $criteria->addSelectColumn($alias . '.Commento');
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
            $criteria->removeSelectColumn(CommentoTableMap::COL_ID);
            $criteria->removeSelectColumn(CommentoTableMap::COL_ID_MONITORE);
            $criteria->removeSelectColumn(CommentoTableMap::COL_ID_PARTECIPANTE);
            $criteria->removeSelectColumn(CommentoTableMap::COL_DATA_CREAZIONE);
            $criteria->removeSelectColumn(CommentoTableMap::COL_COMMENTO);
        } else {
            $criteria->removeSelectColumn($alias . '.Id');
            $criteria->removeSelectColumn($alias . '.Id_Monitore');
            $criteria->removeSelectColumn($alias . '.Id_Partecipante');
            $criteria->removeSelectColumn($alias . '.Data_Creazione');
            $criteria->removeSelectColumn($alias . '.Commento');
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
        return Propel::getServiceContainer()->getDatabaseMap(CommentoTableMap::DATABASE_NAME)->getTable(CommentoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CommentoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CommentoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CommentoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Commento or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Commento object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CommentoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\Commento) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CommentoTableMap::DATABASE_NAME);
            $criteria->add(CommentoTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CommentoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CommentoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CommentoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the commento table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CommentoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Commento or Criteria object.
     *
     * @param mixed               $criteria Criteria or Commento object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommentoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Commento object
        }

        if ($criteria->containsKey(CommentoTableMap::COL_ID) && $criteria->keyContainsValue(CommentoTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CommentoTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CommentoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CommentoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CommentoTableMap::buildTableMap();
