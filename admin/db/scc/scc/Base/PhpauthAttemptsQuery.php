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
use scc\scc\PhpauthAttempts as ChildPhpauthAttempts;
use scc\scc\PhpauthAttemptsQuery as ChildPhpauthAttemptsQuery;
use scc\scc\Map\PhpauthAttemptsTableMap;

/**
 * Base class that represents a query for the 'phpauth_attempts' table.
 *
 *
 *
 * @method     ChildPhpauthAttemptsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPhpauthAttemptsQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildPhpauthAttemptsQuery orderByExpiredate($order = Criteria::ASC) Order by the expiredate column
 *
 * @method     ChildPhpauthAttemptsQuery groupById() Group by the id column
 * @method     ChildPhpauthAttemptsQuery groupByIp() Group by the ip column
 * @method     ChildPhpauthAttemptsQuery groupByExpiredate() Group by the expiredate column
 *
 * @method     ChildPhpauthAttemptsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhpauthAttemptsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhpauthAttemptsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhpauthAttemptsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhpauthAttemptsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhpauthAttemptsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhpauthAttempts|null findOne(ConnectionInterface $con = null) Return the first ChildPhpauthAttempts matching the query
 * @method     ChildPhpauthAttempts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhpauthAttempts matching the query, or a new ChildPhpauthAttempts object populated from the query conditions when no match is found
 *
 * @method     ChildPhpauthAttempts|null findOneById(int $id) Return the first ChildPhpauthAttempts filtered by the id column
 * @method     ChildPhpauthAttempts|null findOneByIp(string $ip) Return the first ChildPhpauthAttempts filtered by the ip column
 * @method     ChildPhpauthAttempts|null findOneByExpiredate(string $expiredate) Return the first ChildPhpauthAttempts filtered by the expiredate column *

 * @method     ChildPhpauthAttempts requirePk($key, ConnectionInterface $con = null) Return the ChildPhpauthAttempts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthAttempts requireOne(ConnectionInterface $con = null) Return the first ChildPhpauthAttempts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthAttempts requireOneById(int $id) Return the first ChildPhpauthAttempts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthAttempts requireOneByIp(string $ip) Return the first ChildPhpauthAttempts filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthAttempts requireOneByExpiredate(string $expiredate) Return the first ChildPhpauthAttempts filtered by the expiredate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthAttempts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhpauthAttempts objects based on current ModelCriteria
 * @method     ChildPhpauthAttempts[]|ObjectCollection findById(int $id) Return ChildPhpauthAttempts objects filtered by the id column
 * @method     ChildPhpauthAttempts[]|ObjectCollection findByIp(string $ip) Return ChildPhpauthAttempts objects filtered by the ip column
 * @method     ChildPhpauthAttempts[]|ObjectCollection findByExpiredate(string $expiredate) Return ChildPhpauthAttempts objects filtered by the expiredate column
 * @method     ChildPhpauthAttempts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhpauthAttemptsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\PhpauthAttemptsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\PhpauthAttempts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhpauthAttemptsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhpauthAttemptsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhpauthAttemptsQuery) {
            return $criteria;
        }
        $query = new ChildPhpauthAttemptsQuery();
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
     * @return ChildPhpauthAttempts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhpauthAttemptsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhpauthAttemptsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPhpauthAttempts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ip, expiredate FROM phpauth_attempts WHERE id = :p0';
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
            /** @var ChildPhpauthAttempts $obj */
            $obj = new ChildPhpauthAttempts();
            $obj->hydrate($row);
            PhpauthAttemptsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPhpauthAttempts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthAttemptsTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the expiredate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredate('2011-03-14'); // WHERE expiredate = '2011-03-14'
     * $query->filterByExpiredate('now'); // WHERE expiredate = '2011-03-14'
     * $query->filterByExpiredate(array('max' => 'yesterday')); // WHERE expiredate > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function filterByExpiredate($expiredate = null, $comparison = null)
    {
        if (is_array($expiredate)) {
            $useMinMax = false;
            if (isset($expiredate['min'])) {
                $this->addUsingAlias(PhpauthAttemptsTableMap::COL_EXPIREDATE, $expiredate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredate['max'])) {
                $this->addUsingAlias(PhpauthAttemptsTableMap::COL_EXPIREDATE, $expiredate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthAttemptsTableMap::COL_EXPIREDATE, $expiredate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhpauthAttempts $phpauthAttempts Object to remove from the list of results
     *
     * @return $this|ChildPhpauthAttemptsQuery The current query, for fluid interface
     */
    public function prune($phpauthAttempts = null)
    {
        if ($phpauthAttempts) {
            $this->addUsingAlias(PhpauthAttemptsTableMap::COL_ID, $phpauthAttempts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the phpauth_attempts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthAttemptsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhpauthAttemptsTableMap::clearInstancePool();
            PhpauthAttemptsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthAttemptsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhpauthAttemptsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhpauthAttemptsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhpauthAttemptsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhpauthAttemptsQuery
