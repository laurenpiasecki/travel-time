<?php

class Testimonials
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new DbConnect();
        $this->db = $this->dbc->getDb();
    }

    /* GETTING TESTIMONIALS*/
    public function getTestimonials(){

        $query = "SELECT * FROM testimonials";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $testimonials = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $testimonials;

    }
}