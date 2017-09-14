<?php
include_once "classes/Dbconnect.php";
class midhu_agent_admin_record_select
{

    public function select_record_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agentcontact";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }


}
?>






