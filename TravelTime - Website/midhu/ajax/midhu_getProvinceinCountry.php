<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_CountryClass.php';


$country = $_GET['con'];
$db = midhuDatabaseconnectionajax::getDB();
$myProvince = new CountryClass($db);
$province = $myProvince->getProvinceinCountry($country);
$jprovince = json_encode($province);
header("Content-Type: application/json");
echo $jprovince;
