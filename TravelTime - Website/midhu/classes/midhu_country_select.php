<?php
include_once "classes/Dbconnect.php";
class midhu_country_select
{

    public function select_country_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM country";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }


}
?>






