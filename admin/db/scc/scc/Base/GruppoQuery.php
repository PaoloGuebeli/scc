<?php

namespace scc\scc\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use scc\scc\Gruppo as ChildGruppo;
use scc\scc\GruppoQuery as ChildGruppoQuery;
use scc\scc\Map\GruppoTableMap;

/**
 * Base class that represents a query for the 'gruppo' table.
 *
 *
 *
 * @method     ChildGruppoQuery orderById($order = Criteria::ASC) Order by the Id column
 * @method     ChildGruppoQuery orderByCategoria($order = Criteria::ASC) Order by the Categoria column
 * @method     ChildGruppoQuery orderByLivello($order = Criteria::ASC) Order by the Livello column
 *
 * @method     ChildGruppoQuery groupById() Group by the Id column
 * @method     ChildGruppoQuery groupByCategoria() Group by the Categoria column
 * @method     ChildGruppoQuery groupByLivello() Group by the Livello column
 *
 * @method     ChildGruppoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGruppoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGruppoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGruppoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGruppoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGruppoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGruppoQuery leftJoinPartecipa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Partecipa relation
 * @method     ChildGruppoQuery rightJoinPartecipa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Partecipa relation
 * @method     ChildGruppoQuery innerJoinPartecipa($relationAlias = null) Adds a INNER JOIN clause to the query using the Partecipa relation
 *
 * @method     ChildGruppoQuery joinWithPartecipa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Partecipa relation
 *
 * @method     ChildGruppoQuery leftJoinWithPartecipa() Adds a LEFT JOIN clause and with to the query using the Partecipa relation
 * @method     ChildGruppoQuery rightJoinWithPartecipa() Adds a RIGHT JOIN clause and with to the query using the Partecipa relation
 * @method     ChildGruppoQuery innerJoinWithPartecipa() Adds a INNER JOIN clause and with to the query using the Partecipa relation
 *
 * @method     \scc\scc\PartecipaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGruppo|null findOne(ConnectionInterface $con = null) Return the first ChildGruppo matching the query
 * @method     ChildGruppo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGruppo matching the query, or a new ChildGruppo object populated from the query conditions when no match is found
 *
 * @method     ChildGruppo|null findOneById(int $Id) Return the first ChildGruppo filtered by the Id column
 * @method     ChildGruppo|null findOneByCategoria(string $Categoria) Return the first ChildGruppo filtered by the Categoria column
 * @method     ChildGruppo|null findOneByLivello(string $Livello) Return the first ChildGruppo filtered by the Livello column *

 * @method     ChildGruppo requirePk($key, ConnectionInterface $con = null) Return the ChildGruppo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGruppo requireOne(ConnectionInterface $con = null) Return the first ChildGruppo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGruppo requireOneById(int $Id) Return the first ChildGruppo filtered by the Id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGruppo requireOneByCategoria(string $Categoria) Return the first ChildGruppo filtered by the Categoria column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGruppo requireOneByLivello(string $Livello) Return the first ChildGruppo filtered by the Livello column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGruppo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGruppo objects based on current ModelCriteria
 * @method     ChildGruppo[]|ObjectCollection findById(int $Id) Return ChildGruppo objects filtered by the Id column
 * @method     ChildGruppo[]|ObjectCollection findByCategoria(string $Categoria) Return ChildGruppo objects filtered by the Categoria column
 * @method     ChildGruppo[]|ObjectCollection findByLivello(string $Livello) Return ChildGruppo objects filtered by the Livello column
 * @method     ChildGruppo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GruppoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\GruppoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\Gruppo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGruppoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGruppoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGruppoQuery) {
            return $criteria;
        }
        $query = new ChildGruppoQuery();
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
     * @return ChildGruppo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GruppoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GruppoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildGruppo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Id, Categoria, Livello FROM gruppo WHERE Id = :p0';
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
            /** @var ChildGruppo $obj */
            $obj = new ChildGruppo();
            $obj->hydrate($row);
            GruppoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildGruppo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GruppoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GruppoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GruppoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GruppoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GruppoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Categoria column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoria('fooValue');   // WHERE Categoria = 'fooValue'
     * $query->filterByCategoria('%fooValue%', Criteria::LIKE); // WHERE Categoria LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoria The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function filterByCategoria($categoria = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoria)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GruppoTableMap::COL_CATEGORIA, $categoria, $comparison);
    }

    /**
     * Filter the query on the Livello column
     *
     * Example usage:
     * <code>
     * $query->filterByLivello('fooValue');   // WHERE Livello = 'fooValue'
     * $query->filterByLivello('%fooValue%', Criteria::LIKE); // WHERE Livello LIKE '%fooValue%'
     * </code>
     *
     * @param     string $livello The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function filterByLivello($livello = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($livello)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GruppoTableMap::COL_LIVELLO, $livello, $comparison);
    }

    /**
     * Filter the query by a related \scc\scc\Partecipa object
     *
     * @param \scc\scc\Partecipa|ObjectCollection $partecipa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildGruppoQuery The current query, for fluid interface
     */
    public function filterByPartecipa($partecipa, $comparison = null)
    {
        if ($partecipa instanceof \scc\scc\Partecipa) {
            return $this
                ->addUsingAlias(GruppoTableMap::COL_ID, $partecipa->getIdGruppo(), $comparison);
        } elseif ($partecipa instanceof ObjectCollection) {
            return $this
                ->usePartecipaQuery()
                ->filterByPrimaryKeys($partecipa->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPartecipa() only accepts arguments of type \scc\scc\Partecipa or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Partecipa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function joinPartecipa($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Partecipa');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Partecipa');
        }

        return $this;
    }

    /**
     * Use the Partecipa relation Partecipa object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \scc\scc\PartecipaQuery A secondary query class using the current class as primary query
     */
    public function usePartecipaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPartecipa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Partecipa', '\scc\scc\PartecipaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGruppo $gruppo Object to remove from the list of results
     *
     * @return $this|ChildGruppoQuery The current query, for fluid interface
     */
    public function prune($gruppo = null)
    {
        if ($gruppo) {
            $this->addUsingAlias(GruppoTableMap::COL_ID, $gruppo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the gruppo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GruppoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GruppoTableMap::clearInstancePool();
            GruppoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(GruppoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GruppoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GruppoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GruppoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GruppoQuery
