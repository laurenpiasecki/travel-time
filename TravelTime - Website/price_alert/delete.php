<?php

include("config.php");
$id = $_GET['id'];
$result = mysqli_query($connect, "DELETE FROM price_alerts WHERE id=$id");
header("Location:index.php");


?>

