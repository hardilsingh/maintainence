<?php


class Users
{

    protected static $db_table = "users";
    public $user_id;
    public $username;
    public $user_email;
    public $user_password;
    public $user_role;
    public $user_state;
    public $user_city;
    public $user_pincode;
    public $user_address;
    public $user_photo;




    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();

        while($row = mysqli_fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }




    public static function find_all() {
        return self::find_this_query("SELECT * FROM ".self::$db_table."");
    }


    public static function find_by_id($id) {
        $result_set = self::find_this_query("SELECT * FROM users WHERE user_id = $id");

        return !empty($result_set) ? array_shift($result_set) : false;
    } 





    private static function instantiate($the_record) {

        $the_object = new self;

        foreach ($the_record as $property => $value) {
            if($the_object->has_the_property($property)) {
                $the_object->$property = $value;
            }
        }

        return $the_object;
    }






    private function has_the_property($property) {
        $object_properties = get_object_vars($this);
        return array_key_exists($property , $object_properties);
    }



    public static function verifyUser($user_email , $user_password) {
        global $database;
        $user_email = $database->escapeString($user_email);
        $user_password = $database->escapeString($user_password);

        $result_set = self::find_this_query("SELECT * FROM users WHERE user_email = '{$user_email}' AND user_password = '{$user_password}' LIMIT 1");

        return !empty($result_set) ? array_shift($result_set) : false;
        

    } 







 }
 