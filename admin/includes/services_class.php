<?php


//conatins methods and properties for the services
class Services extends Db_object
{

    protected static $db_table = "services";
    protected static $db_table_fields = array('service_id', 'service_name');
    public $service_id;
    public $service_name;

    //select name of services from the request type id
    public static function requestName($request_id)
    {
        $sql = self::find_this_query("SELECT service_name FROM services WHERE service_id = $request_id");
        return !empty($sql) ? array_shift($sql) : false;
    }
}