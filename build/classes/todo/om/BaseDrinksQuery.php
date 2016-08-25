<?php


/**
 * Base class that represents a query for the 'drinks' table.
 *
 *
 *
 * @method DrinksQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DrinksQuery orderByDrinkName($order = Criteria::ASC) Order by the drink_name column
 * @method DrinksQuery orderByDrinkType($order = Criteria::ASC) Order by the drink_type column
 *
 * @method DrinksQuery groupById() Group by the id column
 * @method DrinksQuery groupByDrinkName() Group by the drink_name column
 * @method DrinksQuery groupByDrinkType() Group by the drink_type column
 *
 * @method DrinksQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DrinksQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DrinksQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DrinksQuery leftJoinEvents($relationAlias = null) Adds a LEFT JOIN clause to the query using the Events relation
 * @method DrinksQuery rightJoinEvents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Events relation
 * @method DrinksQuery innerJoinEvents($relationAlias = null) Adds a INNER JOIN clause to the query using the Events relation
 *
 * @method Drinks findOne(PropelPDO $con = null) Return the first Drinks matching the query
 * @method Drinks findOneOrCreate(PropelPDO $con = null) Return the first Drinks matching the query, or a new Drinks object populated from the query conditions when no match is found
 *
 * @method Drinks findOneByDrinkName(string $drink_name) Return the first Drinks filtered by the drink_name column
 * @method Drinks findOneByDrinkType(string $drink_type) Return the first Drinks filtered by the drink_type column
 *
 * @method array findById(int $id) Return Drinks objects filtered by the id column
 * @method array findByDrinkName(string $drink_name) Return Drinks objects filtered by the drink_name column
 * @method array findByDrinkType(string $drink_type) Return Drinks objects filtered by the drink_type column
 *
 * @package    propel.generator.todo.om
 */
abstract class BaseDrinksQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDrinksQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'eventsdb', $modelName = 'Drinks', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DrinksQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DrinksQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DrinksQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DrinksQuery) {
            return $criteria;
        }
        $query = new DrinksQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Drinks|Drinks[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DrinksPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DrinksPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Drinks A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Drinks A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `drink_name`, `drink_type` FROM `drinks` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Drinks();
            $obj->hydrate($row);
            DrinksPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Drinks|Drinks[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Drinks[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DrinksPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DrinksPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DrinksPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DrinksPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DrinksPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the drink_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDrinkName('fooValue');   // WHERE drink_name = 'fooValue'
     * $query->filterByDrinkName('%fooValue%'); // WHERE drink_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $drinkName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function filterByDrinkName($drinkName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($drinkName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $drinkName)) {
                $drinkName = str_replace('*', '%', $drinkName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DrinksPeer::DRINK_NAME, $drinkName, $comparison);
    }

    /**
     * Filter the query on the drink_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDrinkType('fooValue');   // WHERE drink_type = 'fooValue'
     * $query->filterByDrinkType('%fooValue%'); // WHERE drink_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $drinkType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function filterByDrinkType($drinkType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($drinkType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $drinkType)) {
                $drinkType = str_replace('*', '%', $drinkType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DrinksPeer::DRINK_TYPE, $drinkType, $comparison);
    }

    /**
     * Filter the query by a related Events object
     *
     * @param   Events|PropelObjectCollection $events  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DrinksQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEvents($events, $comparison = null)
    {
        if ($events instanceof Events) {
            return $this
                ->addUsingAlias(DrinksPeer::ID, $events->getDrinkId(), $comparison);
        } elseif ($events instanceof PropelObjectCollection) {
            return $this
                ->useEventsQuery()
                ->filterByPrimaryKeys($events->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvents() only accepts arguments of type Events or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Events relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function joinEvents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Events');

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
            $this->addJoinObject($join, 'Events');
        }

        return $this;
    }

    /**
     * Use the Events relation Events object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EventsQuery A secondary query class using the current class as primary query
     */
    public function useEventsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Events', 'EventsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Drinks $drinks Object to remove from the list of results
     *
     * @return DrinksQuery The current query, for fluid interface
     */
    public function prune($drinks = null)
    {
        if ($drinks) {
            $this->addUsingAlias(DrinksPeer::ID, $drinks->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
