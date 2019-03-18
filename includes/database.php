<?php

    require_once ("my_con_config.php");

    class Database {


        public $connection;


         function __construct() {
            $this->open_db_connection();
        }

        public function open_db_connection() {
            $this->connection = new mysqli(HOST , NAME , PASSWORD , DB_NAME);
        }


        public function query($sql) {
            return $this->connection->query($sql);
        }

        public function escapeString($string) {
            return $this->connection->real_escape_string($string);
        }

        public function confirmQuery($result) {
            if(!$result) {
                die("query failed");
            }
        }
    }

    $database = new Database();
?>