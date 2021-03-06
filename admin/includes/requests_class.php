<?php

//class has the request operation methods and is inehrited from db_objects class
class Requests extends Db_object
{

    //table name
    protected static $db_table = "requests";
    //database table fields
    protected static $db_table_fields = array('request_type', 'user_name', 'open', 'closed',  'user_ph', 'user_id', 'address', 'msg', 'request_satus', 'refrence_id');
    //properties same as fields
    public $request_id;
    public $request_type;
    public $user_name;
    public $address;
    public $msg;
    public $user_ph;
    public $request_status;
    public $refrence_id;
    public $user_id;
    public $open;
    public $closed;
    public static $limit;
    public static $pn;


    //get properties from the class and assign them the values bought from the database
    protected function properties()
    {
        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    //used to clean the properties before using them un the databse
    protected function cleanProperties()
    {
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escapeString($value);
        }

        return $clean_properties;
    }

    //to select the last altered id
    public static function selectMaxId()
    {
        return self::find_this_query("SELECT * FROM requests ORDER BY request_id  DESC LIMIT 1");
    }

    //method to find only pending requests
    public static function pendingRequests()
    {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'pending' ORDER BY request_id DESC");
    }

    //method to find only in_process reuqests
    public static function inProcess()
    {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'in_process' ORDER BY request_id DESC");
    }

    //method to find only completed requests
    public static function completed()
    {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'completed' ORDER BY request_id DESC");
    }

    //method to find only cancelled requests
    public static function cancelled()
    {
        return self::find_this_query("SELECT * FROM requests WHERE request_status = 'cancelled' ORDER BY request_id DESC");
    }

    //method to update the status of a request
    public static function updateStatus($status, $id)
    {
        global $database;
        $date = date('d-m-y');
        if ($status == 'completed') {
            $sql = "UPDATE requests SET request_status = '{$status}' ,   closed = '{$date}' WHERE request_id = $id  ";
        } elseif ($status == 'cancelled') {
            $sql = "UPDATE requests SET request_status = '{$status}' ,   closed = '{$date}' WHERE request_id = $id  ";
        } else {
            $sql = "UPDATE requests SET request_status = '{$status}'  WHERE request_id = $id  ";
        }

        return $database->query($sql);
    }

    //method to search the text in the databse using ajax
    public static function searchRequest($searchTxt)
    {
        return  self::find_this_query("SELECT * FROM requests WHERE refrence_id LIKE '%" . $searchTxt . "%' OR user_ph LIKE '%" . $searchTxt . "%'");
    }

    //method to calculate num of rows
    public static function newRequestsTotal()
    {
        global $database;
        $newRequests = $database->query("SELECT * FROM requests WHERE request_status = 'pending'");
        return mysqli_num_rows($newRequests);
    }

    //method to calculate num of rows
    public static function completedRequestsTotal()
    {
        global $database;
        $newRequests = $database->query("SELECT * FROM requests WHERE request_status = 'completed'");
        return mysqli_num_rows($newRequests);
    }

    

    //find all using user id for profile
    public static function requestHistory($user_id)
    {
        return self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE user_id = $user_id ORDER BY open DESC  ");
    }

    public static function activeRequests($id) {
        global $database;
        $sql = $database->query("SELECT * FROM requests WHERE user_id = $id AND request_status != 'completed' AND request_status != 'cancelled' ");
        return mysqli_num_rows($sql);
    }


    public static function find_name_by_request_id($id) {
        $sql =self::find_this_query("SELECT * FROM requests WHERE request_id = $id LIMIT 1" );
        return !empty($sql) ? array_shift($sql) : false;
    }

    
}
