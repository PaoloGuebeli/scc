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
use scc\scc\PhpauthSessions as ChildPhpauthSessions;
use scc\scc\PhpauthSessionsQuery as ChildPhpauthSessionsQuery;
use scc\scc\Map\PhpauthSessionsTableMap;

/**
 * Base class that represents a query for the 'phpauth_sessions' table.
 *
 *
 *
 * @method     ChildPhpauthSessionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPhpauthSessionsQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildPhpauthSessionsQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method     ChildPhpauthSessionsQuery orderByExpiredate($order = Criteria::ASC) Order by the expiredate column
 * @method     ChildPhpauthSessionsQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildPhpauthSessionsQuery orderByAgent($order = Criteria::ASC) Order by the agent column
 * @method     ChildPhpauthSessionsQuery orderByCookieCrc($order = Criteria::ASC) Order by the cookie_crc column
 *
 * @method     ChildPhpauthSessionsQuery groupById() Group by the id column
 * @method     ChildPhpauthSessionsQuery groupByUid() Group by the uid column
 * @method     ChildPhpauthSessionsQuery groupByHash() Group by the hash column
 * @method     ChildPhpauthSessionsQuery groupByExpiredate() Group by the expiredate column
 * @method     ChildPhpauthSessionsQuery groupByIp() Group by the ip column
 * @method     ChildPhpauthSessionsQuery groupByAgent() Group by the agent column
 * @method     ChildPhpauthSessionsQuery groupByCookieCrc() Group by the cookie_crc column
 *
 * @method     ChildPhpauthSessionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhpauthSessionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhpauthSessionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhpauthSessionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhpauthSessionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhpauthSessionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhpauthSessions|null findOne(ConnectionInterface $con = null) Return the first ChildPhpauthSessions matching the query
 * @method     ChildPhpauthSessions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhpauthSessions matching the query, or a new ChildPhpauthSessions object populated from the query conditions when no match is found
 *
 * @method     ChildPhpauthSessions|null findOneById(int $id) Return the first ChildPhpauthSessions filtered by the id column
 * @method     ChildPhpauthSessions|null findOneByUid(int $uid) Return the first ChildPhpauthSessions filtered by the uid column
 * @method     ChildPhpauthSessions|null findOneByHash(string $hash) Return the first ChildPhpauthSessions filtered by the hash column
 * @method     ChildPhpauthSessions|null findOneByExpiredate(string $expiredate) Return the first ChildPhpauthSessions filtered by the expiredate column
 * @method     ChildPhpauthSessions|null findOneByIp(string $ip) Return the first ChildPhpauthSessions filtered by the ip column
 * @method     ChildPhpauthSessions|null findOneByAgent(string $agent) Return the first ChildPhpauthSessions filtered by the agent column
 * @method     ChildPhpauthSessions|null findOneByCookieCrc(string $cookie_crc) Return the first ChildPhpauthSessions filtered by the cookie_crc column *

 * @method     ChildPhpauthSessions requirePk($key, ConnectionInterface $con = null) Return the ChildPhpauthSessions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOne(ConnectionInterface $con = null) Return the first ChildPhpauthSessions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthSessions requireOneById(int $id) Return the first ChildPhpauthSessions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByUid(int $uid) Return the first ChildPhpauthSessions filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByHash(string $hash) Return the first ChildPhpauthSessions filtered by the hash column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByExpiredate(string $expiredate) Return the first ChildPhpauthSessions filtered by the expiredate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByIp(string $ip) Return the first ChildPhpauthSessions filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByAgent(string $agent) Return the first ChildPhpauthSessions filtered by the agent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthSessions requireOneByCookieCrc(string $cookie_crc) Return the first ChildPhpauthSessions filtered by the cookie_crc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthSessions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhpauthSessions objects based on current ModelCriteria
 * @method     ChildPhpauthSessions[]|ObjectCollection findById(int $id) Return ChildPhpauthSessions objects filtered by the id column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByUid(int $uid) Return ChildPhpauthSessions objects filtered by the uid column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByHash(string $hash) Return ChildPhpauthSessions objects filtered by the hash column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByExpiredate(string $expiredate) Return ChildPhpauthSessions objects filtered by the expiredate column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByIp(string $ip) Return ChildPhpauthSessions objects filtered by the ip column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByAgent(string $agent) Return ChildPhpauthSessions objects filtered by the agent column
 * @method     ChildPhpauthSessions[]|ObjectCollection findByCookieCrc(string $cookie_crc) Return ChildPhpauthSessions objects filtered by the cookie_crc column
 * @method     ChildPhpauthSessions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhpauthSessionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\PhpauthSessionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\PhpauthSessions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhpauthSessionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhpauthSessionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhpauthSessionsQuery) {
            return $criteria;
        }
        $query = new ChildPhpauthSessionsQuery();
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
     * @return ChildPhpauthSessions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhpauthSessionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhpauthSessionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPhpauthSessions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, uid, hash, expiredate, ip, agent, cookie_crc FROM phpauth_sessions WHERE id = :p0';
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
            /** @var ChildPhpauthSessions $obj */
            $obj = new ChildPhpauthSessions();
            $obj->hydrate($row);
            PhpauthSessionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPhpauthSessions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid(1234); // WHERE uid = 1234
     * $query->filterByUid(array(12, 34)); // WHERE uid IN (12, 34)
     * $query->filterByUid(array('min' => 12)); // WHERE uid > 12
     * </code>
     *
     * @param     mixed $uid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (is_array($uid)) {
            $useMinMax = false;
            if (isset($uid['min'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_UID, $uid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uid['max'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_UID, $uid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_UID, $uid, $comparison);
    }

    /**
     * Filter the query on the hash column
     *
     * Example usage:
     * <code>
     * $query->filterByHash('fooValue');   // WHERE hash = 'fooValue'
     * $query->filterByHash('%fooValue%', Criteria::LIKE); // WHERE hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hash The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByHash($hash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hash)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_HASH, $hash, $comparison);
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
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByExpiredate($expiredate = null, $comparison = null)
    {
        if (is_array($expiredate)) {
            $useMinMax = false;
            if (isset($expiredate['min'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_EXPIREDATE, $expiredate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredate['max'])) {
                $this->addUsingAlias(PhpauthSessionsTableMap::COL_EXPIREDATE, $expiredate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_EXPIREDATE, $expiredate, $comparison);
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
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_IP, $ip, $comparison);
    }

    /**
     * Filter the query on the agent column
     *
     * Example usage:
     * <code>
     * $query->filterByAgent('fooValue');   // WHERE agent = 'fooValue'
     * $query->filterByAgent('%fooValue%', Criteria::LIKE); // WHERE agent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $agent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByAgent($agent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($agent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_AGENT, $agent, $comparison);
    }

    /**
     * Filter the query on the cookie_crc column
     *
     * Example usage:
     * <code>
     * $query->filterByCookieCrc('fooValue');   // WHERE cookie_crc = 'fooValue'
     * $query->filterByCookieCrc('%fooValue%', Criteria::LIKE); // WHERE cookie_crc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cookieCrc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function filterByCookieCrc($cookieCrc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cookieCrc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthSessionsTableMap::COL_COOKIE_CRC, $cookieCrc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhpauthSessions $phpauthSessions Object to remove from the list of results
     *
     * @return $this|ChildPhpauthSessionsQuery The current query, for fluid interface
     */
    public function prune($phpauthSessions = null)
    {
        if ($phpauthSessions) {
            $this->addUsingAlias(PhpauthSessionsTableMap::COL_ID, $phpauthSessions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the phpauth_sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthSessionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhpauthSessionsTableMap::clearInstancePool();
            PhpauthSessionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthSessionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhpauthSessionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhpauthSessionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhpauthSessionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhpauthSessionsQuery
