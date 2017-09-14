<?php
class CountryClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getCountry()
    {
        $sql = "SELECT DISTINCT CName FROM country";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $Country = $stm->fetchAll();
        return $Country;
    }
    public function getProvinceinCountry($CName)
    {
        $sql = "SELECT DISTINCT Province FROM country where CName = :CName";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':CName', $CName, PDO::PARAM_STR);
        $stm->execute();
        $Province = $stm->fetchAll();
        return $Province;
    }
    public function getCityInProv($Province)
    {
        $sql = "SELECT City FROM country where Province = :Province";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(':Province', $Province, PDO::PARAM_STR);
        $stm->execute();
        $City = $stm->fetchAll();
        return $City;
    }
}