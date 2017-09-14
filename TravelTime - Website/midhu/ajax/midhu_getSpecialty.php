<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_SpecialtyClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$myspecialty = new SpecialtyClass($db);
$specialty = $myspecialty->getSpecialty();
$jspecialty = json_encode($specialty);
header("Content-Type: application/json");
echo $jspecialty;