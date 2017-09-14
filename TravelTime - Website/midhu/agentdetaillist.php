<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_country_select.php";
include_once "classes/midhu_validation_class.php";
include_once "classes/midhuPicSelectClass.php";
include_once "classes/midhu_agent_select.php";
include_once "classes/midhu_agentvalidation_class.php";
include_once "classes/midhu_agentcontact_insert.php";


session_start();

$Id2 = $_SESSION['passedid'];

if (isset($_POST['contact'])) {
    $objv = new  midhu_agentvalidation_class();
    $agentfirstnamevalidation = $objv->midhu_agent_firstname_validation_function();
    $agentlastnamevalidation = $objv->midhu_agent_lastname_validation_function();
    $agentorginvalidation = $objv->midhu_agent_origin_validation_function();
    $agentdestinationvalidation = $objv->midhu_agent_destination_validation_function();
    $agentphonevalidation = $objv->midhu_phone_check_function();
    $agentemailvalidation = $objv->midhu_agent_email_check_function();
    $agentmessagevalidation = $objv->midhu_agent_message_check_function();
    $agentsubjectvalidation = $objv->midhu_agent_subject_check_function();
    $agentdate1validation = $objv->midhu_agent_date1_validation_function();
    $agentdate2validation = $objv->midhu_agent_date2_validation_function();
    $fnameerrorlength = strlen($agentfirstnamevalidation);
    $lnameerrorlength = strlen($agentlastnamevalidation);
    $orginerrorlength = strlen($agentorginvalidation);
    $destinationerrorlength = strlen($agentdestinationvalidation);
    $phoneerrorlength = strlen($agentphonevalidation);
    $emailerrorlength = strlen($agentemailvalidation);
    $messageerrorlength = strlen($agentmessagevalidation);
    $subjecterrorlength = strlen($agentsubjectvalidation);
    $date1errorlength = strlen($agentdate1validation);
    $date2errorlength = strlen($agentdate2validation);
    if ($fnameerrorlength == 0 && $lnameerrorlength ==0 && $orginerrorlength ==0 && $destinationerrorlength ==0 &&
        $phoneerrorlength ==0 && $emailerrorlength ==0 && $messageerrorlength ==0 && $subjecterrorlength ==0 &&
        $date1errorlength ==0 && $date2errorlength ==0)
    {
        $obj = new midhu_agentcontact_insert();
        $rows = $obj->insert_contact_function($Id2);
        ?>
        <script>
            alert ("Thanking for your contacting us");
        </script> <?php
    }
    else
    {?>
        <script>
            alert ("Please fill the required fields");
        </script> <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Travel Time</title>
    <?php include_once "midhu_script.php"?>
</head>
<body onload="myFunction()">
<header id="header">
    <link rel="stylesheet" href="styles/agent.css">
    <?php include_once "../header.php"?>
</header>
<div class ="page-wrapper">
    <form  action="" method="post">
        <?php
        $obj = new midhu_agent_select();
        $rows = $obj->select_agentdetails_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="box">
        <div  class="agentdetails row">
            <div class="col-sm-4"> <img src="<?php echo $row->Picture;?>" width="300px" height="370px"> </div>
            <div  class="col-sm-1 details try">
            </div>
            <div  class="col-sm-6 details try">
                    <div class="row ">
                    <p>Name: </p><?php echo $row->FirstName;?> <?php echo $row->LastName;?>
                    </div>
                    <div class="row">
                    <p>Location: </p>  <?php echo $row->City;?>
                    </div>
                    <div class="row">
                        <p>Countries Travelled:</p> <?php echo $row->Country;?>
                    </div>
                    <div class="row">
                        <p>Languages Known: </p>   <?php echo $row->Languages;?>
                    </div>
                    <div class="row">
                        <p>Phone:  </p>  <?php echo $row->Phone;?>
                    </div>

                    <div class="row">
                        <p>Email:  </p>  <?php echo $row->Email;?>
                    </div>
                    <div class="row">
                        <p>Store Address:</p>    <?php echo $row->Store;?>
                    </div>
                    <div class="row">
                        <p>Favourite Destination:  </p>  <?php echo $row->FavouriteDestination;?>
                    </div>
                    <div class="row">
                        <p>Favourite Airline:</p>    <?php echo $row->FavouriteAirline;?>
                    </div>
                    <div class="row">
                        <p>Specialty: </p>   <?php echo $row->Specialty?>
                    </div>
            </div>
        </div>
        <div class="amount-selector  clearfix">
            <h3>Contact <?php echo $row->FirstName;?> <?php echo $row->LastName;?></h3>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_sname" class="control-label  requiredField">
                                First Name<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_fname"  name="fname" type="text" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
                            </div>
                            <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg" ><span><?php echo $agentfirstnamevalidation ?></span></div>
                            <?php } ?>


                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_sname" class="control-label  requiredField">
                                Last Name<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_lname"  name="lname" type="text" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>">
                            </div>

                            <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg" ><span><?php echo  $agentlastnamevalidation ?></span></div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_semail" class="control-label  requiredField">
                                Origin<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="emailinput form-control" id="id_origin"  name="origin" type="text" value="<?php echo isset($_POST['origin']) ? $_POST['origin'] : '' ?>"/>
                            </div>
                                <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg"><span><?php echo  $agentorginvalidation ?></span></div>
                                <?php } ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_sname" class="control-label  requiredField">
                                Destination<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_destination"  name="destination" type="text" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : '' ?>">
                            </div>
                            <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg" ><span><?php echo $agentdestinationvalidation ?></span></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_sname" class="control-label  requiredField">
                                Phone No
                            </label>
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_phoneno"  name="phoneno" type="text" value="<?php echo isset($_POST['phoneno']) ? $_POST['phoneno'] : '' ?>">
                            </div>
                            <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg" ><span><?php echo $agentphonevalidation ?></span></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_semail" class="control-label  requiredField">
                                Your Email Address<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="emailinput form-control" id="id_email"  name="SenderEmail" type="text" value="<?php echo isset($_POST['SenderEmail']) ? $_POST['SenderEmail'] : '' ?>"/>

                            </div>
                            <?php if (isset($_POST['contact'])) { ?>
                                <div Id="errmsg" ><span><?php echo $agentemailvalidation ?></span></div>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_Ddate" class="control-label  requiredField">
                                Start Date<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                <link rel="stylesheet" href="/resources/demos/style.css">
                                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                                <input class="textinput textInput form-control" type="text" name="StartDate" id="calendar" style="width:320px; placeholder="Select Date" value="<?php echo isset($_POST['StartDate']) ? $_POST['StartDate'] : '' ?>" readonly=""/ >

                                <script>
                                    $( function() {
                                        $( "#calendar" ).datepicker();
                                    } );
                                </script>

                                <?php if (isset($_POST['contact'])) { ?>
                                    <div Id="errmsg" ><span><?php echo $agentdate1validation ?></span></div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_Ddate" class="control-label  requiredField">
                                Return date<span class="asteriskField">*</span>
                            </label>
                            <div class="controls ">
                                <input class="textinput textInput form-control" type="text" name="ReturnDate" id="calendar2" style="width:320px; placeholder="Select Date" value="<?php echo isset($_POST['ReturnDate']) ? $_POST['ReturnDate'] : '' ?>" readonly=""/ >
                                <?php if (isset($_POST['contact'])) { ?>
                                    <div Id="errmsg" ><span><?php echo $agentdate2validation ?></span></div>
                                <?php } ?>

                                <script>
                                    $( function() {
                                        $( "#calendar2" ).datepicker();
                                    } );
                                </script>



                            </div>
                        </div>
                    </div>

                </div>
        </div>


            <div class="amount-selector  clearfix">
                <h3>Message</h3>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Subject<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_subject"  name="subject" type="text" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                        <?php if (isset($_POST['contact'])) { ?>
                            <div Id="errmsg" ><span><?php echo $agentsubjectvalidation ?></span></div>
                        <?php } ?>
                    </div>
                </div>




                <div id="div_id_message" class="form-group">
                    <div class="controls ">
                        <textarea class="textarea form-control msgbox" onkeyup="countChar(this)" cols="40" id="id_message" maxlength="1000" name="message" rows="10" value="<?php echo isset($_POST['message']) ? $_POST['message'] : '' ?>"></textarea>
                    </div>

                    <script>
                        function myFunction()
                        {
                            $('#charNum').text(1000);
                        }
                    </script>
                    <div id="charactersremaining">
                        <p>Character Limit: 1000    Characters remaining: <span Id="charNum"></span></p>
                    </div>
                    <?php if (isset($_POST['contact'])) { ?>
                        <div Id="errmsg" ><span><?php echo $agentmessagevalidation ?></span></div>
                    <?php } ?>


                </div>
            </div>
            <input type="submit" name="contact" class="button" value="Send my Enquiry">

        </div>

<?php
        }?>
    </form>

</div>
<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
    <?php include_once "../footer.php" ?>
</footer>

</body>


</html>

