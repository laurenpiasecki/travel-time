<?php
require_once '../classes/midhuDatabaseconnectionajax.php';
require_once '../classes/midhu_LanguageClass.php';
$db = midhuDatabaseconnectionajax::getDB();
$myLanguage = new LanguageClass($db);
$language = $myLanguage->getLanguage();
$jlanguage = json_encode($language);
header("Content-Type: application/json");
echo $jlanguage;