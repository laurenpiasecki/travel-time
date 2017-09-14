<?php
include_once "classes/Dbconnect.php";
class midhu_insurance_validation_class
{

    public function midhu_insurance_DepartureCity_validation_function()
    {

        if (isset($_POST['quote'])) {

            $depcity = $_POST['departcity'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $depcity)) {
                $msg = "Please enter a valid City";
            } else {
                $msg = "";
            }

            return $msg;


        }

    }

    public function midhu_insurance_destination_validation_function()
    {

        if (isset($_POST['quote'])) {

            $desti = $_POST['destination'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $desti)) {
                $msg = "Please enter a valid destination ";
            } else {
                $msg = "";
            }

            return $msg;


        }

    }

    public function midhu_insurance_province_validation_function()
    {

        if (isset($_POST['quote'])) {

            $desti = $_POST['Province'];
            $pattern = $pattern = "/^[A-Za-z]{2,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $desti)) {
                $msg = "Please enter a valid province ";
            } else {
                $msg = "";
            }

            return $msg;


        }

    }


    public function midhu_insurance_numberoftravellers_validation_function()
    {

        if (isset($_POST['quote'])) {

            $nooftravellers = $_POST['Number1'];


            if ($nooftravellers == "") {
                $msg = "Please select number of Travellers ";
            } else {
                $msg = "";
            }

            return $msg;


        }

    }

    public function midhu_insurance_name_validation_function()
    {

        if (isset($_POST['quote'])) {

            $desti = $_POST['Name1'];
            $pattern = $pattern = "/^[A-Za-z]{2,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $desti)) {
                $msg = "Please enter a valid name";
            } else {
                $msg = "";
            }

            return $msg;


        }

    }

    public function midhu_insurance_age_validation_function()
    {

        if (isset($_POST['quote'])) {

            $age = $_POST['Age1'];
            $pattern = $pattern = "/^[0-9]*$/";


            if (!preg_match($pattern, $age) || $age ="")
            {
                $msg = "Please enter a valid age";
            }
            else {
                $msg = "";
            }

            return $msg;


        }

    }


    public function midhu_insurance_date1_validation_function()
    {
        if (isset($_POST['quote'])) {
            date_default_timezone_set("America/New_York");
            $check1 = $_POST['DepartureDate'];
            $check2 = date('m/d/Y', strtotime($check1 . ' +0 day'));
            $check3 = date("m/d/Y");
            if ($check2 < $check3) {
                $msg = "Start date cannot be in the past";
            } else {
                $msg = "";
            }
            return $msg;
        }
    }

    public function midhu_insurance_date2_validation_function()
    {
        if (isset($_POST['quote'])) {
            date_default_timezone_set("America/New_York");
            $check1 = $_POST['ReturnDate'];
            $checks = $_POST['DepartureDate'];
            $check2 = date('m/d/Y', strtotime($check1 . ' +0 day'));
            $check4 = date('m/d/Y', strtotime($checks . ' -1 day'));
            $check3 = date("m/d/Y");

            if ($check4 > $check1) {
                $msg = "Return date cannot be less than start date";
            } else if ($check2 < $check3) {
                $msg = "Return date cannot be in the past";
            } else if ($check4 <= $check1) {
                $msg = "";
            }

            return $msg;
        }
    }


}
?>






