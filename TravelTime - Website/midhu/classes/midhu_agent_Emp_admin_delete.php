<?php
include_once "classes/Dbconnect.php";
class midhu_agentEmp_admin_delete
{


    public function agentEmp_admin_delete_function($Id)
     {

         $dbc = new Dbconnect();
         $db = $dbc->getDb();
        $query = "Delete FROM agent WHERE Id ='$Id'";
         $pdostmt = $db->prepare($query);
         $pdostmt->execute();




    }
}

?>