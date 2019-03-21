<?php

//it conatin the databse credentials
require_once("my_con_config.php");

//conatins all the necessary methods used in all classes
class Database
{

    //variable used to open connection
    public $connection;

    //open the connection automatically
    function __construct()
    {
        $this->open_db_connection();
    }

    //to open the connection
    public function open_db_connection()
    {
        //created mysqli object
        $this->connection = new mysqli(HOST, NAME, PASSWORD, DB_NAME);
    }

    //query used to perform all the  operations
    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    //used to clen the data before enetring the database
    public function escapeString($string)
    {
        return $this->connection->real_escape_string($string);
    }

    //to check the query for any errors
    public function confirmQuery($result)
    {
        if (!$result) {
            die("query failed");
        }
    }
}

//database class object
$database = new Database();
