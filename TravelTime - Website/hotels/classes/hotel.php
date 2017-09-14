<?php

class hotel
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new database();
        $this->db = $this->dbc->getDb();
    }
/*GETTING PLACES*/
    public function getCity(){

        $sql = "SELECT DISTINCT city FROM hotel_info";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $city = $stm->fetchAll();
        return $city;
    }
/*GETTING HOTELS*/
    public function getHotels(){

        $sql = "SELECT * FROM hotel_info";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $hotels = $stm->fetchAll();

        return $hotels;
    }
/*GETTING HOTELS IN PLACES*/
    public function getHotelInCity($city){

        $sql = "SELECT * FROM hotel_info where city = :city";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':city', $city, PDO::PARAM_STR);
        $stm->execute();

        $hotels = $stm->fetchAll();
        return $hotels;
    }
/*ADMIN INSERTING HOTELS*/
    public function insertHotels($hotel_name, $hotel_desc, $hotel_price, $hotel_link, $fileName) {

        $query = "INSERT INTO hotel_info(name, description, price, link, image) 
                  VALUES (:hotel_name, :hotel_desc, :hotel_price, hotel_link, :fileName)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':hotel_name', $hotel_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':hotel_desc', $hotel_desc, PDO::PARAM_STR);
        $pdostmt->bindValue(':hotel_price', $hotel_price, PDO::PARAM_INT);
        $pdostmt->bindValue(':hotel_link', $hotel_link, PDO::PARAM_STR);
        $pdostmt->bindValue(':fileName', $fileName, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $hotel_name;

    }


/*ADMIN LIST OF HOTELS*/
    public function hotelList(){

        $query = "SELECT * FROM hotel_info";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $hotelList = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $hotelList;
    }

/*ADMIN DETAIL OF HOTEL*/
    public function hotelDetail($id){

        $query = "SELECT * FROM hotel_info WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $hotelDetail = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $hotelDetail;
    }

/*ADMIN DELETING HOTELS*/
    public function delHotel($id){
        $query = "DELETE FROM hotel_info WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }
/*ADMIN UPDATING HOTELS*/
    public function updateHotel($id, $hotel_name, $hotel_desc, $hotel_price, $hotel_link, $fileName){

        $query = "UPDATE hotel_info SET name = :hotel_name, description = :hotel_desc, price = :hotel_price,
 link = :hotel_link, image = :fileName";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':hotel_name', $hotel_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':hotel_desc', $hotel_desc, PDO::PARAM_STR);
        $pdostmt->bindValue(':hotel_price', $hotel_price, PDO::PARAM_INT);
        $pdostmt->bindValue(':hotel_link', $hotel_link, PDO::PARAM_STR);
        $pdostmt->bindValue(':fileName', $fileName, PDO::PARAM_ST);
        $pdostmt->bindValue(':id', $id);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $hotel_name;
    }

}