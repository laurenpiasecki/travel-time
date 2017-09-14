<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_NumberClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$mynumber = new NumberClass($db);
$number = $mynumber->getnumbertype();
$jcard = json_encode($number);
header("Content-Type: application/json");
echo $jcard;