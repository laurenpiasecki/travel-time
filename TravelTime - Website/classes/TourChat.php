<?php

class TourChat
{
    private $dbc;
    private $db;
    public function __construct()
    {
        $this->dbc = new DbConnect();
        $this->db = $this->dbc->getDb();
    }

    public function insertChat($user_name, $chat_time, $msg) {

        $query = "INSERT INTO chat(user_name, chat_time, msg) 
                  VALUES (:user_name, :chat_time, :msg)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
        $pdostmt->bindValue(':chat_time', $chat_time, PDO::PARAM_STR);
        $pdostmt->bindValue(':msg', $msg, PDO::PARAM_STR);
        $pdostmt->execute();
        $pdostmt->closeCursor();

    }

    public function chatDetail(){

        $query = "SELECT * FROM chat ORDER BY id DESC";
        $pdostmt = $this->db->prepare($query);

        $pdostmt->execute();
        $chatDetail = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $chatDetail;

    }
    public function chatDelete($id){
        $query = "DELETE FROM chat WHERE id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $pdostmt->closeCursor();
    }

}