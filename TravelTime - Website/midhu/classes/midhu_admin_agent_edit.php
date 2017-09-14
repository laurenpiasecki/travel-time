<?php
include_once "classes/Dbconnect.php";
class midhu_admin_agent_edit
{

    public function select_agent_edit_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();

        if (isset($_POST['editsubmit'])) {
            $Id = $_POST['Id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $origin = $_POST['origin'];
            $destination = $_POST['destination'];
            $phoneno = $_POST['phoneno'];
            $SenderEmail = $_POST['SenderEmail'];
            $StartDate = $_POST['StartDate'];
            $ReturnDate = $_POST['ReturnDate'];
            $subject = $_POST['subject'];
            $message = $_POST['message1'];
            $agentId = $_POST['agentId'];
            $query = "UPDATE agentcontact 
                        SET 
                            fname = '$fname',
                            lname = '$lname',
                            origin = '$origin',
                            destination = '$destination',
                            phoneno = '$phoneno',
                            SenderEmail = '$SenderEmail',
                            StartDate = '$StartDate',
                            ReturnDate = '$ReturnDate',
                            subject = '$subject',
                            message = '$message',
                            agentId = $agentId                            
                  WHERE Id=$Id";
            $pdostmt = $db->prepare($query);
            $pdostmt->bindValue(':Id', $Id);
            $pdostmt->bindValue(':fname', $fname);
            $pdostmt->bindValue(':lname', $lname);
            $pdostmt->bindValue(':origin', $origin);
            $pdostmt->bindValue(':destination', $destination);
            $pdostmt->bindValue(':phoneno', $phoneno);
            $pdostmt->bindValue(':SenderEmail', $SenderEmail);
            $pdostmt->bindValue(':StartDate', $StartDate);
            $pdostmt->bindValue(':ReturnDate', $ReturnDate);
            $pdostmt->bindValue(':subject', $subject);
            $pdostmt->bindValue(':message1', $message);
            $pdostmt->bindValue(':agentId', $agentId);
            $pdostmt->execute();

        }

    }

}





?>






