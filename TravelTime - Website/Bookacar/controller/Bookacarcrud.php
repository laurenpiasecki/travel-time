<?php

/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/5/2017
 * Time: 1:57 PM
 */
class Bookacarcrud
{

    public function listdeals($db){
        $query = "SELECT * FROM cardeals";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $deals = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $deals;
    }

    public function cardealsbyid($db,$id){
        $query = "SELECT * FROM cardeals WHERE id = :id";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
        $pdostmt->execute();
        $results = $pdostmt->fetch();
        return $results;
    }

    public function create($db,$obj){

        $query = "INSERT INTO bookacar 
                  (bookacar_id, pickup_loc, dropoff_loc, pickup_datetime, dropoff_datetime, name, email, phone)
                  VALUES (:bookacar_id, :pickup_loc, :dropoff_loc, :pickup_datetime, :dropoff_datetime, :name, :email, :phone)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':name',$obj->getName(),PDO::PARAM_STR);
        $pdostmt->bindValue(':phone',$obj->getPhone(),PDO::PARAM_STR);
        $pdostmt->bindValue(':email',$obj->getEmail(),PDO::PARAM_STR);

        $pdostmt->bindValue(':bookacar_id',$obj->getBookacarId(),PDO::PARAM_STR);
        $pdostmt->bindValue(':pickup_loc',$obj->getPickupLoc(), PDO::PARAM_STR);
        $pdostmt->bindValue(':dropoff_loc',$obj->getDropoffLoc(), PDO::PARAM_STR);
        $pdostmt->bindValue(':pickup_datetime',$obj->getPickupDatetime());
        $pdostmt->bindValue(':dropoff_datetime',$obj->getDropoffDatetime());

        $row = $pdostmt->execute();
        return $row;
    }


    public function selectall($db){

       $query = "SELECT * FROM bookacar JOIN cardeals ON bookacar.bookacar_id = cardeals.id";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $result = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

    public function delete($id,$db){
        //echo $id;
        //require_once 'database.php';
        $query = "DELETE FROM bookacar WHERE id = :id";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
        $row = $pdostmt->execute();
        return $row;
        // header("Location: admin.php");
    }



}