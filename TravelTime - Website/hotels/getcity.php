<?php
require_once 'classes/database.php';
require_once 'classes/hotel.php';


$db = Database::getDB();
$hotel = new Hotel($db);
$city = $hotel->getCity();
$jsoncit = json_encode($city);


$jcity = json_encode($city);

header("Content-Type: application/json");
echo $jcity;