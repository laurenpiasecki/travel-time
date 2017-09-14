<?php
include_once "classes/Dbconnect.php";
class midhu_giftcardpic_select
{



    public function midhu_giftcardpic_general_select_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT CardName, Link FROM smallcardpictures WHERE CardType='General'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }
    public function midhu_giftcardpic_wedding_select_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT CardName, Link FROM smallcardpictures WHERE CardType='Wedding'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }
    public function midhu_giftcardpic_valentines_select_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT CardName, Link FROM smallcardpictures WHERE CardType='Valentines Day'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }
    public function midhu_giftcardpic_miscellaneous_select_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT CardName, Link FROM smallcardpictures WHERE CardType='Miscellaneous'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }
    public function midhu_giftcardpic_large_select_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT CardName, Link FROM smallcardpictures WHERE CardType='Large'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows3 = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows3;
    }





}
?>






