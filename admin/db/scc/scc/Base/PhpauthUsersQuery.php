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
use scc\scc\PhpauthUsers as ChildPhpauthUsers;
use scc\scc\PhpauthUsersQuery as ChildPhpauthUsersQuery;
use scc\scc\Map\PhpauthUsersTableMap;

/**
 * Base class that represents a query for the 'phpauth_users' table.
 *
 *
 *
 * @method     ChildPhpauthUsersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPhpauthUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildPhpauthUsersQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildPhpauthUsersQuery orderBySurname($order = Criteria::ASC) Order by the surname column
 * @method     ChildPhpauthUsersQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildPhpauthUsersQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildPhpauthUsersQuery orderByBirthyear($order = Criteria::ASC) Order by the birthyear column
 * @method     ChildPhpauthUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildPhpauthUsersQuery orderByIsactive($order = Criteria::ASC) Order by the isactive column
 * @method     ChildPhpauthUsersQuery orderByDt($order = Criteria::ASC) Order by the dt column
 *
 * @method     ChildPhpauthUsersQuery groupById() Group by the id column
 * @method     ChildPhpauthUsersQuery groupByEmail() Group by the email column
 * @method     ChildPhpauthUsersQuery groupByName() Group by the name column
 * @method     ChildPhpauthUsersQuery groupBySurname() Group by the surname column
 * @method     ChildPhpauthUsersQuery groupByPhone() Group by the phone column
 * @method     ChildPhpauthUsersQuery groupByLevel() Group by the level column
 * @method     ChildPhpauthUsersQuery groupByBirthyear() Group by the birthyear column
 * @method     ChildPhpauthUsersQuery groupByPassword() Group by the password column
 * @method     ChildPhpauthUsersQuery groupByIsactive() Group by the isactive column
 * @method     ChildPhpauthUsersQuery groupByDt() Group by the dt column
 *
 * @method     ChildPhpauthUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhpauthUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhpauthUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhpauthUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhpauthUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhpauthUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhpauthUsers|null findOne(ConnectionInterface $con = null) Return the first ChildPhpauthUsers matching the query
 * @method     ChildPhpauthUsers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhpauthUsers matching the query, or a new ChildPhpauthUsers object populated from the query conditions when no match is found
 *
 * @method     ChildPhpauthUsers|null findOneById(int $id) Return the first ChildPhpauthUsers filtered by the id column
 * @method     ChildPhpauthUsers|null findOneByEmail(string $email) Return the first ChildPhpauthUsers filtered by the email column
 * @method     ChildPhpauthUsers|null findOneByName(string $name) Return the first ChildPhpauthUsers filtered by the name column
 * @method     ChildPhpauthUsers|null findOneBySurname(string $surname) Return the first ChildPhpauthUsers filtered by the surname column
 * @method     ChildPhpauthUsers|null findOneByPhone(string $phone) Return the first ChildPhpauthUsers filtered by the phone column
 * @method     ChildPhpauthUsers|null findOneByLevel(int $level) Return the first ChildPhpauthUsers filtered by the level column
 * @method     ChildPhpauthUsers|null findOneByBirthyear(int $birthyear) Return the first ChildPhpauthUsers filtered by the birthyear column
 * @method     ChildPhpauthUsers|null findOneByPassword(string $password) Return the first ChildPhpauthUsers filtered by the password column
 * @method     ChildPhpauthUsers|null findOneByIsactive(boolean $isactive) Return the first ChildPhpauthUsers filtered by the isactive column
 * @method     ChildPhpauthUsers|null findOneByDt(string $dt) Return the first ChildPhpauthUsers filtered by the dt column *

 * @method     ChildPhpauthUsers requirePk($key, ConnectionInterface $con = null) Return the ChildPhpauthUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOne(ConnectionInterface $con = null) Return the first ChildPhpauthUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthUsers requireOneById(int $id) Return the first ChildPhpauthUsers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByEmail(string $email) Return the first ChildPhpauthUsers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByName(string $name) Return the first ChildPhpauthUsers filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneBySurname(string $surname) Return the first ChildPhpauthUsers filtered by the surname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByPhone(string $phone) Return the first ChildPhpauthUsers filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByLevel(int $level) Return the first ChildPhpauthUsers filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByBirthyear(int $birthyear) Return the first ChildPhpauthUsers filtered by the birthyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByPassword(string $password) Return the first ChildPhpauthUsers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByIsactive(boolean $isactive) Return the first ChildPhpauthUsers filtered by the isactive column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthUsers requireOneByDt(string $dt) Return the first ChildPhpauthUsers filtered by the dt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthUsers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhpauthUsers objects based on current ModelCriteria
 * @method     ChildPhpauthUsers[]|ObjectCollection findById(int $id) Return ChildPhpauthUsers objects filtered by the id column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByEmail(string $email) Return ChildPhpauthUsers objects filtered by the email column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByName(string $name) Return ChildPhpauthUsers objects filtered by the name column
 * @method     ChildPhpauthUsers[]|ObjectCollection findBySurname(string $surname) Return ChildPhpauthUsers objects filtered by the surname column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByPhone(string $phone) Return ChildPhpauthUsers objects filtered by the phone column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByLevel(int $level) Return ChildPhpauthUsers objects filtered by the level column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByBirthyear(int $birthyear) Return ChildPhpauthUsers objects filtered by the birthyear column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByPassword(string $password) Return ChildPhpauthUsers objects filtered by the password column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByIsactive(boolean $isactive) Return ChildPhpauthUsers objects filtered by the isactive column
 * @method     ChildPhpauthUsers[]|ObjectCollection findByDt(string $dt) Return ChildPhpauthUsers objects filtered by the dt column
 * @method     ChildPhpauthUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhpauthUsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\PhpauthUsersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\PhpauthUsers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhpauthUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhpauthUsersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhpauthUsersQuery) {
            return $criteria;
        }
        $query = new ChildPhpauthUsersQuery();
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
     * @return ChildPhpauthUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhpauthUsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhpauthUsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPhpauthUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, email, name, surname, phone, level, birthyear, password, isactive, dt FROM phpauth_users WHERE id = :p0';
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
            /** @var ChildPhpauthUsers $obj */
            $obj = new ChildPhpauthUsers();
            $obj->hydrate($row);
            PhpauthUsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPhpauthUsers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the surname column
     *
     * Example usage:
     * <code>
     * $query->filterBySurname('fooValue');   // WHERE surname = 'fooValue'
     * $query->filterBySurname('%fooValue%', Criteria::LIKE); // WHERE surname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $surname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterBySurname($surname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($surname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_SURNAME, $surname, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the birthyear column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthyear(1234); // WHERE birthyear = 1234
     * $query->filterByBirthyear(array(12, 34)); // WHERE birthyear IN (12, 34)
     * $query->filterByBirthyear(array('min' => 12)); // WHERE birthyear > 12
     * </code>
     *
     * @param     mixed $birthyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByBirthyear($birthyear = null, $comparison = null)
    {
        if (is_array($birthyear)) {
            $useMinMax = false;
            if (isset($birthyear['min'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_BIRTHYEAR, $birthyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthyear['max'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_BIRTHYEAR, $birthyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_BIRTHYEAR, $birthyear, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the isactive column
     *
     * Example usage:
     * <code>
     * $query->filterByIsactive(true); // WHERE isactive = true
     * $query->filterByIsactive('yes'); // WHERE isactive = true
     * </code>
     *
     * @param     boolean|string $isactive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByIsactive($isactive = null, $comparison = null)
    {
        if (is_string($isactive)) {
            $isactive = in_array(strtolower($isactive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_ISACTIVE, $isactive, $comparison);
    }

    /**
     * Filter the query on the dt column
     *
     * Example usage:
     * <code>
     * $query->filterByDt('2011-03-14'); // WHERE dt = '2011-03-14'
     * $query->filterByDt('now'); // WHERE dt = '2011-03-14'
     * $query->filterByDt(array('max' => 'yesterday')); // WHERE dt > '2011-03-13'
     * </code>
     *
     * @param     mixed $dt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function filterByDt($dt = null, $comparison = null)
    {
        if (is_array($dt)) {
            $useMinMax = false;
            if (isset($dt['min'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_DT, $dt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dt['max'])) {
                $this->addUsingAlias(PhpauthUsersTableMap::COL_DT, $dt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthUsersTableMap::COL_DT, $dt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhpauthUsers $phpauthUsers Object to remove from the list of results
     *
     * @return $this|ChildPhpauthUsersQuery The current query, for fluid interface
     */
    public function prune($phpauthUsers = null)
    {
        if ($phpauthUsers) {
            $this->addUsingAlias(PhpauthUsersTableMap::COL_ID, $phpauthUsers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the phpauth_users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthUsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhpauthUsersTableMap::clearInstancePool();
            PhpauthUsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthUsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhpauthUsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhpauthUsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhpauthUsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhpauthUsersQuery
