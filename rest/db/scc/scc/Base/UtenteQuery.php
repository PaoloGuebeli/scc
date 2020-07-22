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
use scc\scc\Utente as ChildUtente;
use scc\scc\UtenteQuery as ChildUtenteQuery;
use scc\scc\Map\UtenteTableMap;

/**
 * Base class that represents a query for the 'utente' table.
 *
 *
 *
 * @method     ChildUtenteQuery orderByUsername($order = Criteria::ASC) Order by the Username column
 * @method     ChildUtenteQuery orderByNome($order = Criteria::ASC) Order by the Nome column
 * @method     ChildUtenteQuery orderByCognome($order = Criteria::ASC) Order by the Cognome column
 * @method     ChildUtenteQuery orderByTelefono($order = Criteria::ASC) Order by the Telefono column
 * @method     ChildUtenteQuery orderByGrado($order = Criteria::ASC) Order by the Grado column
 * @method     ChildUtenteQuery orderByAnnoNascita($order = Criteria::ASC) Order by the Anno_Nascita column
 * @method     ChildUtenteQuery orderByPass($order = Criteria::ASC) Order by the Pass column
 *
 * @method     ChildUtenteQuery groupByUsername() Group by the Username column
 * @method     ChildUtenteQuery groupByNome() Group by the Nome column
 * @method     ChildUtenteQuery groupByCognome() Group by the Cognome column
 * @method     ChildUtenteQuery groupByTelefono() Group by the Telefono column
 * @method     ChildUtenteQuery groupByGrado() Group by the Grado column
 * @method     ChildUtenteQuery groupByAnnoNascita() Group by the Anno_Nascita column
 * @method     ChildUtenteQuery groupByPass() Group by the Pass column
 *
 * @method     ChildUtenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUtenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUtenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUtenteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUtenteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUtenteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUtenteQuery leftJoinPartecipa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Partecipa relation
 * @method     ChildUtenteQuery rightJoinPartecipa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Partecipa relation
 * @method     ChildUtenteQuery innerJoinPartecipa($relationAlias = null) Adds a INNER JOIN clause to the query using the Partecipa relation
 *
 * @method     ChildUtenteQuery joinWithPartecipa($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Partecipa relation
 *
 * @method     ChildUtenteQuery leftJoinWithPartecipa() Adds a LEFT JOIN clause and with to the query using the Partecipa relation
 * @method     ChildUtenteQuery rightJoinWithPartecipa() Adds a RIGHT JOIN clause and with to the query using the Partecipa relation
 * @method     ChildUtenteQuery innerJoinWithPartecipa() Adds a INNER JOIN clause and with to the query using the Partecipa relation
 *
 * @method     \scc\scc\PartecipaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUtente findOne(ConnectionInterface $con = null) Return the first ChildUtente matching the query
 * @method     ChildUtente findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUtente matching the query, or a new ChildUtente object populated from the query conditions when no match is found
 *
 * @method     ChildUtente findOneByUsername(string $Username) Return the first ChildUtente filtered by the Username column
 * @method     ChildUtente findOneByNome(string $Nome) Return the first ChildUtente filtered by the Nome column
 * @method     ChildUtente findOneByCognome(string $Cognome) Return the first ChildUtente filtered by the Cognome column
 * @method     ChildUtente findOneByTelefono(string $Telefono) Return the first ChildUtente filtered by the Telefono column
 * @method     ChildUtente findOneByGrado(int $Grado) Return the first ChildUtente filtered by the Grado column
 * @method     ChildUtente findOneByAnnoNascita(int $Anno_Nascita) Return the first ChildUtente filtered by the Anno_Nascita column
 * @method     ChildUtente findOneByPass(string $Pass) Return the first ChildUtente filtered by the Pass column *

 * @method     ChildUtente requirePk($key, ConnectionInterface $con = null) Return the ChildUtente by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOne(ConnectionInterface $con = null) Return the first ChildUtente matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtente requireOneByUsername(string $Username) Return the first ChildUtente filtered by the Username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByNome(string $Nome) Return the first ChildUtente filtered by the Nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByCognome(string $Cognome) Return the first ChildUtente filtered by the Cognome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByTelefono(string $Telefono) Return the first ChildUtente filtered by the Telefono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByGrado(int $Grado) Return the first ChildUtente filtered by the Grado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByAnnoNascita(int $Anno_Nascita) Return the first ChildUtente filtered by the Anno_Nascita column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtente requireOneByPass(string $Pass) Return the first ChildUtente filtered by the Pass column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtente[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUtente objects based on current ModelCriteria
 * @method     ChildUtente[]|ObjectCollection findByUsername(string $Username) Return ChildUtente objects filtered by the Username column
 * @method     ChildUtente[]|ObjectCollection findByNome(string $Nome) Return ChildUtente objects filtered by the Nome column
 * @method     ChildUtente[]|ObjectCollection findByCognome(string $Cognome) Return ChildUtente objects filtered by the Cognome column
 * @method     ChildUtente[]|ObjectCollection findByTelefono(string $Telefono) Return ChildUtente objects filtered by the Telefono column
 * @method     ChildUtente[]|ObjectCollection findByGrado(int $Grado) Return ChildUtente objects filtered by the Grado column
 * @method     ChildUtente[]|ObjectCollection findByAnnoNascita(int $Anno_Nascita) Return ChildUtente objects filtered by the Anno_Nascita column
 * @method     ChildUtente[]|ObjectCollection findByPass(string $Pass) Return ChildUtente objects filtered by the Pass column
 * @method     ChildUtente[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UtenteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \scc\scc\Base\UtenteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\scc\\scc\\Utente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUtenteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUtenteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUtenteQuery) {
            return $criteria;
        }
        $query = new ChildUtenteQuery();
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
     * @return ChildUtente|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UtenteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UtenteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUtente A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Username, Nome, Cognome, Telefono, Grado, Anno_Nascita, Pass FROM utente WHERE Username = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUtente $obj */
            $obj = new ChildUtente();
            $obj->hydrate($row);
            UtenteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUtente|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UtenteTableMap::COL_USERNAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UtenteTableMap::COL_USERNAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE Username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE Username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the Nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE Nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE Nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the Cognome column
     *
     * Example usage:
     * <code>
     * $query->filterByCognome('fooValue');   // WHERE Cognome = 'fooValue'
     * $query->filterByCognome('%fooValue%', Criteria::LIKE); // WHERE Cognome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cognome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByCognome($cognome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cognome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_COGNOME, $cognome, $comparison);
    }

    /**
     * Filter the query on the Telefono column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefono('fooValue');   // WHERE Telefono = 'fooValue'
     * $query->filterByTelefono('%fooValue%', Criteria::LIKE); // WHERE Telefono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByTelefono($telefono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_TELEFONO, $telefono, $comparison);
    }

    /**
     * Filter the query on the Grado column
     *
     * Example usage:
     * <code>
     * $query->filterByGrado(1234); // WHERE Grado = 1234
     * $query->filterByGrado(array(12, 34)); // WHERE Grado IN (12, 34)
     * $query->filterByGrado(array('min' => 12)); // WHERE Grado > 12
     * </code>
     *
     * @param     mixed $grado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByGrado($grado = null, $comparison = null)
    {
        if (is_array($grado)) {
            $useMinMax = false;
            if (isset($grado['min'])) {
                $this->addUsingAlias(UtenteTableMap::COL_GRADO, $grado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($grado['max'])) {
                $this->addUsingAlias(UtenteTableMap::COL_GRADO, $grado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_GRADO, $grado, $comparison);
    }

    /**
     * Filter the query on the Anno_Nascita column
     *
     * Example usage:
     * <code>
     * $query->filterByAnnoNascita(1234); // WHERE Anno_Nascita = 1234
     * $query->filterByAnnoNascita(array(12, 34)); // WHERE Anno_Nascita IN (12, 34)
     * $query->filterByAnnoNascita(array('min' => 12)); // WHERE Anno_Nascita > 12
     * </code>
     *
     * @param     mixed $annoNascita The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByAnnoNascita($annoNascita = null, $comparison = null)
    {
        if (is_array($annoNascita)) {
            $useMinMax = false;
            if (isset($annoNascita['min'])) {
                $this->addUsingAlias(UtenteTableMap::COL_ANNO_NASCITA, $annoNascita['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($annoNascita['max'])) {
                $this->addUsingAlias(UtenteTableMap::COL_ANNO_NASCITA, $annoNascita['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_ANNO_NASCITA, $annoNascita, $comparison);
    }

    /**
     * Filter the query on the Pass column
     *
     * Example usage:
     * <code>
     * $query->filterByPass('fooValue');   // WHERE Pass = 'fooValue'
     * $query->filterByPass('%fooValue%', Criteria::LIKE); // WHERE Pass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByPass($pass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtenteTableMap::COL_PASS, $pass, $comparison);
    }

    /**
     * Filter the query by a related \scc\scc\Partecipa object
     *
     * @param \scc\scc\Partecipa|ObjectCollection $partecipa the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUtenteQuery The current query, for fluid interface
     */
    public function filterByPartecipa($partecipa, $comparison = null)
    {
        if ($partecipa instanceof \scc\scc\Partecipa) {
            return $this
                ->addUsingAlias(UtenteTableMap::COL_USERNAME, $partecipa->getIdUtente(), $comparison);
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
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function joinPartecipa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePartecipaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPartecipa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Partecipa', '\scc\scc\PartecipaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUtente $utente Object to remove from the list of results
     *
     * @return $this|ChildUtenteQuery The current query, for fluid interface
     */
    public function prune($utente = null)
    {
        if ($utente) {
            $this->addUsingAlias(UtenteTableMap::COL_USERNAME, $utente->getUsername(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the utente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtenteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UtenteTableMap::clearInstancePool();
            UtenteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UtenteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UtenteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UtenteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UtenteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UtenteQuery
