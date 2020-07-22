<?php

namespace scc\scc\Base;

use \Exception;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use scc\scc\PhpauthConfig as ChildPhpauthConfig;
use scc\scc\PhpauthConfigQuery as ChildPhpauthConfigQuery;
use scc\scc\Map\PhpauthConfigTableMap;

/**
 * Base class that represents a query for the 'phpauth_config' table.
 *
 *
 *
 * @method     ChildPhpauthConfigQuery orderBySetting($order = Criteria::ASC) Order by the setting column
 * @method     ChildPhpauthConfigQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ChildPhpauthConfigQuery groupBySetting() Group by the setting column
 * @method     ChildPhpauthConfigQuery groupByValue() Group by the value column
 *
 * @method     ChildPhpauthConfigQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhpauthConfigQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhpauthConfigQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhpauthConfigQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhpauthConfigQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhpauthConfigQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhpauthConfig findOne(ConnectionInterface $con = null) Return the first ChildPhpauthConfig matching the query
 * @method     ChildPhpauthConfig findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhpauthConfig matching the query, or a new ChildPhpauthConfig object populated from the query conditions when no match is found
 *
 * @method     ChildPhpauthConfig findOneBySetting(string $setting) Return the first ChildPhpauthConfig filtered by the setting column
 * @method     ChildPhpauthConfig findOneByValue(string $value) Return the first ChildPhpauthConfig filtered by the value column *

 * @method     ChildPhpauthConfig requirePk($key, ConnectionInterface $con = null) Return the ChildPhpauthConfig by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthConfig requireOne(ConnectionInterface $con = null) Return the first ChildPhpauthConfig matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthConfig requireOneBySetting(string $setting) Return the first ChildPhpauthConfig filtered by the setting column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhpauthConfig requireOneByValue(string $value) Return the first ChildPhpauthConfig filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhpauthConfig[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhpauthConfig objects based on current ModelCriteria
 * @method     ChildPhpauthConfig[]|ObjectCollection findBySetting(string $setting) Return ChildPhpauthConfig objects filtered by the setting column
 * @method     ChildPhpauthConfig[]|ObjectCollection findByValue(string $value) Return ChildPhpauthConfig objects filtered by the value column
 * @method     ChildPhpauthConfig[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhpauthConfigQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\PhpauthConfigQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\PhpauthConfig', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhpauthConfigQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhpauthConfigQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhpauthConfigQuery) {
            return $criteria;
        }
        $query = new ChildPhpauthConfigQuery();
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
     * @return ChildPhpauthConfig|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The PhpauthConfig object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The PhpauthConfig object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPhpauthConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The PhpauthConfig object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhpauthConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The PhpauthConfig object has no primary key');
    }

    /**
     * Filter the query on the setting column
     *
     * Example usage:
     * <code>
     * $query->filterBySetting('fooValue');   // WHERE setting = 'fooValue'
     * $query->filterBySetting('%fooValue%', Criteria::LIKE); // WHERE setting LIKE '%fooValue%'
     * </code>
     *
     * @param     string $setting The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthConfigQuery The current query, for fluid interface
     */
    public function filterBySetting($setting = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($setting)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthConfigTableMap::COL_SETTING, $setting, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%', Criteria::LIKE); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhpauthConfigQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhpauthConfigTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhpauthConfig $phpauthConfig Object to remove from the list of results
     *
     * @return $this|ChildPhpauthConfigQuery The current query, for fluid interface
     */
    public function prune($phpauthConfig = null)
    {
        if ($phpauthConfig) {
            throw new LogicException('PhpauthConfig object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the phpauth_config table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthConfigTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhpauthConfigTableMap::clearInstancePool();
            PhpauthConfigTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PhpauthConfigTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhpauthConfigTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhpauthConfigTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhpauthConfigTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhpauthConfigQuery
