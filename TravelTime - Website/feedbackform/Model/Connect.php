<?php

/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/9/2017
 * Time: 1:44 PM
 */
class Connect
{
     private $dsn="mysql:host=localhost;dbname=gursewak_traveltime";
    private $username="gursewak_admin";
    private $password='phpTeam';
    private $pdoConn;

    public function connectDb(){
        if(!isset($pdoConn)){
            try{
                $this->pdoConn = new PDO($this->dsn,$this->username,$this->password);
                $this->pdoConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//                echo "connected";
            }
            catch (PDOException $e){
                echo $e->getCode();
                echo $e->getMessage();
//                echo "not connected";
            }
            return $this->pdoConn;
        }
    }
}
