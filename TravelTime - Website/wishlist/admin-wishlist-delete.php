<?php

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
    $id = $_GET['id'];
    if ($stmt = $db->prepare("DELETE FROM wishlist WHERE id = ? LIMIT 1"))
    {
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
    else
    {
        echo "ERROR: Destination could not be deleted.";
    }
    $db->close();
    header("Location: admin-wishlist.php");
}
else
{
    header("Location: admin-wishlist.php");
}

?>

