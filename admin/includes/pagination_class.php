<?php


class Pagination extends Db_object
{
    public $limit;


    public static function paginationQuery($displayResults , $table_name) {
        global $database;
        $limit = self::$limit = $displayResults;
        if(isset($_GET['page'])) {
            $pn = $_GET['page'];
        }else {
            $pn = 1;
        }

        $start_from = ($pn-1) * $limit;
        $sql = $database->query("SELECT * FROM $table_name LIMIT $start_from , $limit");
        return $sql;
    }

    public static function displayPagination($limit , $table_name) {
        global $database;
        $sql = $database->query("SELECT * FROM  $table_name");
        $total_records = mysqli_num_rows($sql);
    }
}
