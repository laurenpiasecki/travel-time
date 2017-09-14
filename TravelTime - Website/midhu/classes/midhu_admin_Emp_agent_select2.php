<?php
include_once "classes/Dbconnect.php";


class midhu_admin_Emp_agent_select2
{

    public function select_agent_details_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Id ='$Id'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
}





?>






