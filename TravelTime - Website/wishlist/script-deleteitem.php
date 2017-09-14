<?php
session_start();
include('config.php');

if(isset($_POST['deletedestination'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM wishlist WHERE id = $id";
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }
    $db->close();
    header("Location: admin.php");
}