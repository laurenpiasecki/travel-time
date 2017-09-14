<?php

class currency
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new database();
        $this->db = $this->dbc->getDb();
    }
/*GETTING CURRENCY NAMES*/
    public function getCurrency(){

        $sql = "SELECT DISTINCT name, abbr FROM currency order by name ASC";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $currency = $stm->fetchAll();
        return $currency;
    }
/*GETTING CURRENCIES*/
    public function getCurrencies(){

        $sql = "SELECT * FROM currency";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $currencies = $stm->fetchAll();

        return $currencies;
    }
/*GETTING ALL CURRENCY NAMES*/
    public function getNameOfCurrency($currency){

        $sql = "SELECT * FROM currency where name = :name";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(':name', $currency, PDO::PARAM_STR);
        $stm->execute();

        $currencies = $stm->fetchAll();
        return $currencies;
    }

/*ADMIN INSERTING CURRENCIES*/
    public function insertCurrencies($currency_name, $currency_abbr) {

        $query = "INSERT INTO currency(name, abbr) 
                  VALUES (:currency_name, :currency_abbr)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':currency_name', $currency_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':currency_abbr', $currency_abbr, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $currency_name;
    }

    /*ADMIN LIST OF CURRENCIES*/
    public function currencyList(){

        $query = "SELECT * FROM currency";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $currencyList = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $currencyList;

    }


    /*ADMIN DETAIL OF CURRENCY*/
    public function currencyDetail($id){

        $query = "SELECT * FROM currency WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $currencyDetail = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $currencyDetail;

    }

    /*ADMIN DELETING CURRENCIES*/
    public function delCurrency($id){
        $query = "DELETE FROM currency WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }
    /*ADMIN UPDATING Currencies*/
    public function updateCurrency($id, $currency_name, $currency_abbr){
        $query = "UPDATE currency SET name = :currency_name, abbr = :currency_abbr";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':currency_name', $currency_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':currency_abbr', $currency_abbr, PDO::PARAM_STR);
        $pdostmt->bindValue(':id', $id);
        $pdostmt->execute();
        $pdostmt->closeCursor();
        return $currency_name;
    }


}