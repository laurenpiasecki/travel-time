<?php
session_start();

include("config.php");

if( (!isset($_SESSION['user']) OR empty($_SESSION['user'])) AND $_SERVER['REQUEST_URI'] != '/login.php') {
    header("Location: login.php");
}

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT ID FROM user_info WHERE username = '$username' AND password = '$password'";

if ($result = $db->query($query)) {
while ($user = $result->fetch_object()) {
$_SESSION['user'] = $user->ID;
header("Location: index.php");
}
}
else {
header("Location: login.php");
}