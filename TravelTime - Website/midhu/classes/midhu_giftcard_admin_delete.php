<?php
include_once "classes/Dbconnect.php";
class midhu_giftcard_admin_delete
{


    public function midhu_giftcard_admin_delete_function($Id)
     {

         $dbc = new Dbconnect();
         $db = $dbc->getDb();
        $query = "Delete FROM giftcard WHERE Id ='$Id'";
         $pdostmt = $db->prepare($query);
         $pdostmt->execute();




    }
}

?>