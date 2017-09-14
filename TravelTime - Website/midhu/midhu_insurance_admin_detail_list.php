<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_insurance_edit.php";
include_once "classes/midhu_insurance_select.php";

include_once "classes/midhu_insurance_admin_delete.php";



session_start();
$Id2 = $_SESSION['passedid'];
if (isset($_POST['editsubmit']))
{
    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: midhu_Insurance_admin_edit_list.php");



}
if (isset($_POST['backtolist']))
{
    header("Location: midhu_Insurance_Admin.php");
}
if (isset($_POST['delsubmit']))
{
    $obj = new midhu_insurance_admin_delete();
    $rows = $obj->agent_insurance_admin_delete_function($Id2);
    header("Location: midhu_Insurance_Admin.php");
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
        $obj = new midhu_insurance_select();
        $rows = $obj->midhu_insurance_select_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">
           </div>
        <div class="col-md-9">

            <h2>Insurance Admin Details</h2>
        <div class="box">
            <div  class="agentdetails row">
                <div  class="col-sm-6 details try">
                    <div class="row">
                        <p>Id:</p> <?php echo $row->Id;?>
                    </div>
                    <div class="row">
                        <p>Destination:</p> <?php echo $row->destination;?>
                    </div>
                    <div class="row">
                        <p>Departure Date:</p> <?php echo $row->DepartureDate;?>
                    </div>
                    <div class="row">
                        <p>Return Date: </p><?php echo $row->ReturnDate;?>
                    </div>
                    <div class="row">
                        <p>Number OF Travellers:</p> <?php echo $row->Number1;?>
                    </div>
                    <div class="row ">
                    <p>Province: </p><?php echo $row->Province;?>
                    </div>
                    <div class="row ">
                        <p>Depart City: </p><?php echo $row->departcity;?>
                    </div>
                    <div class="row ">
                        <p>Name: </p><?php echo $row->Name1;?>
                    </div>
                    <div class="row ">
                        <p>Age: </p><?php echo $row->Age1;?>
                    </div>
                    <div class="row ">
                        <p>Name 2: </p><?php echo $row->Name2;?>
                    </div>
                    <div class="row">
                        <p>Age 2:</p> <?php echo $row->Age2;?>
                    </div>
                    <div class="row">
                    <p>Relationship 2: </p>  <?php echo $row->Relationship2;?>
                    </div>

                    <div class="row ">
                        <p>Name3: </p><?php echo $row->Name3;?>
                    </div>
                    <div class="row">
                        <p>Age3:</p> <?php echo $row->Age3;?>
                    </div>
                    <div class="row">
                        <p>Relationship3: </p>  <?php echo $row->Relationship3;?>
                    </div>

                    <div class="row ">
                        <p>Name4: </p><?php echo $row->Name4;?>
                    </div>
                    <div class="row">
                        <p>Age4:</p> <?php echo $row->Age4;?>
                    </div>
                    <div class="row">
                        <p>Relationship4: </p>  <?php echo $row->Relationship4;?>
                    </div>

                    <div class="row ">
                        <p>Name5: </p><?php echo $row->Name5;?>
                    </div>
                    <div class="row">
                        <p>Age5:</p> <?php echo $row->Age5;?>
                    </div>
                    <div class="row">
                        <p>Relationship5: </p>  <?php echo $row->Relationship5;?>
                    </div>





                    <div class="row">
                        <p>Price:</p>  <?php echo $row->passedprice;?>
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

