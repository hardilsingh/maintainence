<?php


//parent call to all the base classes
class Db_object
{



    //method used to process the sql statement and assign the values to the object properties using instantiate method
    public static function find_this_query($sql)
    {
        //instance of database class
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();

        //assigning ids done here
        while ($row = mysqli_fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }



    //used to find all data from the requested table
    public static function find_all()
    {
        return static::find_this_query("SELECT * FROM " . static::$db_table . "");
    }

    //used to find data from database by id only
    public static function find_by_id($id)
    {
        $result_set = static::find_this_query("SELECT * FROM " . static::$db_table . "  WHERE user_id = $id");

        return !empty($result_set) ? array_shift($result_set) : false;
    }


    //the assignig of the values is done here
    private static function instantiate($the_record)
    {

        $get_class_name = get_called_class();

        $the_object = new $get_class_name;

        foreach ($the_record as $property => $value) {
            if ($the_object->has_the_property($property)) {
                $the_object->$property = $value;
            }
        }

        return $the_object;
    }


    //it gets all the properties of the object and sends it to instantiate class
    private function has_the_property($property)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($property, $object_properties);
    }


    //****************************************************************************** */



    //create a new entry in databse
    public function create()
    {
        global $database;
        $properties = $this->cleanProperties();

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",",  array_keys($properties))  . ") VALUES ('" . implode("','", array_values($properties)) . "') ";
        return $database->query($sql);
    }

    //update an entery in database
    public function update($id)
    {
        global $database;

        $properties = $this->cleanProperties();
        $property_pairs = array();

        foreach ($properties as $key => $value) {
            $property_pairs[] = "{$key}='{$value}'";
        }


        $sql = "UPDATE  " . static::$db_table . "  SET  " . implode(",", $property_pairs) . "  WHERE user_id = $id  ";
        return $database->query($sql);
    }

    //delete an entry in database
    public function delete()
    {
        global $database;

        $sql = "DELETE FROM  " . static::$db_table . " WHERE user_id = " . $database->escapeString($this->user_id) . "  ";
        return $database->query($sql);
    }


    //number of table data
    public static function num()
    {
        global $database;
        $users = $database->query("SELECT * FROM " . static::$db_table . "");
        return mysqli_num_rows($users);
    }


    /******************************************************************************** */

    //pagination

    public static function paginationQuery($limit_results , $user_id)
    {
        static::$limit = $limit_results;
        if (isset($_GET['page'])) {
            static::$pn = $_GET['page'];
        } else {
            static::$pn = 1;
        }

        $start_from = (static::$pn - 1) * $limit_results;
        return static::find_all("SELECT * FROM  " . static::$db_table . " WHERE user_id = '{$user_id}' LIMIT $start_from , $limit_results");
    }

    public static function displayPagination()
    {
        global $database;
        $sql = $database->query("SELECT * FROM  " . static::$db_table . " ");
        $total_records = mysqli_num_rows($sql);

        $total_pages = ceil($total_records / static::$limit);
            $pagLink = "";

        for ($i = 0; $i <= $total_pages; $i++) {
            if ($i == static::$pn)
                $pagLink .= "<li class='active'><a href='profile.php?page= " . $i . "'>" . $i . "</a></li>";
            else
                $pagLink .= "<li><a href='profile.php?page=" . $i . "'> " . $i . "</a></li>";
        }
        echo $pagLink;
    }
}

