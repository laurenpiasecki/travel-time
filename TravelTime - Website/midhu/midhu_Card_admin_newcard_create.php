<?php
include_once "classes/Dbconnect.php";
include_once  "classes/midhuPictureUploadClass.php";
include_once  "classes/midhu_Card_Create_Class.php";

if (isset($_POST['submit']))
{
    $obj = new midhuPictureUploadClass();
    $msg = $obj->uploadpicfunction_for_cards();
    $obj = new midhu_Card_Create_Class();
    $rows = $obj->Card_Create_function();

    ?>
    <script>
        alert ("Card Added");
    </script> <?php


}

if (isset($_POST['backtolist']))
{
    header("Location: midhu_Gift_Card_Admin.php");
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
    <form action="midhu_Card_admin_newcard_create.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-3">

            </div>


            <div class="col-md-9">
                <h2>Gift Card Create Admin </h2>
                <div class="box">



                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Card Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_cardname"  name="CardName" type="text" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Link: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Link"  name="Link" type="text" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Comment: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_comment"  name="Comment" type="text" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Card Type: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_CardType"  name="CardType" type="text" value="">
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

