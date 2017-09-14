<?php
include_once "classes/Dbconnect.php";
class midhuPicSelectClass
{

    public function select_piclink_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT PicLink FROM smallpictable";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }


}