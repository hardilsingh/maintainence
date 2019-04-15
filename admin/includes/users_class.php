<?php

//conatins all the methods and properties related to users
class Users extends Db_object
{

    //property for table name
    protected static $db_table = "users";
    //property for fields of table
    protected static $db_table_fields = array('username' , 'otp' ,  'user_email', 'user_password', 'user_role', 'user_state', 'user_city', 'user_pincode', 'user_address', 'user_photo' , 'user_ph' , 'name' , 'plan');
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
    public $user_ph;
    public $name;
    public $otp;
    public $plan;


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

    //method to find only admin users
    public static function adminUsers() {
        return self::find_this_query("SELECT * FROM ". self::$db_table ." WHERE user_role = 'admin' ORDER BY user_id DESC");
    }

    //method to find only customers
    public static function customerUsers() {
        return self::find_this_query("SELECT * FROM ". self::$db_table ." WHERE user_role = 'customer' ORDER BY user_id DESC");
    }

    //method to find only service providers
    public static function serviceProviderUsers() {
        return self::find_this_query("SELECT * FROM ". self::$db_table ." WHERE user_role = 'provider' ORDER BY user_id DESC");
    }

    //to find number of service providers
    public static function numProviders() {
        global $database;
        $users = $database->query("SELECT * FROM users WHERE user_role = 'provider'");
        return mysqli_num_rows($users);
    }


    public static function forgotPasswordVerify($email) {
        $result = self::find_this_query("SELECT * FROM users WHERE user_email = '{$email}' LIMIT 1 ");
        return !empty($result) ? array_shift($result) : false;
    }

    public static function updateProfilePhoto($user_id , $image) {
        global $database;
        return $database->query("UPDATE users SET user_photo = '{$image}' WHERE user_id = $user_id");
    }
    
    public static function storeOTP($id , $otp) {
        return self::find_this_query("UPDATE ". self::$db_table ." SET otp = '{$otp}' WHERE user_id = $id ");
    }


    public static function updatePassword($id , $password) {
    return self::find_this_query("UPDATE users SET user_password = '{$password}' WHERE user_id = $id ");
    }

    public static function findByEmail($email) {
        global $database;
        $clean_email = $database->escapeString($email);
        $sql = self::find_this_query("SELECT * FROM users WHERE user_email = '{$clean_email}' LIMIT 1");
        return !empty($sql) ? array_shift($sql) : false;
    }

    public static function changeRole($id) {
    return self::find_this_query("UPDATE users SET user_role = 'admin' WHERE user_id = $id ");
    }

}


//end if users class