<?php
include_once "classes/Dbconnect.php";
class midhu_agentvalidation_class
{

    public function midhu_agent_firstname_validation_function()
{

    if(isset($_POST['contact']))
    {

        $fname = $_POST['fname'];
        $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


        if (!preg_match($pattern, $fname)) {
            $msg = "Please enter a valid first name ";
        }
        else{$msg = "";}

        return $msg;



    }

}

    public function midhu_agent_lastname_validation_function()
    {

        if(isset($_POST['contact']))
        {

            $lname = $_POST['lname'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $lname)) {
                $msg = "Please enter a valid last name ";
            }
            else{$msg = "";}

            return $msg;



        }

    }
    public function midhu_agent_origin_validation_function()
    {

        if(isset($_POST['contact']))
        {

            $origin = $_POST['origin'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $origin)) {
                $msg = "Please enter a valid origin ";
            }
            else{$msg = "";}

            return $msg;



        }

    }
    public function midhu_agent_destination_validation_function()
    {

        if(isset($_POST['contact']))
        {

            $destination = $_POST['destination'];
            $pattern = $pattern = "/^[A-Za-z]{3,31}+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/";


            if (!preg_match($pattern, $destination)) {
                $msg = "Please enter a valid destination ";
            }
            else{$msg = "";}

            return $msg;



        }

    }


public function midhu_phone_check_function()
{
    if (isset($_POST['contact'])) {


        $phoneno = $_POST['phoneno'];
        $pattern = $pattern = "/^((\\+[1-9]{1,4}[ \\-]*)|(\\([0-9]{2,3}\\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/";


        if (!preg_match($pattern, $phoneno)) {
            $msg = "Please enter a valid phone number";
        } else {
            $msg = "";
        }

        return $msg;

    }

}





public function midhu_agent_email_check_function()
{
if (isset($_POST['contact'])) {

    $SenderEmail = $_POST['SenderEmail'];

if (empty($SenderEmail)) {
$msg = "Please enter a valid email";
} else if (filter_input(INPUT_POST, 'SenderEmail', FILTER_VALIDATE_EMAIL)) {
    $msg = "";
} else {
    $msg = "Invalid email";
}
return $msg;
}

}


    public function midhu_agent_subject_check_function()
    {
        if (isset($_POST['contact'])) {

            $subject = $_POST['subject'];


            $pattern = $pattern = "/^[A-Za-z0-9]{2,1000}+((\s)?((\'|\-|\.)?([A-Za-z0-9])+))*$/";


            if (!preg_match($pattern, $subject)) {
                $msg = "Please enter a subject";
            } else {
                $msg = "";
            }

            return $msg;

        }
    }


public function midhu_agent_message_check_function()
{
    if (isset($_POST['contact'])) {

        $message = $_POST['message'];


        $pattern = $pattern = "/^[A-Za-z0-9]{2,1000}+((\s)?((\'|\-|\.)?([A-Za-z0-9])+))*$/";


        if (!preg_match($pattern, $message)) {
            $msg = "Please enter a message";
        } else {
            $msg = "";
        }

        return $msg;

    }
}


    public function midhu_agent_date1_validation_function()
    {
        if (isset($_POST['contact']))
        {
            date_default_timezone_set("America/New_York");
            $check1 = $_POST['StartDate'];
            $check2 = date('m/d/Y', strtotime($check1 . ' +0 day'));
            $check3 = date("m/d/Y");
            if ($check2 < $check3 )
            {
                $msg = "Start date cannot be in the past";
            }
            else
            {
                $msg = "";
            }
            return $msg;
        }
    }
    public function midhu_agent_date2_validation_function()
    {
        if (isset($_POST['contact']))
        {
            date_default_timezone_set("America/New_York");
            $check1 = $_POST['ReturnDate'];
            $checks = $_POST['StartDate'];
            $check2 = date('m/d/Y', strtotime($check1 . ' +0 day'));
            $check4 = date('m/d/Y', strtotime($checks . ' -1 day'));
            $check3 = date("m/d/Y");

            if ($check4 > $check1 )
            {
                $msg = "Return date cannot be less than start date";
            }
            else if ($check2 < $check3 )
            {
                $msg = "Return date cannot be in the past";
            }
            else if ($check4 <= $check1 )
            {
                $msg = "";
            }

            return $msg;
        }
    }

}
?>






