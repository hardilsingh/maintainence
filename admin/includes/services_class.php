<?php


//conatins methods and properties for the services
class Services extends Db_object
{

    //name of the table in database
    protected static $db_table = "services";
    //name of the fields of table in database
    protected static $db_table_fields = array('service_id', 'service_name');
    //properties with same name as fields in the databse table
    public $service_id;
    public $service_name;

    //select name of services from the request type id
    public static function requestName($request_id)
    {
        $sql = self::find_this_query("SELECT * FROM services WHERE service_id = $request_id");
        return !empty($sql) ? array_shift($sql) : false;
    }
}