<?php


class Team extends Db_object
{
    protected static $db_table = 'team';
    protected static $db_table_fields = array('first_name', 'last_image' , 'service_given');
    public $team_id;
    public $first_name;
    public $last_name;
    public $image;
    public $service_given;



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


    public static function deletemember($team_id) {
        return self::find_this_query("DELETE FROM team WHERE team_id = $team_id");
    }

    public static function limited_names() {
        return self::find_this_query("SELECT * FROM team LIMIT 6");
    }
}
