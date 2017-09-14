<?php
include_once "classes/Dbconnect.php";
class midhu_giftcard_admin_record_select
{

    public function select_record_function()
    {
        $Id ="";
        $value1 = "";
        $CardDesign ="";
         $Message = "";
         $Deliverytype = "";
          $ReceiverName  = "";
          $ReceiverEmail ="";
           $SenderName = "";
        $DeliveryDate = "";
         $Address1 = "";
         $Address2 = "";
          $City = "";
           $Province = "";
            $Country = "";
             $PostalCode = "";
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT Id,value1,CardDesign,Message,Deliverytype,ReceiverName,ReceiverEmail,SenderName,SenderEmail,
                  DeliveryDate,Address1,Address2,City,Province,Country,PostalCode 
                   FROM giftcard";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':Id', $Id);
        $pdostmt->bindValue(':value1', $value1);
        $pdostmt->bindValue(':CardDesign', $CardDesign);
        $pdostmt->bindValue(':Message', $Message);
        $pdostmt->bindValue(':Deliverytype', $Deliverytype);
        $pdostmt->bindValue(':ReceiverName', $ReceiverName);
        $pdostmt->bindValue(':ReceiverEmail', $ReceiverEmail);
        $pdostmt->bindValue(':SenderName', $SenderName);
        $pdostmt->bindValue(':DeliveryDate', $DeliveryDate);
        $pdostmt->bindValue(':Address1', $Address1);
        $pdostmt->bindValue(':Address2', $Address2);
        $pdostmt->bindValue(':City', $City);
        $pdostmt->bindValue(':Province', $Province);
        $pdostmt->bindValue(':Country', $Country);
        $pdostmt->bindValue(':PostalCode', $PostalCode);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }


}
?>






