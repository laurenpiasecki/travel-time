<?php
include_once "classes/Dbconnect.php";
class midhu_insurance_select
{
    public function midhu_insurance_select_function($Id2)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM insurance  WHERE Id ='$Id2'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
}
?>






