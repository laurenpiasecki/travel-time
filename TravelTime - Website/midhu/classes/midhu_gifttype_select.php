<?php
include_once "classes/Dbconnect.php";
class midhu_gifttype_select
{



    public function select_gifttype_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM gifttype";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }


}
?>






