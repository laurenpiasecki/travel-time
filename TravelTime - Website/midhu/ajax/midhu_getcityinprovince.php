<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_CountryClass.php';


$province = $_GET['pro'];
$db = midhuDatabaseconnectionajax::getDB();
$myCity = new CountryClass($db);
$City = $myCity->getCityInProv($province);
$jcity = json_encode($City);
header("Content-Type: application/json");
echo $jcity;
