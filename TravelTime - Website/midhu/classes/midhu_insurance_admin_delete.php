<?php
include_once "classes/Dbconnect.php";
class midhu_insurance_admin_delete
{


    public function agent_insurance_admin_delete_function($Id)
     {

         $dbc = new Dbconnect();
         $db = $dbc->getDb();
        $query = "Delete FROM insurance WHERE Id ='$Id'";
         $pdostmt = $db->prepare($query);
         $pdostmt->execute();




    }
}

?>