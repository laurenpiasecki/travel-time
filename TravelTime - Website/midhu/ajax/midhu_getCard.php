<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_CardClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$mycard = new CardClass($db);
$card = $mycard->getCardtype();
$jcard = json_encode($card);
header("Content-Type: application/json");
echo $jcard;