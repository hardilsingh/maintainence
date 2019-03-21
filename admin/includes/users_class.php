<?php

class Users extends Db_object
{

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'user_email' , 'user_password' , 'user_role' , 'user_state' , 'user_city' , 'user_pincode' , 'user_address' , 'user_photo');
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



    public static function verifyUser($user_email) {
        global $database;
        $user_email = $database->escapeString($user_email);
        $result_set = self::find_this_query("SELECT * FROM ". self::$db_table ." WHERE user_email = '{$user_email}'  LIMIT 1");
        return !empty($result_set) ? array_shift($result_set) : false;         
    } 



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


    public static function emailExists($email) {
        global $database;
        $clean_email = $database->escapeString($email);
        $sql = "SELECT * FROM ". self::$db_table ." WHERE user_email = '{$clean_email}'";
        $result  = $database->query($sql);
        return mysqli_num_rows($result);
    }


    public static function encryptPassword($password) {
        global $database;
        $clean_password = $database->escapeString($password);
        return password_hash($clean_password , PASSWORD_BCRYPT , array('hackthisyoupunk' => 10));
    }

}