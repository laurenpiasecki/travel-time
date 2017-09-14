<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_agent_select.php";
include_once "classes/midhu_admin_card_edit.php";
include_once "classes/midhu_admin_card_select.php";
session_start();
$Id2 = $_SESSION['passedid'];
if (isset($_POST['backtolist']))
{
    header("Location: midhu_Gift_Card_Admin.php");
}
if (isset($_POST['editsubmit']))
{
    $obj = new midhu_admin_card_edit();
    $rows = $obj->select_card_edit_function($Id2);
    ?> <script>
    alert ("Record updated");
</script> <?php
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
        $obj = new midhu_admin_card_select();
        $rows = $obj->select_card_details_function($Id2);

        foreach ($rows as $row)
        {?>
        <div class="row">
            <div class="col-md-3">

            </div>


            <div class="col-md-9">
                <h2>Gift Card Edit Admin </h2>
                <div class="box">

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                ID: <span class="asteriskField">*</span>
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
                                Amount: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_value1"  name="value1" type="text" value="<?php echo $row->value1;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Card Design: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_CardDesign"  name="CardDesign" type="text" value="<?php echo $row->CardDesign;  ?>">
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
                                <input class="textinput textInput form-control" id="id_Message1"  name="Message1" type="text" value="<?php echo $row->Message;  ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Delivery type: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Deliverytype"  name="Deliverytype" type="text" value="<?php echo $row->Deliverytype;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Receiver Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_ReceiverName"  name="ReceiverName" type="text" value="<?php echo $row->ReceiverName;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Receiver Email: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_ReceiverEmail"  name="ReceiverEmail" type="text" value="<?php echo $row->ReceiverEmail;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Sender Name: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_SenderName"  name="SenderName" type="text" value="<?php echo $row->SenderName;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Sender Email: <span class="asteriskField">*</span>
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
                                Delivery Date: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_DeliveryDate"  name="DeliveryDate" type="text" value="<?php echo $row->DeliveryDate;?>">
                                <script>
                                    $( function() {
                                        $( "#id_DeliveryDate" ).datepicker();
                                    } );
                                </script>


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Address1: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Address1"  name="Address1" type="text" value="<?php echo $row->Address1;?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 ">
                            <label for="id_rname" class="control-label  requiredField">
                                Address2: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_Address2"  name="Address2" type="text" value="<?php echo $row->Address2;?>">
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
                                Country: <span class="asteriskField">*</span>
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
                                Postal Code: <span class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="controls ">
                                <input class="textinput textInput form-control" id="id_PostalCode"  name="PostalCode" type="text" value="<?php echo $row->PostalCode;?>">
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

