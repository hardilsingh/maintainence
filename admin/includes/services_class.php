<?php


//conatins methods and properties for the services
class Services extends Db_object
{

    protected static $db_table = "services";
    protected static $db_table_fields = array('service_id', 'service_name' , 'image' , 'text');
    public $service_id;
    public $service_name;
    public $image;
    public $text;


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

    //select name of services from the request type id
    public static function requestName($request_id)
    {
        $sql = self::find_this_query("SELECT service_name FROM services WHERE service_id = $request_id");
        return !empty($sql) ? array_shift($sql) : false;
    }



}
