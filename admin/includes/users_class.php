<?php

//conatins all the methods and properties related to users
class Users extends Db_object
{

    //property for table name
    protected static $db_table = "users";
    //property for fields of table
    protected static $db_table_fields = array('username', 'user_email', 'user_password', 'user_role', 'user_state', 'user_city', 'user_pincode', 'user_address', 'user_photo');
    //properties with same name as table fields
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


    //method used to verify user
    public static function verifyUser($user_email)
    {
        global $database;
        $user_email = $database->escapeString($user_email);
        $result_set = self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE user_email = '{$user_email}'  LIMIT 1");
        return !empty($result_set) ? array_shift($result_set) : false;
    }


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

    //used to check for duplicate user email
    public static function emailExists($email)
    {
        global $database;
        $clean_email = $database->escapeString($email);
        $sql = "SELECT * FROM " . self::$db_table . " WHERE user_email = '{$clean_email}'";
        $result  = $database->query($sql);
        return mysqli_num_rows($result);
    }

    //used to encrypt the password
    public static function encryptPassword($password)
    {
        global $database;
        $clean_password = $database->escapeString($password);
        return password_hash($clean_password, PASSWORD_BCRYPT, array('hackthisyoupunk' => 10));
    }
}


//end if users class