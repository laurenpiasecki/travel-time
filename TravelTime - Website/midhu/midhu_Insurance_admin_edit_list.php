<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_Emp_agent_select.php";
include_once "classes/midhu_admin_Emp_agent_edit.php";
include_once "classes/midhu_admin_insurance_select.php";


include_once "classes/midhu_admin_insurance_edit.php";

session_start();
$Id2 = $_SESSION['passedid'];
if (isset($_POST['editsubmit']))
{
    $obj = new midhu_admin_insurance_edit();
    $rows = $obj->select_insurance_edit_function($Id2);

    ?>
    <script>
        alert ("Record Updated");
    </script> <?php







}
if (isset($_POST['backtolist']))
{
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
<body>
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
        $obj = new midhu_admin_insurance_select;
        $rows = $obj->select_insurance_details_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">
            </div>


            <div class="col-md-9">
                <h2>Insurance Admin Edit</h2>
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
                                Destination: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_destination"  name="destination" type="text" value="<?php echo $row->destination;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Departure Date: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_DepartureDate"  name="DepartureDate" type="text" value="<?php echo $row->DepartureDate;  ?>">
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
                                <input class="textinput textInput form-control" id="id_ReturnDate"  name="ReturnDate" type="text" value="<?php echo $row->ReturnDate;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Number of Travellers: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Number1"  name="Number1" type="text" value="<?php echo $row->Number1;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Province : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Province"  name="Province" type="text" value="<?php echo $row->Province;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Departure City: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_departcity"  name="departcity" type="text" value="<?php echo $row->departcity;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Name1"  name="Name1" type="text" value="<?php echo $row->Name1;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Age: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Age1"  name="Age1" type="text" value="<?php echo $row->Age1;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Name : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Name2"  name="Name2" type="text" value="<?php echo $row->Name2;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Age : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Age2"  name="Age2" type="text" value="<?php echo $row->Age2;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Relationship: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Relationship2"  name="Relationship2" type="text" value="<?php echo $row->Relationship2;?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Name 3: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Name3"  name="Name3" type="text" value="<?php echo $row->Name3;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Age 3: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Age3"  name="Age3" type="text" value="<?php echo $row->Age3;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Relationship 3: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Relationship3"  name="Relationship3" type="text" value="<?php echo $row->Relationship3;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Name 4: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Name4"  name="Name4" type="text" value="<?php echo $row->Name4;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Age 4: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Age4"  name="Age4" type="text" value="<?php echo $row->Age4;?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Relationship 4: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Relationship4"  name="Relationship4" type="text" value="<?php echo $row->Relationship4;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Name 5: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Name5"  name="Name5" type="text" value="<?php echo $row->Name5;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Age 5: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Age5"  name="Age5" type="text" value="<?php echo $row->Age5;?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Relationship 5: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Relationship5"  name="Relationship5" type="text" value="<?php echo $row->Relationship5;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Total Price: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_passedprice"  name="passedprice" type="text" value="<?php echo $row->passedprice;?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">

                        <input type="submit" name="editsubmit" class="btn btn-primary" value="Save" />
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

