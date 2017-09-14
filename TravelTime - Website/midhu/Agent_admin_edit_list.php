<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_agent_select2.php";
include_once "classes/midhu_admin_agent_edit.php";


session_start();

$Id2 = $_SESSION['passedid'];


if (isset($_POST['editsubmit']))
{

    $obj = new midhu_admin_agent_edit();
    $rows = $obj->select_agent_edit_function($Id2);

    ?>
    <script>
        alert ("Record Updated");
    </script> <?php


}
if (isset($_POST['backtolist']))
{
    header("Location: Agent_Admin.php");

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


<div class="container">




    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->

        <div class="col-sm-9 col-md-10 admin_body">




<div class ="page-wrapper">
    <form  action="" method="post">
        <?php
        $obj = new midhu_admin_agent_select2();
        $rows = $obj->select_agent_details_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">

            </div>


            <div class="col-md-9">
                <h2>Agent Admin Edit</h2>
                <div class="box">

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Id: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Id"  name="Id" type="text" value="<?php echo $row->Id; ?>" readonly=""/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                First Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_fname"  name="fname" type="text" value="<?php echo $row->fname;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Last Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_lname"  name="lname" type="text" value="<?php echo $row->lname;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Origin: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_origin"  name="origin" type="text" value="<?php echo $row->origin;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Destination: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_destination"  name="destination" type="text" value="<?php echo $row->destination;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Phone No: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_phoneno"  name="phoneno" type="text" value="<?php echo $row->phoneno;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Phone No: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_SenderEmail"  name="SenderEmail" type="text" value="<?php echo $row->SenderEmail;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Start Date: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_StartDate"  name="StartDate" type="text" value="<?php echo $row->StartDate;?>">

                                <script>
                                    $( function() {
                                        $( "#id_StartDate" ).datepicker();
                                    } );
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Return Date: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_ReturnDate"  name="ReturnDate" type="text" value="<?php echo $row->ReturnDate;?>">
                                <script>
                                    $( function() {
                                        $( "#id_ReturnDate" ).datepicker();
                                    } );
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Subject: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_subject"  name="subject" type="text" value="<?php echo $row->subject;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Message: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_message1"  name="message1" type="text" value="<?php echo $row->message;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Agent Id: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_agentId"  name="agentId" type="text" value="<?php echo $row->agentId;?>">
                            </div>
                        </div>
                    </div>






                    <div class="row">
                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                        <input type="submit" name="backtolist" class="btn btn-info" value="Back to list" />
                        <input type="submit" name="editsubmit" class="btn btn-primary" value="Save" />
                    </div>

                </div>
             </div>
        </div>

        </div>
        </div>


<?php
        }?>
    </form>

</div>


</div>
<!--***Tours And Create a Tour Tab***********************-->

</div>
</div>




<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
    <?php include_once "../footer.php" ?>
</footer>

</body>


</html>

