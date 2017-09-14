<?php
//require_once "../Model/Connect.php";
//require_once "../Model/Feedback.php";
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/16/2017
 * Time: 4:46 PM
 */
class feedbackcrud
{

public function insertform($db,$obj1){

    $query = "INSERT INTO feedback 
                  (date, firstname, lastname, email, phone, title, message)
                  VALUES (:dated, :firstname, :lastname, :email, :phone, :title, :message)";
    $pdostmt = $db->prepare($query);
    $pdostmt->bindValue(':dated',$obj1->getDate());
$pdostmt->bindValue(':firstname',$obj1->getFirstname());
$pdostmt->bindValue(':lastname',$obj1->getLastname());
$pdostmt->bindValue(':email',$obj1->getEmail());
$pdostmt->bindValue(':phone',$obj1->getPhone());
    $pdostmt->bindValue(':title',$obj1->getTitle());
    $pdostmt->bindValue(':message',$obj1->getMessage());


$row = $pdostmt->execute();
return $row;

}

    public function retrieveresult($conn){
        $query1 = "SELECT * FROM feedback";
        $pdostmt = $conn->prepare($query1);
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);
        return $result;

    }

    public function retrieveresultid($conn,$id){
        $query1 = "SELECT * FROM feedback WHERE id = :id";
        $pdostmt = $conn->prepare($query1);
        $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);
        return $result;

    }

    public function delete($conn,$id){
            $query = "DELETE FROM feedback WHERE id = :id";
            $pdostmt = $conn->prepare($query);
            $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
            $row = $pdostmt->execute();
            //echo "Deleted " . $row;
            return $row;

    }

    public function edit($conn,$obj2,$id){
        $query = "UPDATE feedback SET
                  date = :dated, firstname = :firstname, lastname = :lastname, email = :email, phone = :phone, title = :title, message = :message
                  WHERE id = :id";
        $pdostmt = $conn->prepare($query);
        $pdostmt->bindValue(':id',$id);
        $pdostmt->bindValue(':dated',$obj2->getDate());
        $pdostmt->bindValue(':firstname',$obj2->getFirstname());
        $pdostmt->bindValue(':lastname',$obj2->getLastname());
        $pdostmt->bindValue(':email',$obj2->getEmail());
        $pdostmt->bindValue(':phone',$obj2->getPhone());
        $pdostmt->bindValue(':title',$obj2->getTitle());
        $pdostmt->bindValue(':message',$obj2->getMessage());
        $row = $pdostmt->execute();
        return $row;
    }
    public function emailupdate($conn,$id,$reply,$replysubject,$replymessage){
        $query = "UPDATE feedback SET
                   reply = :reply, replysubject = :replysubject, replymessage = :replymessage
                  WHERE id = :id";
        $pdostmt = $conn->prepare($query);
        $pdostmt->bindValue(':id',$id);
        $pdostmt->bindValue(':reply',$reply);
        $pdostmt->bindValue(':replysubject',$replysubject);
        $pdostmt->bindValue(':replymessage',$replymessage);
        $row = $pdostmt->execute();
        return $row;
    }






}