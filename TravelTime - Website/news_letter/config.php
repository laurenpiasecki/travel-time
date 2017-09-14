<?php
$h = "localhost";
$u = "gursewak_admin";
$p = 'phpTeam';
$dbname = "gursewak_traveltime";

$connection = mysqli_connect($h, $u, $p)or die("Couldn't connect to mySQL!");
mysqli_select_db($connection, $dbname)or die("Couldn't find database!"); 
 
?>
