<?php
class CardClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getCardtype()
    {
        $sql = "SELECT DISTINCT CName FROM gifttype";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $Cardtp = $stm->fetchAll();
        return $Cardtp;
    }

}