<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_CityClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$mycity = new CityClass($db);
$city = $mycity->getCity();
$jcity = json_encode($city);
header("Content-Type: application/json");
echo $jcity;