<?php

include_once "classes/Dbconnect.php";
include_once "Gift_Card.php";
Class midhu_gift_insert
{
    public function insert_gift_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $value1 = $_POST['value1'];
        $cardname = $_POST['cardname'];
        $message = $_POST['message'];
        $rname = $_POST['rname'];
        $ReceiverEmail = $_POST['ReceiverEmail'];
        $sname = $_POST['sname'];
        $SenderEmail = $_POST['SenderEmail'];
        $originalDate =  $_POST['DeliveryDate'];
        $DeliveryDate = date("y-m-d", strtotime($originalDate));
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $City = $_POST['City'];
        $Province = $_POST['Province'];
        $CName = $_POST['CName'];
        $postalcode = $_POST['postalcode'];
        if ((isset($_POST['self_deliver']))=="") {
            $Deliverytype = "";
        }
        else
            { $Deliverytype = $_POST['self_deliver'];}

        $query = "INSERT INTO giftcard(Deliverytype,value1,CardDesign,Message,ReceiverName,ReceiverEmail,SenderName,SenderEmail,DeliveryDate,Address1,Address2,City,Province,Country,PostalCode)
                  VALUES (:Deliverytype,:value1,:cardname,:message,:rname,:ReceiverEmail,:sname,:SenderEmail,:DeliveryDate,:address1,:address2,:City,:Province,:CName,:postalcode)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':Deliverytype', $Deliverytype, PDO::PARAM_STR);
        $pdostmt->bindValue(':value1', $value1, PDO::PARAM_STR);
        $pdostmt->bindValue(':cardname', $cardname, PDO::PARAM_STR);
        $pdostmt->bindValue(':message', $message, PDO::PARAM_STR);
        $pdostmt->bindValue(':rname', $rname, PDO::PARAM_STR);
        $pdostmt->bindValue(':ReceiverEmail', $ReceiverEmail, PDO::PARAM_STR);
        $pdostmt->bindValue(':sname', $sname, PDO::PARAM_STR);
        $pdostmt->bindValue(':SenderEmail', $SenderEmail, PDO::PARAM_STR);
        $pdostmt->bindValue(':DeliveryDate', $DeliveryDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':address1', $address1, PDO::PARAM_STR);
        $pdostmt->bindValue(':address2', $address2, PDO::PARAM_STR);
        $pdostmt->bindValue(':City', $City, PDO::PARAM_STR);
        $pdostmt->bindValue(':Province', $Province, PDO::PARAM_STR);
        $pdostmt->bindValue(':CName', $CName, PDO::PARAM_STR);
        $pdostmt->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }
}

?>