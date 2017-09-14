<?php
session_start();
include('config.php');
include('header.php');
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<img width="100%" class= "img" src="images/wishlist/wishlistheader4.jpg">
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
<?php
/*WISHLIST BOX CODE*/
if(isset($_SESSION["wish_list"]) && count($_SESSION["wish_list"])>0)
{
    echo '<div class="wishlist-view-table-front" id="view-wishlist">';
    echo '<h3><b>Your Wishlist</b></h3>';
    echo '<form method="post" action="wishlist_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';

    foreach ($_SESSION["wish_list"] as $wish_item)
    {
        $name = $wish_item["name"];
        $list_add = $wish_item["list_add"];
        $id = $wish_item["place_id"];
        echo '<tr>';
        echo '<td><b>&nbsp;&nbsp;&nbsp;&nbsp;'.$name.'</b></td>';
        echo '<td><input type="checkbox" name="remove_place[]" value="'.$id.'" />&nbsp;remove</td>';
        echo '</tr>';
    }
    echo '<td colspan="4">';
    echo '<button type="submit" class="button">Update</button><a href="view_list.php" class="button">Save My List</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';

    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';

}
/*END OF WISHLIST SIDEBAR */
?>
<?php
$results = $db->query("SELECT id, name, image FROM wishlist");
if($results){
$wishlists_place = '<ul class="wishlist">';
while ($place = $results->fetch_object())
{
$wishlists_place .= <<<EOT
    <li class="wish-item">
    <form method="post" action="wishlist_update.php">
    <div class="place-name"><h2 style="margin-bottom: -0.75px;letter-spacing:0.5px;">{$place->name}</h2>
    <div class="place-image"><img height="200" width="300" src='{$place->image}'></div>
 
    <fieldset>
    <label style="display: none;">
		<span>Add</span>
		<input type="text" size="2" maxlength="2" name="list_add" value="1" />
	</label>
	</fieldset>
	
	<input type="hidden" name="place_id" value="{$place->id}" />
    <input type="hidden" name="type" value="add" />
    <input type="hidden" name="return_url" value="{$current_url}" />
    <button type="submit" button class="button" class="add_to_list">Add to Wishlist</button>
    </div></div>
    </form>
    </li>
EOT;
}
$wishlists_place .= '</ul>';
echo $wishlists_place;
}
?>
<?php include('footer.php') ?>


