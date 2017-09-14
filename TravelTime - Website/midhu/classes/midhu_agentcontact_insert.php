<?php

include_once "classes/Dbconnect.php";

Class midhu_agentcontact_insert
{
    public function insert_contact_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $agentId = $Id;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $origin = $_POST['origin'];
        $destination = $_POST['destination'];
        $phoneno = $_POST['phoneno'];
        $SenderEmail = $_POST['SenderEmail'];
        $originalDate1 =  $_POST['StartDate'];
        $StartDate = date("y-m-d", strtotime($originalDate1));
        $originalDate2 = $_POST['ReturnDate'];
        $ReturnDate = date("y-m-d", strtotime($originalDate2));
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $query = "INSERT INTO agentcontact(agentId,fname,lname,origin,destination,phoneno,SenderEmail,StartDate,ReturnDate,subject,message)
                  VALUES ($agentId,:fname,:lname,:origin,:destination,:phoneno,:SenderEmail,:StartDate,:ReturnDate,:subject,:message)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':fname', $fname, PDO::PARAM_STR);
        $pdostmt->bindValue(':lname', $lname, PDO::PARAM_STR);
        $pdostmt->bindValue(':origin', $origin, PDO::PARAM_STR);
        $pdostmt->bindValue(':destination', $destination, PDO::PARAM_STR);
        $pdostmt->bindValue(':phoneno', $phoneno, PDO::PARAM_STR);
        $pdostmt->bindValue(':SenderEmail', $SenderEmail, PDO::PARAM_STR);
        $pdostmt->bindValue(':StartDate', $StartDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':ReturnDate', $ReturnDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':subject', $subject, PDO::PARAM_STR);
        $pdostmt->bindValue(':message', $message, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }
}

?>