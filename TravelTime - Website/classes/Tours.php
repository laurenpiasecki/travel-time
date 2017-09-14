<?php

class Tours
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new DbConnect();
        $this->db = $this->dbc->getDb();
    }

/*GETTING DESTINATIONS*/
    public function getDestinations(){


      $query = "SELECT DISTINCT location FROM tours";
      $pdostmt = $this->db->prepare($query);
      $pdostmt->execute();
      $destinations = $pdostmt->fetchAll(PDO::FETCH_OBJ);
      return $destinations;

  }

/*GETTING TOUR STARTING PLACES*/
    public function getStartPlaces(){


        $query = "SELECT DISTINCT from_place FROM tours";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $places = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $places;

    }

/*GETTING TYPES OF TOURS*/
    public function getTypes(){

        $query = "SELECT DISTINCT type FROM tours";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $types = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $types;

    }

/*No IDEA Y i need this*/
    public function getDescriptions(){

        $query = "SELECT description FROM tours";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $decriptions = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $decriptions;

    }

/*GETTING POPULAR TOURS*/
    public function getPopularTours(){

        $query = "SELECT * FROM tours WHERE popular = '1' LIMIT 3";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $popularTours = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $popularTours;

    }

/*GETTING TOURS ACCORDING TO USER SEARCH*/
  public function getTours($tourName, $startPlace, $destination, $tourType, $startDate, $returnDate){

      $query = "SELECT * FROM tours WHERE (name LIKE :tourName) OR (from_place = :startPlace AND location = :destination AND type = :tourType 
                AND start_date >= :start_date AND return_date <= :return_date)";
      $pdostmt = $this->db->prepare($query);
      $pdostmt->bindValue(':tourName', $tourName);
      $pdostmt->bindValue(':startPlace', $startPlace, PDO::PARAM_STR);
      $pdostmt->bindValue(':destination', $destination, PDO::PARAM_STR);
      $pdostmt->bindValue(':tourType', $tourType, PDO::PARAM_STR);
      $pdostmt->bindValue(':start_date', $startDate);
      $pdostmt->bindValue(':return_date', $returnDate);
      $pdostmt->execute();
      $details = $pdostmt->fetchAll(PDO::FETCH_OBJ);
      return $details;

  }

    /*GETTING TOURS ACCORDING TO USER SEARCH*/
    public function getToursWithoutName( $startPlace, $destination, $tourType, $startDate, $returnDate){

        $query = "SELECT * FROM tours WHERE from_place = :startPlace AND location = :destination AND type = :tourType 
                AND start_date >= :start_date AND return_date <= :return_date";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':startPlace', $startPlace, PDO::PARAM_STR);
        $pdostmt->bindValue(':destination', $destination, PDO::PARAM_STR);
        $pdostmt->bindValue(':tourType', $tourType, PDO::PARAM_STR);
        $pdostmt->bindValue(':start_date', $startDate);
        $pdostmt->bindValue(':return_date', $returnDate);
        $pdostmt->execute();
        $details = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $details;

    }




/*ADMIN LOGIN*/
    public function adminLogin($user_name, $password){

        $query = "SELECT first_name, last_name FROM admin_users WHERE user_name = :user_name AND password = :password";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':user_name', $user_name);
        $pdostmt->bindValue(':user_name', $password);
        $pdostmt->execute();
        $admin = $pdostmt->fetch(PDO::FETCH_OBJ);
        return $admin;
    }

/*ADMIN INSERTING TOURS*/
    public function insertTours($tour_name, $tour_from, $tour_to, $tour_type, $tour_startDate, $tour_returnDate, $tour_desc, $tour_days, $tour_price, $fileName) {

        $query = "INSERT INTO tours(name, location, type, start_date, return_date, description, days, price, image, from_place) 
                  VALUES (:tour_name, :tour_to, :tour_type, :tour_startDate, :tour_returnDate, :tour_desc, :tour_days, :tour_price, :fileName, :tour_from)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':tour_name', $tour_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_to', $tour_to, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_type', $tour_type, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_startDate', $tour_startDate);
        $pdostmt->bindValue(':tour_returnDate', $tour_returnDate);
        $pdostmt->bindValue(':tour_desc', $tour_desc);
        $pdostmt->bindValue(':tour_days', $tour_days);
        $pdostmt->bindValue(':tour_price', $tour_price);
        $pdostmt->bindValue(':fileName', $fileName);
        $pdostmt->bindValue(':tour_from', $tour_from);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $tour_name;

    }


/*ADMIN LIST OF TOURS*/
    public function tourList(){

        $query = "SELECT * FROM tours";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $tourList = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $tourList;

    }


/*ADMIN DETAIL OF TOUR*/
    public function tourDetail($id){

        $query = "SELECT * FROM tours WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $tourDetail = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $tourDetail;

    }

/*ADMIN DELETING TOURS*/
    public function delTour($id){
        $query = "DELETE FROM tours WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }
/*ADMIN UPDATING TOURS*/
    public function updateTour($id, $tour_name, $tour_from, $tour_to, $tour_type,
                               $tour_startDate, $tour_returnDate, $tour_desc, $tour_days, $tour_price, $fileName, $tour_popular){


        $query = "UPDATE tours SET name = :tour_name,location = :tour_to, type = :tour_type ,
 start_date = :tour_startDate, return_date = :tour_returnDate, description = :tour_desc, days = :tour_days,
  price = :tour_price, image = :fileName, from_place = :tour_from, popular=:tour_popular  WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':tour_name', $tour_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_to', $tour_to, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_type', $tour_type, PDO::PARAM_STR);
        $pdostmt->bindValue(':tour_startDate', $tour_startDate);
        $pdostmt->bindValue(':tour_returnDate', $tour_returnDate);
        $pdostmt->bindValue(':tour_desc', $tour_desc);
        $pdostmt->bindValue(':tour_days', $tour_days);
        $pdostmt->bindValue(':tour_price', $tour_price);
        $pdostmt->bindValue(':fileName', $fileName);
        $pdostmt->bindValue(':tour_from', $tour_from);
        $pdostmt->bindValue(':tour_popular', $tour_popular);
        $pdostmt->bindValue(':id', $id);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $tour_name;
    }



}


?>
