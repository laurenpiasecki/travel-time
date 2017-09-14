<?php
session_start();
include("config.php");

$target_path = $_SERVER['DOCUMENT_ROOT']."/images/";
$target_path = $target_path . basename( $_FILES['file']['name']);
$file_location = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

$query = "INSERT INTO wishlist (name, image) VALUES ('$_POST[name]', '$file_location')";
$result = $db->query($query);

$db->close();
header("Location: admin.php?uploaded=true");