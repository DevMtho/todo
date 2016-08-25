<?php



/**
 * This class defines the structure of the 'events' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.todo.map
 */
class EventsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'todo.map.EventsTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('events');
        $this->setPhpName('Events');
        $this->setClassname('Events');
        $this->setPackage('todo');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('event_name', 'EventName', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addForeignKey('venue_id', 'VenueId', 'INTEGER', 'venues', 'id', true, null, null);
        $this->addForeignKey('sponsor_id', 'SponsorId', 'INTEGER', 'sponsors', 'id', true, null, null);
        $this->addForeignKey('drink_id', 'DrinkId', 'INTEGER', 'drinks', 'id', true, null, null);
        $this->addForeignKey('creator_id', 'CreatorId', 'INTEGER', 'creators', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Venues', 'Venues', RelationMap::MANY_TO_ONE, array('venue_id' => 'id', ), null, null);
        $this->addRelation('Sponsors', 'Sponsors', RelationMap::MANY_TO_ONE, array('sponsor_id' => 'id', ), null, null);
        $this->addRelation('Drinks', 'Drinks', RelationMap::MANY_TO_ONE, array('drink_id' => 'id', ), null, null);
        $this->addRelation('Creators', 'Creators', RelationMap::MANY_TO_ONE, array('creator_id' => 'id', ), null, null);
    } // buildRelations()

} // EventsTableMap
