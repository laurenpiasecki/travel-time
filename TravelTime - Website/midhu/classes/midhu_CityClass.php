<?php
class CityClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getCity()
    {
        $sql = "SELECT DISTINCT City FROM country ORDER BY City";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $City = $stm->fetchAll();
        return $City;
    }

}