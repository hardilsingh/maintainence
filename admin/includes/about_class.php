<?php


class About extends Db_object
{
    protected static $db_table = 'about';
    protected static $db_table_fields = array('id', 'p1' , 'p2' , 'p3');
    public $user_id;
    public $p1;
    public $p2;
    public $p3;



    //method used to assign the valued bought from from the database to object properties
    protected function properties()
    {
        // return get_object_vars($this);

        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    //used to clean all the properties
    protected function cleanProperties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escapeString($value);
        }

        return $clean_properties;
    }

    


    
} 
