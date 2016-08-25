<?php



/**
 * This class defines the structure of the 'drinks' table.
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
class DrinksTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'todo.map.DrinksTableMap';

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
        $this->setName('drinks');
        $this->setPhpName('Drinks');
        $this->setClassname('Drinks');
        $this->setPackage('todo');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('drink_name', 'DrinkName', 'VARCHAR', true, 255, null);
        $this->addColumn('drink_type', 'DrinkType', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Events', 'Events', RelationMap::ONE_TO_MANY, array('id' => 'drink_id', ), null, null, 'Eventss');
    } // buildRelations()

} // DrinksTableMap
