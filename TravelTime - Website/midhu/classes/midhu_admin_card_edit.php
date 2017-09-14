<?php
include_once "classes/Dbconnect.php";
class midhu_admin_card_edit
{

    public function select_card_edit_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();

        if (isset($_POST['editsubmit'])) {
            $Id = $_POST['Id'];
            $value1 = $_POST['value1'];
            $CardDesign = $_POST['CardDesign'];
            $Message = $_POST['Message1'];
            $Deliverytype = $_POST['Deliverytype'];
            $ReceiverName = $_POST['ReceiverName'];
            $ReceiverEmail = $_POST['ReceiverEmail'];
            $SenderName = $_POST['SenderName'];
            $SenderEmail = $_POST['SenderEmail'];
            $originalDate = $_POST['DeliveryDate'];
            $DeliveryDate = date("y-m-d", strtotime($originalDate));


            $Address1 = $_POST['Address1'];
            $Address2 = $_POST['Address2'];
            $City = $_POST['City'];
            $Province = $_POST['Province'];
            $Country = $_POST['Country'];
            $PostalCode = $_POST['PostalCode'];
            $query = "UPDATE giftcard 
                        SET 
                            value1 = '$value1',
                            CardDesign = '$CardDesign',
                            Message = '$Message',
                            Deliverytype = '$Deliverytype',
                            ReceiverName = '$ReceiverName',
                            ReceiverEmail = '$ReceiverEmail',
                            SenderName = '$SenderName',
                            SenderEmail = '$SenderEmail',
                            DeliveryDate = '$DeliveryDate',
                            Address1 = '$Address1',
                            Address2 = '$Address2',
                            City = '$City',
                            Province = '$Province',
                            Country = '$Country',
                            PostalCode = '$PostalCode'                          
                                                        
                  WHERE Id='$Id'";
            $pdostmt = $db->prepare($query);
            $pdostmt->bindValue(':Id', $Id);
            $pdostmt->bindValue(':value1', $value1);
            $pdostmt->bindValue(':CardDesign', $CardDesign);
            $pdostmt->bindValue(':Message1', $Message);
            $pdostmt->bindValue(':Deliverytype', $Deliverytype);
            $pdostmt->bindValue(':ReceiverName', $ReceiverName);
            $pdostmt->bindValue(':ReceiverEmail', $ReceiverEmail);
            $pdostmt->bindValue(':SenderName', $SenderName);
            $pdostmt->bindValue(':SenderEmail', $SenderEmail);
            $pdostmt->bindValue(':DeliveryDate', $DeliveryDate);
            $pdostmt->bindValue(':Address1', $Address1);
            $pdostmt->bindValue(':Address2', $Address2);
            $pdostmt->bindValue(':City', $City);
            $pdostmt->bindValue(':Province', $Province);
            $pdostmt->bindValue(':Country', $Country);
            $pdostmt->bindValue(':PostalCode', $PostalCode);


            $pdostmt->execute();

        }

    }

}





?>






