<?php
include_once "classes/Dbconnect.php";
class midhu_agentcontact_admin_delete
{


    public function agentcontact_admin_delete_function($Id)
     {

         $dbc = new Dbconnect();
         $db = $dbc->getDb();
        $query = "Delete FROM agentcontact WHERE Id ='$Id'";
         $pdostmt = $db->prepare($query);
         $pdostmt->execute();




    }
}

?>