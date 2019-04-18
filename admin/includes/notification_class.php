<?php


class Notify extends Db_object
{
    protected static $db_table = 'notifications';
    protected static $db_table_fields = array('id', 'user_id' , 'msg' , 'seen');
    public $id;
    public $user_id;
    public $msg;
    public $seen;



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

    public static function notifyById($id) {
        return self::find_this_query("SELECT * FROM notifications WHERE user_id = $id ORDER BY id DESC LIMIT 6");
    }

    public static function countNotifications($now_id) {
        global $database;
        $sql = $database->query("SELECT * FROM notifications WHERE user_id = $now_id");
        return mysqli_num_rows($sql);
    }


    
} 
