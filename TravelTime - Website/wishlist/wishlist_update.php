<?php
session_start();
include_once("config.php");

/*CREATE NEW SESSION OR ADD PLACE TO SESSION*/
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["list_add"]>0)
{
    foreach($_POST as $key => $value){ //add all post vars to new array
        $new_destination[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    unset($new_destination['type']);
    unset($new_destination['return_url']);

    $statement = $db->prepare("SELECT name FROM wishlist WHERE id=? LIMIT 1");
    $statement->bind_param('i', $new_destination['place_id']);
    $statement->execute();
    $statement->bind_result($name);

    while($statement->fetch()){

/*FETCH PLACE FROM DB AND ADD TO ARRAY*/
        $new_destination["name"] = $name;

        if(isset($_SESSION["wish_list"])){  //if session already exist
            if(isset($_SESSION["wish_list"][$new_destination['place_id']])) //check if item already exists in products array
            {
                unset($_SESSION["wish_list"][$new_destination['place_id']]); //unset old array item
            }
        }
        $_SESSION["wish_list"][$new_destination['place_id']] = $new_destination; //update or create product session with new item
    }
}


/*UPDATE OR REMOVE PLACE*/
if(isset($_POST["list_add"]) || isset($_POST["remove_place"]))
{
    /*UPDATE WISHLIST*/
    if(isset($_POST["list_add"]) && is_array($_POST["list_add"])){
        foreach($_POST["list_add"] as $key => $value){
            if(is_numeric($value)){
                $_SESSION["wish_list"][$key]["list_add"] = $value;
            }
        }
    }
    /*REMOVE PLACE*/
    if(isset($_POST["remove_place"]) && is_array($_POST["remove_place"])){
        foreach($_POST["remove_place"] as $key){
            unset($_SESSION["wish_list"][$key]);
        }
    }
}

$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):'';
header('Location:'.$return_url);

?>