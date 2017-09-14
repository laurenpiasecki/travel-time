<?php
include_once "classes/Dbconnect.php";


class midhu_admin_card_select
{

    public function select_card_details_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM giftcard WHERE Id ='$Id'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }



}





?>






