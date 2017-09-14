<?php session_start(); if(isset($_SESSION['adminName'])){
if(isset($_POST['updateTour'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    echo $tour_id = $_POST['admin__tour_id'];

    if (empty(test_input($_POST['admin__tour_name']))) {
        $errorName = "*Tour name is required";
        $errorImage = "";
    } else {
        $tour_name = test_input($_POST['admin__tour_name']);
    }

    if (empty(test_input($_POST['admin__tour_from']))) {
        $errorFrom = "*From place is required";
        $errorImage = "";
    } else {
        $tour_from = test_input($_POST['admin__tour_from']);
    }

    if (empty(test_input($_POST['admin__tour_to']))) {
        $errorTo = "*To place is required";
        $errorImage = "";
    } else {
        $tour_to = test_input($_POST['admin__tour_to']);
    }

    if (empty(test_input($_POST['admin__tour_type']))) {
        $errorType = "*Tour type is required";
        $errorImage = "";
    } else {
        $tour_type = test_input($_POST['admin__tour_type']);
    }

    if (empty(test_input($_POST['admin__tour_start-date']))) {
        $errorStartDate = "*Tour start date is required";
        $errorImage = "";
    } else {
        $tour_startDate = test_input($_POST['admin__tour_start-date']);
    }

    if (empty(test_input($_POST['admin__tour_return-date']))) {
        $errorReturnDate = "*Tour return date is required";
        $errorImage = "";
    } else {
        $tour_returnDate = test_input($_POST['admin__tour_return-date']);
    }

    if (empty(test_input($_POST['admin__tour_desc']))) {
        $errorDesc = "*Tour Description is required";
        $errorImage = "";
    } else {
        $tour_desc = test_input($_POST['admin__tour_desc']);
    }

    if (empty(test_input($_POST['admin__tour_days']))) {
        $errorDays = "*Tour days is required";
        $errorImage = "";
    } else {
        $tour_days = test_input($_POST['admin__tour_days']);
    }

    if (empty(test_input($_POST['admin__tour_price']))) {
        $errorPrice = "*Tour price is required";
        $errorImage = "";
    } else {
        $tour_price = test_input($_POST['admin__tour_price']);
    }
    $tour_popular = $_POST['admin__tour_popular'];

    /*echo $tour_name  = $_POST['admin__tour_name'];
    echo $tour_from  = $_POST['admin__tour_from'];
    echo $tour_to  = $_POST['admin__tour_to'];
    echo $tour_type  = $_POST['admin__tour_type'];
    echo $tour_startDate  = $_POST['admin__tour_start-date'];
    echo $tour_returnDate  = $_POST['admin__tour_return-date'];
    echo $tour_desc  = $_POST['admin__tour_desc'];
    echo $tour_days  = $_POST['admin__tour_days'];
    echo $tour_price  = $_POST['admin__tour_price'];*/
    echo $tour_oldImage = $_POST['admin__tour_oldImage'];
//get the variable values in superglobles $_FILES array
    if (isset($_FILES['admin__tour_image']["size"]) &&
        ($_FILES['admin__tour_image']["size"] > 0)
    ) {
//path of the file in temp directory

        $file_temp = $_FILES['admin__tour_image']['tmp_name'];
//original path and file name of the uploaded file
        $file_name = $_FILES['admin__tour_image']['name'];
//size of the uploaded file in bytes
        $file_size = $_FILES['admin__tour_image']['size'];
//type of the file(if browser provides)
        $file_type = $_FILES['admin__tour_image']['type'];
//error number
        $file_error = $_FILES['admin__tour_image']['error'];

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
            $fileName = uniqid() . $_FILES['admin__tour_image']['name'];
            $target_path = $target_path . $fileName;
            /*   echo '<br/>'.$fileName.'<br/>';
               echo $target_path;*/
//
////move the uploaded file from tempe path to taget path
            if (move_uploaded_file($_FILES['admin__tour_image']['tmp_name'], $target_path)) {
               /* if (file_exists($tour_oldImage)) {
                    unlink($tour_oldImage);
                    echo 'File '.$tour_oldImage.' has been deleted';
                }*/
            } else {
                $errorImage = "There was an error uploading the file, please try again!";
            }
        }
    } else {
        $fileName = $tour_oldImage;
    }
    if (!isset($errorImage)) {
        require_once '../classes/DbConnect.php';
        require_once '../classes/Tours.php';
        $tourObj = new Tours();
        $tourUpdated = $tourObj->updateTour($tour_id, $tour_name, $tour_from, $tour_to, $tour_type, $tour_startDate, $tour_returnDate, $tour_desc, $tour_days, $tour_price, $fileName, $tour_popular);
        require_once 'adminTourDetail.php';
    }
    else {
        include_once "../header.php";
        require_once '../classes/DbConnect.php';
        require_once '../classes/Tours.php';
        $tourObj = new Tours();
        $tourDetail = $tourObj->tourDetail($tour_id);
        require_once 'adminEditTour.php';
    }
}}
?>