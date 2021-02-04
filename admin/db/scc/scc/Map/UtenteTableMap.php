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
use scc\scc\Utente;
use scc\scc\UtenteQuery;


/**
 * This class defines the structure of the 'utente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UtenteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'scc.scc.Map.UtenteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'utente';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\scc\\scc\\Utente';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'scc.scc.Utente';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the Username field
     */
    const COL_USERNAME = 'utente.Username';

    /**
     * the column name for the Email field
     */
    const COL_EMAIL = 'utente.Email';

    /**
     * the column name for the Nome field
     */
    const COL_NOME = 'utente.Nome';

    /**
     * the column name for the Cognome field
     */
    const COL_COGNOME = 'utente.Cognome';

    /**
     * the column name for the Telefono field
     */
    const COL_TELEFONO = 'utente.Telefono';

    /**
     * the column name for the Grado field
     */
    const COL_GRADO = 'utente.Grado';

    /**
     * the column name for the Anno_Nascita field
     */
    const COL_ANNO_NASCITA = 'utente.Anno_Nascita';

    /**
     * the column name for the Pass field
     */
    const COL_PASS = 'utente.Pass';

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
        self::TYPE_PHPNAME       => array('Username', 'Email', 'Nome', 'Cognome', 'Telefono', 'Grado', 'AnnoNascita', 'Pass', ),
        self::TYPE_CAMELNAME     => array('username', 'email', 'nome', 'cognome', 'telefono', 'grado', 'annoNascita', 'pass', ),
        self::TYPE_COLNAME       => array(UtenteTableMap::COL_USERNAME, UtenteTableMap::COL_EMAIL, UtenteTableMap::COL_NOME, UtenteTableMap::COL_COGNOME, UtenteTableMap::COL_TELEFONO, UtenteTableMap::COL_GRADO, UtenteTableMap::COL_ANNO_NASCITA, UtenteTableMap::COL_PASS, ),
        self::TYPE_FIELDNAME     => array('Username', 'Email', 'Nome', 'Cognome', 'Telefono', 'Grado', 'Anno_Nascita', 'Pass', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Username' => 0, 'Email' => 1, 'Nome' => 2, 'Cognome' => 3, 'Telefono' => 4, 'Grado' => 5, 'AnnoNascita' => 6, 'Pass' => 7, ),
        self::TYPE_CAMELNAME     => array('username' => 0, 'email' => 1, 'nome' => 2, 'cognome' => 3, 'telefono' => 4, 'grado' => 5, 'annoNascita' => 6, 'pass' => 7, ),
        self::TYPE_COLNAME       => array(UtenteTableMap::COL_USERNAME => 0, UtenteTableMap::COL_EMAIL => 1, UtenteTableMap::COL_NOME => 2, UtenteTableMap::COL_COGNOME => 3, UtenteTableMap::COL_TELEFONO => 4, UtenteTableMap::COL_GRADO => 5, UtenteTableMap::COL_ANNO_NASCITA => 6, UtenteTableMap::COL_PASS => 7, ),
        self::TYPE_FIELDNAME     => array('Username' => 0, 'Email' => 1, 'Nome' => 2, 'Cognome' => 3, 'Telefono' => 4, 'Grado' => 5, 'Anno_Nascita' => 6, 'Pass' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'Username' => 'USERNAME',
        'Utente.Username' => 'USERNAME',
        'username' => 'USERNAME',
        'utente.username' => 'USERNAME',
        'UtenteTableMap::COL_USERNAME' => 'USERNAME',
        'COL_USERNAME' => 'USERNAME',
        'Username' => 'USERNAME',
        'utente.Username' => 'USERNAME',
        'Email' => 'EMAIL',
        'Utente.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'utente.email' => 'EMAIL',
        'UtenteTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Email' => 'EMAIL',
        'utente.Email' => 'EMAIL',
        'Nome' => 'NOME',
        'Utente.Nome' => 'NOME',
        'nome' => 'NOME',
        'utente.nome' => 'NOME',
        'UtenteTableMap::COL_NOME' => 'NOME',
        'COL_NOME' => 'NOME',
        'Nome' => 'NOME',
        'utente.Nome' => 'NOME',
        'Cognome' => 'COGNOME',
        'Utente.Cognome' => 'COGNOME',
        'cognome' => 'COGNOME',
        'utente.cognome' => 'COGNOME',
        'UtenteTableMap::COL_COGNOME' => 'COGNOME',
        'COL_COGNOME' => 'COGNOME',
        'Cognome' => 'COGNOME',
        'utente.Cognome' => 'COGNOME',
        'Telefono' => 'TELEFONO',
        'Utente.Telefono' => 'TELEFONO',
        'telefono' => 'TELEFONO',
        'utente.telefono' => 'TELEFONO',
        'UtenteTableMap::COL_TELEFONO' => 'TELEFONO',
        'COL_TELEFONO' => 'TELEFONO',
        'Telefono' => 'TELEFONO',
        'utente.Telefono' => 'TELEFONO',
        'Grado' => 'GRADO',
        'Utente.Grado' => 'GRADO',
        'grado' => 'GRADO',
        'utente.grado' => 'GRADO',
        'UtenteTableMap::COL_GRADO' => 'GRADO',
        'COL_GRADO' => 'GRADO',
        'Grado' => 'GRADO',
        'utente.Grado' => 'GRADO',
        'AnnoNascita' => 'ANNO_NASCITA',
        'Utente.AnnoNascita' => 'ANNO_NASCITA',
        'annoNascita' => 'ANNO_NASCITA',
        'utente.annoNascita' => 'ANNO_NASCITA',
        'UtenteTableMap::COL_ANNO_NASCITA' => 'ANNO_NASCITA',
        'COL_ANNO_NASCITA' => 'ANNO_NASCITA',
        'Anno_Nascita' => 'ANNO_NASCITA',
        'utente.Anno_Nascita' => 'ANNO_NASCITA',
        'Pass' => 'PASS',
        'Utente.Pass' => 'PASS',
        'pass' => 'PASS',
        'utente.pass' => 'PASS',
        'UtenteTableMap::COL_PASS' => 'PASS',
        'COL_PASS' => 'PASS',
        'Pass' => 'PASS',
        'utente.Pass' => 'PASS',
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
        $this->setName('utente');
        $this->setPhpName('Utente');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\scc\\scc\\Utente');
        $this->setPackage('scc.scc');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Username', 'Username', 'VARCHAR', true, 50, null);
        $this->addColumn('Email', 'Email', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Nome', 'Nome', 'VARCHAR', true, 50, null);
        $this->addColumn('Cognome', 'Cognome', 'VARCHAR', true, 50, null);
        $this->addColumn('Telefono', 'Telefono', 'VARCHAR', false, 50, '0');
        $this->addColumn('Grado', 'Grado', 'INTEGER', true, null, 0);
        $this->addColumn('Anno_Nascita', 'AnnoNascita', 'INTEGER', true, null, null);
        $this->addColumn('Pass', 'Pass', 'VARCHAR', false, 500, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Partecipa', '\\scc\\scc\\Partecipa', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':Id_Utente',
    1 => ':Username',
  ),
), null, null, 'Partecipas', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Username', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UtenteTableMap::CLASS_DEFAULT : UtenteTableMap::OM_CLASS;
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
     * @return array           (Utente object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UtenteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UtenteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UtenteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UtenteTableMap::OM_CLASS;
            /** @var Utente $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UtenteTableMap::addInstanceToPool($obj, $key);
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
            $key = UtenteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UtenteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Utente $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UtenteTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UtenteTableMap::COL_USERNAME);
            $criteria->addSelectColumn(UtenteTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UtenteTableMap::COL_NOME);
            $criteria->addSelectColumn(UtenteTableMap::COL_COGNOME);
            $criteria->addSelectColumn(UtenteTableMap::COL_TELEFONO);
            $criteria->addSelectColumn(UtenteTableMap::COL_GRADO);
            $criteria->addSelectColumn(UtenteTableMap::COL_ANNO_NASCITA);
            $criteria->addSelectColumn(UtenteTableMap::COL_PASS);
        } else {
            $criteria->addSelectColumn($alias . '.Username');
            $criteria->addSelectColumn($alias . '.Email');
            $criteria->addSelectColumn($alias . '.Nome');
            $criteria->addSelectColumn($alias . '.Cognome');
            $criteria->addSelectColumn($alias . '.Telefono');
            $criteria->addSelectColumn($alias . '.Grado');
            $criteria->addSelectColumn($alias . '.Anno_Nascita');
            $criteria->addSelectColumn($alias . '.Pass');
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
            $criteria->removeSelectColumn(UtenteTableMap::COL_USERNAME);
            $criteria->removeSelectColumn(UtenteTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(UtenteTableMap::COL_NOME);
            $criteria->removeSelectColumn(UtenteTableMap::COL_COGNOME);
            $criteria->removeSelectColumn(UtenteTableMap::COL_TELEFONO);
            $criteria->removeSelectColumn(UtenteTableMap::COL_GRADO);
            $criteria->removeSelectColumn(UtenteTableMap::COL_ANNO_NASCITA);
            $criteria->removeSelectColumn(UtenteTableMap::COL_PASS);
        } else {
            $criteria->removeSelectColumn($alias . '.Username');
            $criteria->removeSelectColumn($alias . '.Email');
            $criteria->removeSelectColumn($alias . '.Nome');
            $criteria->removeSelectColumn($alias . '.Cognome');
            $criteria->removeSelectColumn($alias . '.Telefono');
            $criteria->removeSelectColumn($alias . '.Grado');
            $criteria->removeSelectColumn($alias . '.Anno_Nascita');
            $criteria->removeSelectColumn($alias . '.Pass');
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
        return Propel::getServiceContainer()->getDatabaseMap(UtenteTableMap::DATABASE_NAME)->getTable(UtenteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UtenteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UtenteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UtenteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Utente or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Utente object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UtenteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \scc\scc\Utente) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UtenteTableMap::DATABASE_NAME);
            $criteria->add(UtenteTableMap::COL_USERNAME, (array) $values, Criteria::IN);
        }

        $query = UtenteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UtenteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UtenteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the utente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UtenteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Utente or Criteria object.
     *
     * @param mixed               $criteria Criteria or Utente object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtenteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Utente object
        }


        // Set the correct dbName
        $query = UtenteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UtenteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UtenteTableMap::buildTableMap();
