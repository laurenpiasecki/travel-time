<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_agent_admin_record_select.php";
include_once "classes/midhu_agentcontact_admin_delete.php";


session_start();
if (isset($_POST['btnsubmit']))
{

    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: Agent_admin_detail_list.php");
}

if (isset($_POST['editsubmit']))
{

    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: Agent_admin_edit_list.php");
}

if (isset($_POST['delsubmit']))
{


    $Id2 = $_POST['passedid'];
    $obj = new midhu_agentcontact_admin_delete();
    $rows = $obj->agentcontact_admin_delete_function($Id2);
    header("Location: Agent_Admin.php");



}





?>
<!DOCTYPE html>
<html lang="en">


    <?php include_once "../header.php"?>

<head>
    <title>Travel Time</title>
    <?php include_once "midhu_script.php"?>
    <?php include_once "../adminSidebar.php"?>

    <link rel="stylesheet" href="styles/giftcardadmin.css">


</head>

<body>





<div class="container">




    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->

        <div class="col-sm-9 col-md-10 admin_body">
        <div class="page-wrapper">
            <form action="" method="post">
                <div class="row">

                    <div class="col-md-9">

                        <h2>Agent Admin</h2>


                        <table class="table table-bordered" border="1px">

                            <thead>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Agent Id</th>

                            </thead>


                        <?php
                        $obj = new midhu_agent_admin_record_select();
                        $rows = $obj->select_record_function();
                        foreach($rows as $row)
                        {
                            ?>

                            <div class=" clearfix panel-default">
                                <div class="row">
                                    <div class="form-group">
                                        <div>



                                                <tbody>
                                                <tr>


                                            <td><div class="col-md-1 ">
                                                <?php echo  $row->Id;?>
                                            </div></td>
                                                <td><div class="col-md-2">
                                                <?php echo  $row->fname;?>
                                            </div></td>
                                                <td><div class="col-md-2">
                                                <?php echo  $row->lname;?>
                                            </div></td>
                                                <td><div class="col-md-2">
                                                <?php echo  $row->origin;?>
                                            </div></td>
                                                <td><div class="col-md-2">
                                                <?php echo  $row->destination;?>
                                            </div></td>


                                                <td><div class="col-md-1">
                                                <?php echo $row->agentId;?>
                                            </div></td>


                                                <td><form action="" method="post">
                                                <div class="col-md-2">
                                                    <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                                    <input type="submit" name="delsubmit" class="btn btn-danger" value="Delete" />
                                                </div>
                                            </form></td>


                                                    <td><form action="" method="post">
                                                            <div class="col-md-2">
                                                                <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                                                <input type="submit" name="btnsubmit" class="btn btn-info" value="Details" />
                                                            </div>
                                                        </form></td>

                                                    <td><form action="" method="post">
                                                            <div class="col-md-2">
                                                                <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                                                <input type="submit" name="editsubmit" class="btn btn-primary" value="Edit" />
                                                            </div>
                                                        </form></td>







                                                </tr>
                                                </tbody>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } ?>

                        </table>

                    </div>
                </div>
            </form>
        </div>








</div>
        <!--***Tours And Create a Tour Tab***********************-->

    </div>
</div>




<div Id="scroll-up"><a href="#">^</a></div>
<div Id = "footer">
   <?php include_once "../footer.php"?>
</div>
</body>
</html>