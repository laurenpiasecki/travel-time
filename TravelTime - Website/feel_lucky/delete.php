<?php

include("config.php");
$id = $_GET['id'];
$result = mysqli_query($connection, "DELETE FROM spec_table WHERE id=$id");
header("Location:admin.php");


?>

