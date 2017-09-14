<?php
class LanguageClass
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getLanguage()
    {
        $sql = "SELECT DISTINCT LanguageName FROM  language";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $Language = $stm->fetchAll();
        return $Language;
    }

}