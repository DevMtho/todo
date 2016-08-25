<?php


/**
 * Base class that represents a query for the 'events' table.
 *
 *
 *
 * @method EventsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventsQuery orderByEventName($order = Criteria::ASC) Order by the event_name column
 * @method EventsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method EventsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method EventsQuery orderByVenueId($order = Criteria::ASC) Order by the venue_id column
 * @method EventsQuery orderBySponsorId($order = Criteria::ASC) Order by the sponsor_id column
 * @method EventsQuery orderByDrinkId($order = Criteria::ASC) Order by the drink_id column
 * @method EventsQuery orderByCreatorId($order = Criteria::ASC) Order by the creator_id column
 *
 * @method EventsQuery groupById() Group by the id column
 * @method EventsQuery groupByEventName() Group by the event_name column
 * @method EventsQuery groupByDescription() Group by the description column
 * @method EventsQuery groupByCreatedAt() Group by the created_at column
 * @method EventsQuery groupByVenueId() Group by the venue_id column
 * @method EventsQuery groupBySponsorId() Group by the sponsor_id column
 * @method EventsQuery groupByDrinkId() Group by the drink_id column
 * @method EventsQuery groupByCreatorId() Group by the creator_id column
 *
 * @method EventsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventsQuery leftJoinVenues($relationAlias = null) Adds a LEFT JOIN clause to the query using the Venues relation
 * @method EventsQuery rightJoinVenues($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Venues relation
 * @method EventsQuery innerJoinVenues($relationAlias = null) Adds a INNER JOIN clause to the query using the Venues relation
 *
 * @method EventsQuery leftJoinSponsors($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sponsors relation
 * @method EventsQuery rightJoinSponsors($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sponsors relation
 * @method EventsQuery innerJoinSponsors($relationAlias = null) Adds a INNER JOIN clause to the query using the Sponsors relation
 *
 * @method EventsQuery leftJoinDrinks($relationAlias = null) Adds a LEFT JOIN clause to the query using the Drinks relation
 * @method EventsQuery rightJoinDrinks($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Drinks relation
 * @method EventsQuery innerJoinDrinks($relationAlias = null) Adds a INNER JOIN clause to the query using the Drinks relation
 *
 * @method EventsQuery leftJoinCreators($relationAlias = null) Adds a LEFT JOIN clause to the query using the Creators relation
 * @method EventsQuery rightJoinCreators($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Creators relation
 * @method EventsQuery innerJoinCreators($relationAlias = null) Adds a INNER JOIN clause to the query using the Creators relation
 *
 * @method Events findOne(PropelPDO $con = null) Return the first Events matching the query
 * @method Events findOneOrCreate(PropelPDO $con = null) Return the first Events matching the query, or a new Events object populated from the query conditions when no match is found
 *
 * @method Events findOneByEventName(string $event_name) Return the first Events filtered by the event_name column
 * @method Events findOneByDescription(string $description) Return the first Events filtered by the description column
 * @method Events findOneByCreatedAt(string $created_at) Return the first Events filtered by the created_at column
 * @method Events findOneByVenueId(int $venue_id) Return the first Events filtered by the venue_id column
 * @method Events findOneBySponsorId(int $sponsor_id) Return the first Events filtered by the sponsor_id column
 * @method Events findOneByDrinkId(int $drink_id) Return the first Events filtered by the drink_id column
 * @method Events findOneByCreatorId(int $creator_id) Return the first Events filtered by the creator_id column
 *
 * @method array findById(int $id) Return Events objects filtered by the id column
 * @method array findByEventName(string $event_name) Return Events objects filtered by the event_name column
 * @method array findByDescription(string $description) Return Events objects filtered by the description column
 * @method array findByCreatedAt(string $created_at) Return Events objects filtered by the created_at column
 * @method array findByVenueId(int $venue_id) Return Events objects filtered by the venue_id column
 * @method array findBySponsorId(int $sponsor_id) Return Events objects filtered by the sponsor_id column
 * @method array findByDrinkId(int $drink_id) Return Events objects filtered by the drink_id column
 * @method array findByCreatorId(int $creator_id) Return Events objects filtered by the creator_id column
 *
 * @package    propel.generator.todo.om
 */
abstract class BaseEventsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'eventsdb', $modelName = 'Events', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventsQuery) {
            return $criteria;
        }
        $query = new EventsQuery();
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
     * @return   Events|Events[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Events A model object, or null if the key is not found
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
     * @return                 Events A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `event_name`, `description`, `created_at`, `venue_id`, `sponsor_id`, `drink_id`, `creator_id` FROM `events` WHERE `id` = :p0';
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
            $obj = new Events();
            $obj->hydrate($row);
            EventsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Events|Events[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Events[]|mixed the list of results, formatted by the current formatter
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
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventsPeer::ID, $keys, Criteria::IN);
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
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the event_name column
     *
     * Example usage:
     * <code>
     * $query->filterByEventName('fooValue');   // WHERE event_name = 'fooValue'
     * $query->filterByEventName('%fooValue%'); // WHERE event_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $eventName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByEventName($eventName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($eventName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $eventName)) {
                $eventName = str_replace('*', '%', $eventName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsPeer::EVENT_NAME, $eventName, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventsPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(EventsPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(EventsPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the venue_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVenueId(1234); // WHERE venue_id = 1234
     * $query->filterByVenueId(array(12, 34)); // WHERE venue_id IN (12, 34)
     * $query->filterByVenueId(array('min' => 12)); // WHERE venue_id >= 12
     * $query->filterByVenueId(array('max' => 12)); // WHERE venue_id <= 12
     * </code>
     *
     * @see       filterByVenues()
     *
     * @param     mixed $venueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByVenueId($venueId = null, $comparison = null)
    {
        if (is_array($venueId)) {
            $useMinMax = false;
            if (isset($venueId['min'])) {
                $this->addUsingAlias(EventsPeer::VENUE_ID, $venueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($venueId['max'])) {
                $this->addUsingAlias(EventsPeer::VENUE_ID, $venueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::VENUE_ID, $venueId, $comparison);
    }

    /**
     * Filter the query on the sponsor_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySponsorId(1234); // WHERE sponsor_id = 1234
     * $query->filterBySponsorId(array(12, 34)); // WHERE sponsor_id IN (12, 34)
     * $query->filterBySponsorId(array('min' => 12)); // WHERE sponsor_id >= 12
     * $query->filterBySponsorId(array('max' => 12)); // WHERE sponsor_id <= 12
     * </code>
     *
     * @see       filterBySponsors()
     *
     * @param     mixed $sponsorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterBySponsorId($sponsorId = null, $comparison = null)
    {
        if (is_array($sponsorId)) {
            $useMinMax = false;
            if (isset($sponsorId['min'])) {
                $this->addUsingAlias(EventsPeer::SPONSOR_ID, $sponsorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sponsorId['max'])) {
                $this->addUsingAlias(EventsPeer::SPONSOR_ID, $sponsorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::SPONSOR_ID, $sponsorId, $comparison);
    }

    /**
     * Filter the query on the drink_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDrinkId(1234); // WHERE drink_id = 1234
     * $query->filterByDrinkId(array(12, 34)); // WHERE drink_id IN (12, 34)
     * $query->filterByDrinkId(array('min' => 12)); // WHERE drink_id >= 12
     * $query->filterByDrinkId(array('max' => 12)); // WHERE drink_id <= 12
     * </code>
     *
     * @see       filterByDrinks()
     *
     * @param     mixed $drinkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByDrinkId($drinkId = null, $comparison = null)
    {
        if (is_array($drinkId)) {
            $useMinMax = false;
            if (isset($drinkId['min'])) {
                $this->addUsingAlias(EventsPeer::DRINK_ID, $drinkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($drinkId['max'])) {
                $this->addUsingAlias(EventsPeer::DRINK_ID, $drinkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::DRINK_ID, $drinkId, $comparison);
    }

    /**
     * Filter the query on the creator_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatorId(1234); // WHERE creator_id = 1234
     * $query->filterByCreatorId(array(12, 34)); // WHERE creator_id IN (12, 34)
     * $query->filterByCreatorId(array('min' => 12)); // WHERE creator_id >= 12
     * $query->filterByCreatorId(array('max' => 12)); // WHERE creator_id <= 12
     * </code>
     *
     * @see       filterByCreators()
     *
     * @param     mixed $creatorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function filterByCreatorId($creatorId = null, $comparison = null)
    {
        if (is_array($creatorId)) {
            $useMinMax = false;
            if (isset($creatorId['min'])) {
                $this->addUsingAlias(EventsPeer::CREATOR_ID, $creatorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creatorId['max'])) {
                $this->addUsingAlias(EventsPeer::CREATOR_ID, $creatorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventsPeer::CREATOR_ID, $creatorId, $comparison);
    }

    /**
     * Filter the query by a related Venues object
     *
     * @param   Venues|PropelObjectCollection $venues The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVenues($venues, $comparison = null)
    {
        if ($venues instanceof Venues) {
            return $this
                ->addUsingAlias(EventsPeer::VENUE_ID, $venues->getId(), $comparison);
        } elseif ($venues instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventsPeer::VENUE_ID, $venues->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByVenues() only accepts arguments of type Venues or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Venues relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function joinVenues($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Venues');

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
            $this->addJoinObject($join, 'Venues');
        }

        return $this;
    }

    /**
     * Use the Venues relation Venues object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   VenuesQuery A secondary query class using the current class as primary query
     */
    public function useVenuesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVenues($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Venues', 'VenuesQuery');
    }

    /**
     * Filter the query by a related Sponsors object
     *
     * @param   Sponsors|PropelObjectCollection $sponsors The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySponsors($sponsors, $comparison = null)
    {
        if ($sponsors instanceof Sponsors) {
            return $this
                ->addUsingAlias(EventsPeer::SPONSOR_ID, $sponsors->getId(), $comparison);
        } elseif ($sponsors instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventsPeer::SPONSOR_ID, $sponsors->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySponsors() only accepts arguments of type Sponsors or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sponsors relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function joinSponsors($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sponsors');

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
            $this->addJoinObject($join, 'Sponsors');
        }

        return $this;
    }

    /**
     * Use the Sponsors relation Sponsors object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SponsorsQuery A secondary query class using the current class as primary query
     */
    public function useSponsorsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSponsors($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sponsors', 'SponsorsQuery');
    }

    /**
     * Filter the query by a related Drinks object
     *
     * @param   Drinks|PropelObjectCollection $drinks The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDrinks($drinks, $comparison = null)
    {
        if ($drinks instanceof Drinks) {
            return $this
                ->addUsingAlias(EventsPeer::DRINK_ID, $drinks->getId(), $comparison);
        } elseif ($drinks instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventsPeer::DRINK_ID, $drinks->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDrinks() only accepts arguments of type Drinks or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Drinks relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function joinDrinks($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Drinks');

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
            $this->addJoinObject($join, 'Drinks');
        }

        return $this;
    }

    /**
     * Use the Drinks relation Drinks object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   DrinksQuery A secondary query class using the current class as primary query
     */
    public function useDrinksQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDrinks($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Drinks', 'DrinksQuery');
    }

    /**
     * Filter the query by a related Creators object
     *
     * @param   Creators|PropelObjectCollection $creators The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCreators($creators, $comparison = null)
    {
        if ($creators instanceof Creators) {
            return $this
                ->addUsingAlias(EventsPeer::CREATOR_ID, $creators->getId(), $comparison);
        } elseif ($creators instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventsPeer::CREATOR_ID, $creators->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCreators() only accepts arguments of type Creators or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Creators relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function joinCreators($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Creators');

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
            $this->addJoinObject($join, 'Creators');
        }

        return $this;
    }

    /**
     * Use the Creators relation Creators object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CreatorsQuery A secondary query class using the current class as primary query
     */
    public function useCreatorsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCreators($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Creators', 'CreatorsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Events $events Object to remove from the list of results
     *
     * @return EventsQuery The current query, for fluid interface
     */
    public function prune($events = null)
    {
        if ($events) {
            $this->addUsingAlias(EventsPeer::ID, $events->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
