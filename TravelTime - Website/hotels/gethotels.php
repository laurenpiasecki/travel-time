<?php
require_once 'classes/database.php';
require_once 'classes/hotel.php';

$db = Database::getDB();
$myhotel= new Hotel($db);
$hotels = $myhotel->getHotels();

$jhotels = json_encode($hotels);

header("Content-Type: application/json");
echo $jhotels;