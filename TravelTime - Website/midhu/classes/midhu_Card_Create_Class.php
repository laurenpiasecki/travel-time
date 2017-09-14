<?php
class midhu_Card_Create_Class
{

    public function Card_Create_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $CardName = $_POST['CardName'];
        $Link = $_POST['Link'];
        $Comment = $_POST['Comment'];
        $CardType = $_POST['CardType'];
        $query = "INSERT INTO smallcardpictures( CardName, Link, Comment, CardType)                   
                  VALUES ( :CardName, :Link, :Comment, :CardType)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':CardName', $CardName);
        $pdostmt->bindValue(':Link', $Link);
        $pdostmt->bindValue(':Comment', $Comment);
        $pdostmt->bindValue(':CardType', $CardType);
        $pdostmt->execute();
        $pdostmt->closeCursor();

    }


}



























