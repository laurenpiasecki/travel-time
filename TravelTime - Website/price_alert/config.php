<?php
/*DB connection*/
$h = "localhost";
$u = "gursewak_admin";
$p = 'phpTeam';
$dbname = "gursewak_traveltime";

$connect = mysqli_connect($h, $u, $p)or die("Couldn't connect to mySQL!");
mysqli_select_db($connect, $dbname)or die("Couldn't find database!"); 
 
?>
