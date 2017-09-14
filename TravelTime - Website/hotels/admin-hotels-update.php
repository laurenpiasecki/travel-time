<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/hotel.php';

if(isset($_POST['updateHotel'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    echo $hotel_id = $_POST['admin__hotel_id'];

    if (empty(test_input($_POST['admin__hotel_name']))) {
        $errorName = "*Hotel name is required";
        $errorImage = "";
    } else {
        $hotel_name = test_input($_POST['admin__hotel_name']);
    }

    if (empty(test_input($_POST['admin__hotel_description']))) {
        $errorDescription = "*Hotel description is required";
        $errorImage = "";
    } else {
        $hotel_desc = test_input($_POST['admin__hotel_description']);
    }

    if (empty(test_input($_POST['admin__hotel_price']))) {
        $errorPrice = "*Hotel price is required";
        $errorImage = "";
    } else {
        $hotel_price = test_input($_POST['admin__hotel_price']);
    }

    if (empty(test_input($_POST['admin__hotel_link']))) {
        $errorLink = "*Hotel link is required";
        $errorImage = "";
    } else {
        $hotel_link = test_input($_POST['admin__hotel_link']);
    }

    echo $tour_oldImage = $_POST['admin__tour_oldImage'];
//get the variable values in superglobles $_FILES array
    if (isset($_FILES['admin__hotel_image']["size"]) &&
        ($_FILES['admin__hotel_image']["size"] > 0)
    ) {
//path of the file in temp directory
        $file_temp = $_FILES['admin__hotel_image']['tmp_name'];
//original path and file name of the uploaded file
        $file_name = $_FILES['admin__hotel_image']['name'];
//size of the uploaded file in bytes
        $file_size = $_FILES['admin__hotel_image']['size'];
//type of the file(if browser provides)
        $file_type = $_FILES['admin__hotel_image']['type'];
//error number
        $file_error = $_FILES['admin__hotel_image']['error'];

        /*echo $file_temp . "<br />";
        echo $file_name . "<br />";
        echo $file_size . "<br />";
        echo $file_type . "<br />";
        echo $file_error . "<br />";*/
        if ($file_error > 0) {

            switch ($file_error) {
                case 1:
                    $errorImage = "File exceeded upload_max_filesize.";
                    break;
                case 2:
                    $errorImage = "File exceeded max_file_size";
                    break;
                case 3:
                    $errorImage = "File only partially uploaded.";
                    break;
                case 4:
                    $errorImage = "No file uploaded.";
                    break;
            }

        }


        if ($file_error < 1) {
            $max_file_size = 200000;
            if ($file_size > $max_file_size) {
                $errorImage = "file size too big";

            }

//folder to move the uploaded file
            $target_path = "images/";
            $fileName = uniqid() . $_FILES['admin__hotel_image']['name'];
            $target_path = $target_path . $fileName;
            /*   echo '<br/>'.$fileName.'<br/>';
               echo $target_path;*/
//
////move the uploaded file from tempe path to taget path
            if (move_uploaded_file($_FILES['admin__hotel_image']['tmp_name'], $target_path)) {
                /* if (file_exists($tour_oldImage)) {
                     unlink($tour_oldImage);
                     echo 'File '.$tour_oldImage.' has been deleted';
                 }*/
            } else {
                $errorImage = "There was an error uploading the file, please try again.";
            }
        }
    } else {
        $fileName = $hotel_oldImage;
    }
    if (!isset($errorImage)) {
        require_once 'classes/database.php';
        require_once 'classes/hotel.php';
        $hotelObj = new Hotel();
        $hotelUpdated = $hotelObj->updateHotel($hotel_id, $hotel_name, $hotel_desc, $hotel_price, $hotel_link, $fileName);
        require_once 'admin-hotels-details.php';
    }
    else {
        include_once "header.php";
        require_once 'classes/database.php';
        require_once 'classes/hotel.php';
        $hotelObj = new Hotel();
        $hotelDetail = $hotelObj->hotelDetail($hotel_id);
        require_once 'admin-hotels-edit.php';
    }
}
?>