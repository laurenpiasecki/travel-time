<?php
class SpecialtyClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getSpecialty()
    {
        $sql = "SELECT DISTINCT SpecialtyName FROM  specialty";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $Specialty = $stm->fetchAll();
        return $Specialty;
    }

}