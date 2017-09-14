<?php
session_start();
include("config.php");

// prepare and bind
$stmt = $db->prepare("INSERT INTO wishlist (name, image) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['name'], $file_location);
$stmt->execute();
$stmt->close();
$db->close();
