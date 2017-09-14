<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_Emp_agent_edit.php";
include_once "classes/midhu_admin_Emp_agent_select2.php";
include_once "classes/midhu_agent_Emp_admin_delete.php";


session_start();
$Id2 = $_SESSION['passedid'];
if (isset($_POST['editsubmit']))
{
    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: Agent_admin_Emp_edit_list.php");
}
if (isset($_POST['backtolist']))
{
    header("Location: Agent_Admin_Emp.php");
}

if (isset($_POST['delsubmit']))
{
    $obj = new midhu_agentEmp_admin_delete();
    $rows = $obj->agentEmp_admin_delete_function($Id2);
    header("Location: Agent_Admin_Emp.php");
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
        $obj = new midhu_admin_Emp_agent_select2();
        $rows = $obj->select_agent_details_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">
           </div>


        <div class="col-md-9">

            <h2>Agent Profile Details Admin </h2>


        <div class="box">
            <div  class="agentdetails row">
                <div  class="col-sm-6 details try">
                    <div class="row">
                        <p>Id:</p> <?php echo $row->Id;?>
                    </div>
                    <div class="row">
                        <p>First Name:</p> <?php echo $row->FirstName;?>
                    </div>
                    <div class="row">
                        <p>Last Name:</p> <?php echo $row->LastName;?>
                    </div>
                    <div class="row">
                        <p>Origin: </p><?php echo $row->Email;?>
                    </div>
                    <div class="row">
                        <p>Destination:</p> <?php echo $row->Phone;?>
                    </div>
                    <div class="row ">
                    <p>Phone Nymber: </p><?php echo $row->Nationality;?>
                    </div>
                    <div class="row ">
                        <p>Sender Email: </p><?php echo $row->Address;?>
                    </div>
                    <div class="row ">
                        <p>Start Date: </p><?php echo $row->City;?>
                    </div>
                    <div class="row ">
                        <p>Return Date: </p><?php echo $row->Province;?>
                    </div>
                    <div class="row ">
                        <p>Subject: </p><?php echo $row->Country;?>
                    </div>
                    <div class="row">
                        <p>message:</p> <?php echo $row->Comment;?>
                    </div>
                    <div class="row">
                    <p>Agent Id: </p>  <?php echo $row->FavouriteDestination;?>
                    </div>

                    <div class="row ">
                        <p>Return Date: </p><?php echo $row->FavouriteAirline;?>
                    </div>
                    <div class="row ">
                        <p>Subject: </p><?php echo $row->Languages;?>
                    </div>
                    <div class="row">
                        <p>message:</p> <?php echo $row->Store;?>
                    </div>
                    <div class="row">
                        <p>Agent Id:</p> <?php echo $row->Picture;?>
                    </div>
                    <div class="row">
                        <p>Specialty:</p>  <?php echo $row->Specialty;?>
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

