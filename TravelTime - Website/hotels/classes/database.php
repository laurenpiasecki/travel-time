<?php
class database {

    private static $dsn = 'mysql:host=localhost;dbname=gursewak_traveltime';
    private static $username = 'gursewak_admin';
    private static $password = 'phpTeam';
    //reference to db connection
    private static $db;

    //return reference to pdo object
    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}

//Datebase::getDB();
?>