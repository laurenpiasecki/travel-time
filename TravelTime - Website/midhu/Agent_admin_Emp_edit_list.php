<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_Emp_agent_select2.php";
include_once "classes/midhu_admin_Emp_agent_edit.php";


session_start();

$Id2 = $_SESSION['passedid'];


if (isset($_POST['editsubmit']))
{

    $obj = new midhu_admin_Emp_agent_edit();
    $rows = $obj->select_agent_Emp_edit_function($Id2);

    ?>
    <script>
        alert ("Record Updated");
    </script> <?php

}

if (isset($_POST['backtolist']))
{
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
        $obj = new midhu_admin_Emp_agent_select2();
        $rows = $obj->select_agent_details_function($Id2);
        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">

            </div>


            <div class="col-md-9">
                <h2>Agent Profile Edit Admin </h2>
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
                                <input class="textinput textInput form-control" id="id_fname"  name="FirstName" type="text" value="<?php echo $row->FirstName;  ?>">
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
                                <input class="textinput textInput form-control" id="id_lname"  name="LastName" type="text" value="<?php echo $row->LastName;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Email: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_origin"  name="Email" type="text" value="<?php echo $row->Email;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Phone: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Phone"  name="Phone" type="text" value="<?php echo $row->Phone;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Nationality : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Nationality"  name="Nationality" type="text" value="<?php echo $row->Nationality;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Address: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Address"  name="Address" type="text" value="<?php echo $row->Address;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                City: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_City"  name="City" type="text" value="<?php echo $row->City;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Province: <span class="asteriskField">*</span>
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
                                Country : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Country"  name="Country" type="text" value="<?php echo $row->Country;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Comment : <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Comment"  name="Comment" type="text" value="<?php echo $row->Comment;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Favourite Destination: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_FavouriteDestination"  name="FavouriteDestination" type="text" value="<?php echo $row->FavouriteDestination;?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Favourite Airline: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_FavouriteAirline"  name="FavouriteAirline" type="text" value="<?php echo $row->FavouriteAirline;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Languages: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Languages"  name="Languages" type="text" value="<?php echo $row->Languages;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Store: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Store"  name="Store" type="text" value="<?php echo $row->Store;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Picture: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Picture"  name="Picture" type="text" value="<?php echo $row->Picture;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Specialty: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Specialty"  name="Specialty" type="text" value="<?php echo $row->Specialty;?>">
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

