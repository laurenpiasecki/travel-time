<?php
session_start();
include_once("config.php");
include('header.php');
?>
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    <h1 align="center" style="font-family:'Sofia';padding:0.5em;font-size:38px;letter-spacing: 2px;"><b>Your Wishlist</b></h1>
<div class="wishlist-view-table-back">
    <form method="post" action="wishlist_update.php">
        <table width="100%"  cellpadding="6" cellspacing="0">
            <thead><tr><th>&nbsp;&nbsp;&nbsp;Destination</th><th>Remove</th></tr></thead>
            <tbody>
            <?php
/*CHECK FOR SESSION*/
            if(isset($_SESSION["wish_list"]))
            {
                foreach ($_SESSION["wish_list"] as $wish_item)
                {
                    $name = $wish_item["name"];
                    $list_add = $wish_item["list_add"];
                    $id = $wish_item["place_id"];
                    echo '<tr>';
                    echo '<td><b>&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'</b></td>';
                    echo '<td>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="remove_place[]" value="'.$id.'" /></td>';
                    echo '</tr>';
                }
                }
            ?>
            <tr><td colspan="5"><a href="index.php" class="button">Add More Destinations</a>
                    <button type="submit" class="button">Save Wishlist</button></td></tr>

        </table>
        <input type="hidden" name="return_url" value="<?php
        $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        echo $current_url; ?>" />
    </form>
</div>
<br />
<br />
<br />
<?php include('footer.php') ?>