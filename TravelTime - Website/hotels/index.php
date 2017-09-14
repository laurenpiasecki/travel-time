<?php include('header.php');
require_once 'classes/database.php';
require_once 'classes/hotel.php';
$db = Database::getDB();
$hotel = new Hotel($db);
$city = $hotel->getCity();

$postback = false;
if(isset($_GET["city"])) {
    $postback = true;
    $city_selected = $_GET["city"];
}
else{
    $city_selected = "";
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recommended Hotels</title>
    <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
<img width="100%" height="375" class="img" src="images/hotels/hotels.jpg" />
<h3 style="font-size:36px;font-family:'Sofia';background:lightsteelblue;margin-top:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recommended Hotels</h3>
<div class="main">
<form action="index.php" method="GET" >
    <div class="dropdown">
    <label for="city" style="font-size: 20px;">Select a City:</label>
        <br />
    <select id="id_city" name="city" style="min-width: 160px;font-size: 16px;
                    background-color: #f1f1f1;padding:0.25em;margin-top: 5px;">
        <?php
        foreach ($city as $cit) :
            ?>
            <option value ="<?php echo $cit['city']; ?>"
                <?php if($cit["city"]==$city_selected)
                    echo "selected";?> >
                <?php echo $cit["city"]?>
            </option>
            <?php
        endforeach;
        ?>
    </select>
    <input type="submit" value="List Hotels" style="padding: 5px 25px;cursor: pointer;
                        text-align: center;color: #fff;background-color: #337ab7; border-radius: 5px;" />
    </div>
</form>
<?php if($postback) : ?>
    <div>
        <h1> Hotels in <?php echo $city_selected ;?>  </h1>
        <?php
        $hotels = $hotel->getHotelInCity($city_selected);
        foreach ($hotels as $hotel) :
            ?>
        <div class="hotels">
            <p><img height="200" width="300" src='<?php echo $hotel["image"];?>'> </p>
            <h2><?php echo $hotel["name"];?> </h2>
                <p><?php echo $hotel["description"];?> </p>
                <p>$<?php echo $hotel["price"];?>.00 / Night</p>
                <p><a href="<?php echo $hotel["link"];?>">Visit Website</a></p>
                <hr />
        </div>
            <?php
        endforeach;
        ?>
    </div>
    <?php
endif;
?>
</div>
</body>
</html>
<?php include('footer.php'); ?>