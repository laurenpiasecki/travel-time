<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_CountryClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$mycountry = new CountryClass($db);
$country = $mycountry->getCountry();
$jcountry = json_encode($country);
header("Content-Type: application/json");
echo $jcountry;