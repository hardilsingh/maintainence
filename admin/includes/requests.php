<?php


class Requests extends Db_object
{
    protected static $db_table = "requests";
    protected static $db_table_fields = array('request_type', 'user_name' , 'user_ph' , 'address' , 'msg' , 'request_satus' , 'refrence_id');
    public $request_id;
    public $request_type;
    public $user_name;
    public $address;
    public $msg;
    public $user_ph;
    public $request_status;
    public $refrence_id;


    protected function properties() {
        // return get_object_vars($this);

        $properties = array();
        foreach(self::$db_table_fields as $db_field) {
            if(property_exists($this , $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }


    protected function cleanProperties() {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escapeString($value);
        }

        return $clean_properties;
    }


    public static function selectMaxId() {
        return self::find_this_query("SELECT * FROM requests ORDER BY request_id  DESC LIMIT 1");
    }


    public static function pendingRequests() {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'pending' ORDER BY request_id DESC");
    }

    public static function inProcess() {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'in_process' ORDER BY request_id DESC");
    }

    public static function completed() {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'completed' ORDER BY request_id DESC");
    }


    public static function updateStatus($status , $id) {
        global $database;
        $sql = "UPDATE requests SET request_status = '{$status}' WHERE request_id = $id  ";
        return $database->query($sql);
    }


    public static function searchRequest($searchTxt) {
        return  self::find_this_query("SELECT * FROM requests WHERE refrence_id LIKE '%". $searchTxt ."%' OR user_ph LIKE '%". $searchTxt ."%'");
    }


}
 