<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_agent_edit.php";
include_once "classes/midhu_admin_agent_select2.php";
include_once "classes/midhu_agentcontact_admin_delete.php";





session_start();
$Id2 = $_SESSION['passedid'];
if (isset($_POST['editsubmit']))
{
    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: Agent_admin_edit_list.php");




}

if (isset($_POST['backtolist']))
{
    header("Location: Agent_Admin.php");

}
if (isset($_POST['delsubmit']))
{
    $obj = new midhu_agentcontact_admin_delete();
    $rows = $obj->agentcontact_admin_delete_function($Id2);
    header("Location: Agent_Admin.php");
        }




?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Travel Time</title>


</head>
<body>
<header id="header">
    <link rel="stylesheet" href="styles/agent.css">
    <?php include_once "../header.php"?>
    <link rel="stylesheet" href="styles/insuranceadmin.css">

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
            <h2>Agent Admin Details</h2>
        <div class="box">
            <div  class="agentdetails row">
                <div  class="col-sm-6 details try">
                    <div class="row">
                        <p>Id:</p> <?php echo $row->Id;?>
                    </div>
                    <div class="row">
                        <p>First Name:</p> <?php echo $row->fname;?>
                    </div>
                    <div class="row">
                        <p>Last Name:</p> <?php echo $row->lname;?>
                    </div>
                    <div class="row">
                        <p>Origin: </p><?php echo $row->origin;?>
                    </div>
                    <div class="row">
                        <p>Destination:</p> <?php echo $row->destination;?>
                    </div>
                    <div class="row ">
                    <p>Phone Nymber: </p><?php echo $row->phoneno;?>
                    </div>
                    <div class="row ">
                        <p>Sender Email: </p><?php echo $row->SenderEmail;?>
                    </div>
                    <div class="row ">
                        <p>Start Date: </p><?php echo $row->StartDate;?>
                    </div>
                    <div class="row ">
                        <p>Return Date: </p><?php echo $row->ReturnDate;?>
                    </div>
                    <div class="row ">
                        <p>Subject: </p><?php echo $row->subject;?>
                    </div>
                    <div class="row">
                        <p>message:</p> <?php echo $row->message;?>
                    </div>
                    <div class="row">
                        <p>Agent Id: </p>  <?php echo $row->agentId;?>
                    </div>






                    <div class="row">
                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                        <input type="submit" name="delsubmit" class="btn btn-danger" value="Delete" />
                        <input type="submit" name="editsubmit" class="btn btn-primary" value="Edit" />
                        <input type="submit" name="backtolist" class="btn btn-info" value="Back to list" />
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

