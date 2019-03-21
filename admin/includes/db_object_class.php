<?php



class Db_object
{


    public static function find_this_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }




    public static function find_all()
    {
        return static::find_this_query("SELECT * FROM " . static::$db_table . "");
    }


    public static function find_by_id($id)
    {
        $result_set = static::find_this_query("SELECT * FROM " . static::$db_table . "  WHERE user_id = $id");

        return !empty($result_set) ? array_shift($result_set) : false;
    }



    private static function instantiate($the_record)
    {

        $get_class_name = get_called_class();

        $the_object = new $get_class_name ;

        foreach ($the_record as $property => $value) {
            if ($the_object->has_the_property($property)) {
                $the_object->$property = $value;
            }
        }

        return $the_object;
    }



    private function has_the_property($property)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($property, $object_properties);
    }


    //CREATE UPDATE AND DELETE METHOD...

    


    public function create() {
        global $database;
        $properties = $this->cleanProperties();

        $sql = "INSERT INTO ". static::$db_table ."(". implode("," ,  array_keys($properties))  .") VALUES ('". implode("','" ,array_values($properties)) ."') ";
        return $database->query($sql);
    }


    public function update() {
        global $database;

        $properties = $this->cleanProperties();
        $property_pairs = array();

        foreach($properties as $key=> $value) {
            $property_pairs[] = "{$key}='{$value}'";
        }


        $sql = "UPDATE  ". static::$db_table ."  SET  ". implode("," , $property_pairs) ."  WHERE user_id = ". $database->escapeString($this->user_id) ."  ";
        return $database->query($sql);
    }


    public function delete() {
        global $database;

        $sql = "DELETE FROM  ". static::$db_table . " WHERE user_id = ". $database->escapeString($this->user_id) ."  ";
        return $database->query($sql);
    }
}
 