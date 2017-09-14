<?php
class NumberClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getnumbertype()
    {
        $sql = "SELECT DISTINCT Number FROM nooftraveller";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $Numb = $stm->fetchAll();
        return $Numb;
    }

}