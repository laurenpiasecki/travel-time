<?php
session_start();
include('config.php');
include('header.php');
if(isset($_GET['uploaded']) AND $_GET['uploaded'] == "true") {
    echo "
<div class='success'>The destination has been added.</div>
";
   }
?>
    <p>&nbsp;</p>
<div class="addplace"
<form method="post" action="script-additem.php" enctype="multipart/form-data">
    <h1>Add a Destination</h1></br>
    <label for="name">Place Name:</label>
    <input id="name" name="name" type="text">
    </br></br>
    <label for="image">Select an Image:</label>
    <input type="file" name="image" id="image">
</br>
    <input type="submit" class="submit" value="Add to List">
<p>&nbsp;</p>
</form>
</div>
<p>&nbsp;</p>

<?php
$query = "SELECT * FROM wishlist";
$result = $db->query($query);

if($result) : while ($place = $result->fetch_object()):
    ?>
    <div class='itemedit'>
        <h3 class='item_name'><?php echo $place->name ?></h3>
    <div class='item_delete'>
    <form method="post" action='script-deleteitem.php'>
            <input type='hidden' name='delete' value='$place->id'>
            <input type='submit' name='deletedestination' value='Delete Destination'>
        </form>
    </div>
    </div>
<?php endwhile; endif; ?>
<?php include('footer.php') ?>