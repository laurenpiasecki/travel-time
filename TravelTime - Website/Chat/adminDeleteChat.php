<?php session_start(); if(isset($_SESSION['adminName'])){
require_once '../classes/DbConnect.php';
require_once '../classes/TourChat.php';
$chatObj = new TourChat();
$chatDetail = $chatObj->chatDelete($_POST['chatDeleteId']);
header("Location: adminChat.php");}
?>
