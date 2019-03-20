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



    public static function verifyUser($user_email , $user_password) {
        global $database;
        $user_email = $database->escapeString($user_email);
        $user_password = $database->escapeString($user_password);

        $result_set = self::find_this_query("SELECT * FROM ". self::$db_table ." WHERE user_email = '{$user_email}' AND user_password = '{$user_password}' LIMIT 1");

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

 }
 