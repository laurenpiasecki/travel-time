<?php

/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/4/2017
 * Time: 3:59 PM
 */


class Cardealcrud
{

    public function listdeals($db){
        $query = "SELECT * FROM cardeals";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $deals = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $deals;
    }

    public function delete($id,$db){
        //echo $id;
        //require_once 'database.php';
        $query = "DELETE FROM cardeals WHERE id = :id";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
        $row = $pdostmt->execute();
        return $row;
        // header("Location: admin.php");
    }

    public function update($db,$obj){

        $query = "UPDATE cardeals 
                 SET  name = :name,
                 description = :description,
                 price = :price, image = :image
                  WHERE id = :id";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':name',$obj->getName(), PDO::PARAM_STR);
        $pdostmt->bindValue(':description',$obj->getDescription(), PDO::PARAM_STR);
        $pdostmt->bindValue(':price',$obj->getPrice(), PDO::PARAM_INT);
        $pdostmt->bindValue(':image',$obj->getImage(), PDO::PARAM_STR);
        $pdostmt->bindValue(':id',$obj->getId(), PDO::PARAM_INT);
        $row = $pdostmt->execute();

    }

    public function create($db,$obj){

        $query = "INSERT INTO cardeals 
                  (name, description, price, image)
                  VALUES (:name, :description, :price, :image)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':name',$obj->getName(), PDO::PARAM_STR);
        $pdostmt->bindValue(':description',$obj->getDescription(), PDO::PARAM_STR);
        $pdostmt->bindValue(':price',$obj->getPrice(), PDO::PARAM_INT);
        $pdostmt->bindValue(':image',$obj->getImage(), PDO::PARAM_STR);


        $row = $pdostmt->execute();
    }

    public function cardealsbyid($db,$id){
        $query = "SELECT * FROM cardeals WHERE id = :id";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':id',$id, PDO::PARAM_INT);
        $pdostmt->execute();
        $results = $pdostmt->fetch();
        return $results;
    }

}