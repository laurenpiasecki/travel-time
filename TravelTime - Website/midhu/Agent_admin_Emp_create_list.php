<?php
include_once "classes/Dbconnect.php";
include_once  "classes/midhuPictureUploadClass.php";
include_once  "classes/midhu_Agent_Emp_Create_Class.php";

if (isset($_POST['submit']))
{
    $obj = new midhuPictureUploadClass();
    $msg = $obj->uploadpicfunction();
    $obj = new midhu_Agent_Emp_Create_Class();
    $rows = $obj->Agent_Emp_Create_function();

    ?>
    <script>
        alert ("Agent Profile Created");
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
    <form action="Agent_admin_Emp_create_list.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-3">

            </div>


            <div class="col-md-9">
                <h2>Agent Admin Profile list</h2>
                <div class="box">



                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                First Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_fname"  name="FirstName" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_lname"  name="LastName" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_origin"  name="Email" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Phone"  name="Phone" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Nationality"  name="Nationality" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Address"  name="Address" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_City"  name="City" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Province"  name="Province" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Country"  name="Country" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Comment"  name="Comment" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_FavouriteDestination"  name="FavouriteDestination" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_FavouriteAirline"  name="FavouriteAirline" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Languages"  name="Languages" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Store"  name="Store" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Picture"  name="Picture" type="text" value="">
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
                                <input class="textinput textInput form-control" id="id_Specialty"  name="Specialty" type="text" value="">
                            </div>
                        </div>
                    </div>





                    <div class="row">
                        Select image to upload:
                        <input type="file"  class="btn btn-info" name="fileToUpload" id="fileToUpload">
                        <input type="submit" class="btn btn-primary" value="Create" name="submit">
                        <input type="submit" name="backtolist" class="btn btn-info" value="Back to list" />


                    </div>

                    <?php if (isset($_POST['submit']))
                    {
                        ?>
                        <div Id="errmsg" ><?php echo $msg?></div> <?php } ?>

                </div>
             </div>
        </div>

        </div>
        </div>


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

