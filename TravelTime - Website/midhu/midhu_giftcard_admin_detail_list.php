<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_admin_card_select.php";
include_once "classes/midhu_giftcard_admin_delete.php";

session_start();

$Id2 = $_SESSION['passedid'];



if (isset($_POST['editsubmit']))
{

    header("Location: midhu_giftcard_admin_edit_list.php");
}


if (isset($_POST['delsubmit']))

{
    $obj = new  midhu_giftcard_admin_delete();
    $rows = $obj->midhu_giftcard_admin_delete_function($Id2);



    header("Location: midhu_Gift_Card_Admin.php");
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

            <h2>Gift Card Details Admin </h2>

        <div class="box">
            <div  class="agentdetails row">
                <div  class="col-sm-6 details try">
                    <div class="row">
                        <p>ID:</p> <?php echo $row->Id;?>
                    </div>
                    <div class="row">
                        <p>Amount:</p> <?php echo $row->value1;?>
                    </div>
                    <div class="row">
                        <p>Card Design:</p> <?php echo $row->CardDesign;?>
                    </div>
                    <div class="row">
                        <p>Message: </p><?php echo $row->Message;?>
                    </div>
                    <div class="row">
                        <p>Deliverytype:</p> <?php echo $row->Deliverytype;?>
                    </div>
                    <div class="row ">
                    <p>Receiver Name: </p><?php echo $row->ReceiverName;?>
                    </div>
                    <div class="row ">
                        <p>Receiver Email: </p><?php echo $row->ReceiverEmail;?>
                    </div>
                    <div class="row ">
                        <p>Sender Name: </p><?php echo $row->SenderName;?>
                    </div>
                    <div class="row ">
                        <p>Sender Mail: </p><?php echo $row->SenderEmail;?>
                    </div>
                    <div class="row ">
                        <p>DeliveryDate: </p><?php echo $row->DeliveryDate;?>
                    </div>
                    <div class="row">
                        <p>Address1:</p> <?php echo $row->Address1;?>
                    </div>
                    <div class="row">
                    <p>Address2: </p>  <?php echo $row->Address2;?>
                    </div>
                    <div class="row">
                        <p>City:</p> <?php echo $row->City;?>
                    </div>
                    <div class="row">
                        <p>Province:</p> <?php echo $row->Province;?>
                    </div>
                    <div class="row">
                        <p>Country : </p>  <?php echo $row->Country;?>
                    </div>
                    <div class="row">
                        <p>PostalCode:</p> <?php echo $row->PostalCode;?>
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

