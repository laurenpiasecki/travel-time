<?php
include_once "classes/Dbconnect.php";
class midhu_validation_class
{

    public function midhu_sender_email_validation_function()
    {

        if(isset($_POST['cart']))
        {

            $semail = $_POST['SenderEmail'];

            if (empty($semail)) {
                $msg = "Please enter a valid email";
            } else if (filter_input(INPUT_POST, 'SenderEmail', FILTER_VALIDATE_EMAIL)) {
                $msg = "";
            } else {
                $msg = "Invalid email";
            }
            return $msg;


        }

    }


    public function midhu_receiver_email_validation_function()
    {

        if(isset($_POST['cart']))


        {
            $check = $_POST['postalcode'];
            if (strlen($check)< 1 ){


                $remail = $_POST['ReceiverEmail'];

                if (empty($remail)) {
                    $msg = "Please enter a valid email";
                } else if (filter_input(INPUT_POST, 'ReceiverEmail', FILTER_VALIDATE_EMAIL)) {
                    $msg = "";
                } else {
                    $msg = "Invalid email";
                }
                return $msg;
            }
        }

    }

    public function midhu_confirmation_email_validation_function()
    {

        if(isset($_POST['cart']))
        {
            $check = $_POST['postalcode'];
            if (strlen($check)< 1 ){

                $remail = $_POST['CEmail'];

                if (empty($remail)) {
                    $msg = "Please enter a valid email";
                } else if (filter_input(INPUT_POST, 'ReceiverEmail', FILTER_VALIDATE_EMAIL)) {
                    $msg = "";
                } else {
                    $msg = "Invalid email";
                }
                return $msg;
            }
        }

    }





    public function midhu_card_selection_function()
    {

        if (isset($_POST['cart']))
        {
            $cname = $_POST['cardname'];

            if (empty($cname))
            {
                $msg = "Please select a card";
            } else
            {
                $msg = "";
            }
            return $msg;
        }


    }
    public function midhu_currency_check_function()
    {
        if (isset($_POST['cart']))
        {
            $val = $_POST['value1'];
            $num = (int)$val;


            if (is_numeric($num) && $num > 0 && $num == round($num, 0))
            {
                $msg = "";
            } else
            {
                $msg = "Please enter a valid amount";
            }
            return $msg;
        }
    }


    public function midhu_sender_name_check_function()
    {
        if (isset($_POST['cart']))
        {
            $sname = $_POST['sname'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $sname)) {
                $msg = "Please enter your name";
            }
            else{$msg = "";}

            return $msg;
        }
    }

    public function midhu_receiver_name_check_function()
    {
        if (isset($_POST['cart']))
        {
            $sname = $_POST['rname'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $sname)) {
                $msg = "Please enter recepient name";
            }
            else{$msg = "";}
            return $msg;
        }
    }


    public function midhu_postalcode_check_function()
    {
        if (isset($_POST['cart'])) {

            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {

                $pcode = $_POST['postalcode'];
                $pattern = $pattern = "/^[A-Za-z0-9]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


                if (!preg_match($pattern, $pcode)) {
                    $msg = "Please enter a postal code";
                } else {
                    $msg = "";
                }

                return $msg;
            }
        }
    }
    public function midhu_address1_check_function()
    {
        if (isset($_POST['cart'])) {
            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {
                $add1 = $_POST['address1'];
                $pattern = $pattern = "/^[A-Za-z0-9]{1,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


                if (!preg_match($pattern, $add1)) {
                    $msg = "Please enter an address";
                } else {
                    $msg = "";
                }

                return $msg;
            }
        }
    }
    public function midhu_address2_check_function()
    {
        if (isset($_POST['cart'])) {
            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {
                $add2 = $_POST['address1'];
                $pattern = $pattern = "/^[A-Za-z0-9]{1,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


                if (!preg_match($pattern, $add2)) {
                    $msg = "Please enter an address";
                } else {
                    $msg = "";
                }

                return $msg;
            }
        }
    }

    public function midhu_province_check_function()
    {
        if (isset($_POST['cart'])) {
            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {


                if (empty($_POST['Province']))
                {
                    $msg = "Please enter a province";
                } else {
                    $msg = "";
                }

                return $msg;

            }
        }
    }
    public function midhu_city_check_function()
    {
        if (isset($_POST['cart'])) {
            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {

                if (empty($_POST['City']))
                {
                    $msg = "Please enter a city";
                } else {
                    $msg = "";
                }

                return $msg;
            }
        }
    }
    public function midhu_country_check_function()
    {
        if (isset($_POST['cart'])) {
            $check = $_POST['ReceiverEmail'];
            if (strlen($check) < 1) {
                $country = $_POST['CName'];
                if (empty($_POST['CName']))
                {
                    $msg = "Please enter a country";
                } else {
                    $msg = "";
                }

                return $msg;
            }
        }
    }
    public function midhu_email_match_validation_function()
    {
        if (isset($_POST['cart']))
        {
            $check1 = $_POST['ReceiverEmail'];
            $check2 = $_POST['CEmail'];
            if ($check1 == $check2 )
                {
                    $msg = "";
                } else
                {
                    $msg = "Emails not match";
                }

                return $msg;
         }
    }

    public function midhu_date_validation_function()
    {
        if (isset($_POST['cart']))
        {
            date_default_timezone_set("America/New_York");
            $check1 = $_POST['DeliveryDate'];
            $check2 = date('m/d/Y', strtotime($check1 . ' +0 day'));
            $check3 = date("m/d/Y");
            if ($check2 < $check3 )
            {
                $msg = "Date cannot be in the past";
            }
            else
            {
                $msg = "";
            }
            return $msg;
        }
    }







}
?>






