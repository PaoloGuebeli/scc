<?php

namespace scc\scc\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use scc\scc\Commento as ChildCommento;
use scc\scc\CommentoQuery as ChildCommentoQuery;
use scc\scc\Map\CommentoTableMap;

/**
 * Base class that represents a query for the 'commento' table.
 *
 *
 *
 * @method     ChildCommentoQuery orderById($order = Criteria::ASC) Order by the Id column
 * @method     ChildCommentoQuery orderByIdMonitore($order = Criteria::ASC) Order by the Id_Monitore column
 * @method     ChildCommentoQuery orderByIdPartecipante($order = Criteria::ASC) Order by the Id_Partecipante column
 * @method     ChildCommentoQuery orderByDataCreazione($order = Criteria::ASC) Order by the Data_Creazione column
 * @method     ChildCommentoQuery orderByCommento($order = Criteria::ASC) Order by the Commento column
 *
 * @method     ChildCommentoQuery groupById() Group by the Id column
 * @method     ChildCommentoQuery groupByIdMonitore() Group by the Id_Monitore column
 * @method     ChildCommentoQuery groupByIdPartecipante() Group by the Id_Partecipante column
 * @method     ChildCommentoQuery groupByDataCreazione() Group by the Data_Creazione column
 * @method     ChildCommentoQuery groupByCommento() Group by the Commento column
 *
 * @method     ChildCommentoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommentoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommentoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommentoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommentoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommentoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommento|null findOne(ConnectionInterface $con = null) Return the first ChildCommento matching the query
 * @method     ChildCommento findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCommento matching the query, or a new ChildCommento object populated from the query conditions when no match is found
 *
 * @method     ChildCommento|null findOneById(int $Id) Return the first ChildCommento filtered by the Id column
 * @method     ChildCommento|null findOneByIdMonitore(int $Id_Monitore) Return the first ChildCommento filtered by the Id_Monitore column
 * @method     ChildCommento|null findOneByIdPartecipante(int $Id_Partecipante) Return the first ChildCommento filtered by the Id_Partecipante column
 * @method     ChildCommento|null findOneByDataCreazione(string $Data_Creazione) Return the first ChildCommento filtered by the Data_Creazione column
 * @method     ChildCommento|null findOneByCommento(string $Commento) Return the first ChildCommento filtered by the Commento column *

 * @method     ChildCommento requirePk($key, ConnectionInterface $con = null) Return the ChildCommento by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommento requireOne(ConnectionInterface $con = null) Return the first ChildCommento matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommento requireOneById(int $Id) Return the first ChildCommento filtered by the Id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommento requireOneByIdMonitore(int $Id_Monitore) Return the first ChildCommento filtered by the Id_Monitore column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommento requireOneByIdPartecipante(int $Id_Partecipante) Return the first ChildCommento filtered by the Id_Partecipante column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommento requireOneByDataCreazione(string $Data_Creazione) Return the first ChildCommento filtered by the Data_Creazione column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommento requireOneByCommento(string $Commento) Return the first ChildCommento filtered by the Commento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommento[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCommento objects based on current ModelCriteria
 * @method     ChildCommento[]|ObjectCollection findById(int $Id) Return ChildCommento objects filtered by the Id column
 * @method     ChildCommento[]|ObjectCollection findByIdMonitore(int $Id_Monitore) Return ChildCommento objects filtered by the Id_Monitore column
 * @method     ChildCommento[]|ObjectCollection findByIdPartecipante(int $Id_Partecipante) Return ChildCommento objects filtered by the Id_Partecipante column
 * @method     ChildCommento[]|ObjectCollection findByDataCreazione(string $Data_Creazione) Return ChildCommento objects filtered by the Data_Creazione column
 * @method     ChildCommento[]|ObjectCollection findByCommento(string $Commento) Return ChildCommento objects filtered by the Commento column
 * @method     ChildCommento[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommentoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\CommentoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\Commento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommentoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommentoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommentoQuery) {
            return $criteria;
        }
        $query = new ChildCommentoQuery();
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCommento|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommentoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommentoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCommento A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Id, Id_Monitore, Id_Partecipante, Data_Creazione, Commento FROM commento WHERE Id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCommento $obj */
            $obj = new ChildCommento();
            $obj->hydrate($row);
            CommentoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCommento|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommentoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommentoTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE Id = 1234
     * $query->filterById(array(12, 34)); // WHERE Id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE Id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Id_Monitore column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMonitore(1234); // WHERE Id_Monitore = 1234
     * $query->filterByIdMonitore(array(12, 34)); // WHERE Id_Monitore IN (12, 34)
     * $query->filterByIdMonitore(array('min' => 12)); // WHERE Id_Monitore > 12
     * </code>
     *
     * @param     mixed $idMonitore The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByIdMonitore($idMonitore = null, $comparison = null)
    {
        if (is_array($idMonitore)) {
            $useMinMax = false;
            if (isset($idMonitore['min'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID_MONITORE, $idMonitore['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMonitore['max'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID_MONITORE, $idMonitore['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentoTableMap::COL_ID_MONITORE, $idMonitore, $comparison);
    }

    /**
     * Filter the query on the Id_Partecipante column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPartecipante(1234); // WHERE Id_Partecipante = 1234
     * $query->filterByIdPartecipante(array(12, 34)); // WHERE Id_Partecipante IN (12, 34)
     * $query->filterByIdPartecipante(array('min' => 12)); // WHERE Id_Partecipante > 12
     * </code>
     *
     * @param     mixed $idPartecipante The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByIdPartecipante($idPartecipante = null, $comparison = null)
    {
        if (is_array($idPartecipante)) {
            $useMinMax = false;
            if (isset($idPartecipante['min'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID_PARTECIPANTE, $idPartecipante['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPartecipante['max'])) {
                $this->addUsingAlias(CommentoTableMap::COL_ID_PARTECIPANTE, $idPartecipante['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentoTableMap::COL_ID_PARTECIPANTE, $idPartecipante, $comparison);
    }

    /**
     * Filter the query on the Data_Creazione column
     *
     * Example usage:
     * <code>
     * $query->filterByDataCreazione('2011-03-14'); // WHERE Data_Creazione = '2011-03-14'
     * $query->filterByDataCreazione('now'); // WHERE Data_Creazione = '2011-03-14'
     * $query->filterByDataCreazione(array('max' => 'yesterday')); // WHERE Data_Creazione > '2011-03-13'
     * </code>
     *
     * @param     mixed $dataCreazione The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByDataCreazione($dataCreazione = null, $comparison = null)
    {
        if (is_array($dataCreazione)) {
            $useMinMax = false;
            if (isset($dataCreazione['min'])) {
                $this->addUsingAlias(CommentoTableMap::COL_DATA_CREAZIONE, $dataCreazione['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataCreazione['max'])) {
                $this->addUsingAlias(CommentoTableMap::COL_DATA_CREAZIONE, $dataCreazione['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentoTableMap::COL_DATA_CREAZIONE, $dataCreazione, $comparison);
    }

    /**
     * Filter the query on the Commento column
     *
     * Example usage:
     * <code>
     * $query->filterByCommento('fooValue');   // WHERE Commento = 'fooValue'
     * $query->filterByCommento('%fooValue%', Criteria::LIKE); // WHERE Commento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function filterByCommento($commento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommentoTableMap::COL_COMMENTO, $commento, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCommento $commento Object to remove from the list of results
     *
     * @return $this|ChildCommentoQuery The current query, for fluid interface
     */
    public function prune($commento = null)
    {
        if ($commento) {
            $this->addUsingAlias(CommentoTableMap::COL_ID, $commento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the commento table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommentoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommentoTableMap::clearInstancePool();
            CommentoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommentoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommentoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommentoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommentoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommentoQuery
