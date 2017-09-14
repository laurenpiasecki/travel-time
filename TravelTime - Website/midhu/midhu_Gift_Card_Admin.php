<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_giftcard_admin_record_select.php";
include_once "classes/midhu_giftcard_admin_delete.php";




if (isset($_POST['btnsubmit']))
{
    session_start();

    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: midhu_giftcard_admin_detail_list.php");
}

else {

    $obj = new midhu_giftcard_admin_record_select();
    $rows = $obj->select_record_function();
}


if (isset($_POST['editsubmit']))
{
    session_start();
    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: midhu_giftcard_admin_edit_list.php");
}


if (isset($_POST['delsubmit']))

{
    $Id2 = $_POST['passedid'];
    $obj = new  midhu_giftcard_admin_delete();
    $rows = $obj->midhu_giftcard_admin_delete_function($Id2);
    header("Location: midhu_Gift_Card_Admin.php");
}



if (isset($_POST['addcards'])){

header("Location: midhu_Card_admin_newcard_create.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Time</title>
    <?php include_once "midhu_script.php"?>

</head>
<body>

<div Id = "header">
<?php include_once "../header.php"?>
</div>
<link rel="stylesheet" href="styles/giftcardadmin.css">


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
                    <h2>Gift Card Admin </h2>

                    <div class="box1 form-group">
                        <form action="" method="post">
                            <div class="col-md-1">
                                <input type="submit" name="addcards" class="btn btn-primary" value="Add Cards" />
                            </div>
                        </form>
                    </div>


                    <table  class="table" border="1px">
                        <thead class="thead-inverse">
                        <th>Id</th>
                        <th>Value</th>
                        <th>Card Design</th>
                        <th>Delivery type</th>
                        <th>Receiver Name</th>
                        <th>Sender Name</th>
                        </thead>
                    <?php
                    $obj = new midhu_giftcard_admin_record_select();
                    $rows = $obj->select_record_function();
                    foreach($rows as $row){
                        ?>

                        <div class=" clearfix panel-default">

                                    <div>
                                        <tbody>
                                        <tr>
                                    <td><div class="col-md-1">
                                        <?php echo  $row->Id;?>
                                     </div></td>
                                        <td><div class="col-md-1">
                                        <?php echo  $row->value1;?>
                                    </div></td>
                                        <td><div class="col-md-2">
                                        <?php echo  $row->CardDesign;?>
                                    </div></td>
                                        <td><div class="col-md-2">
                                        <?php echo  $row->Deliverytype;?>
                                    </div></td>
                                        <td><div class="col-md-2">
                                        <?php echo  $row->ReceiverName;?>
                                    </div></td>
                                        <td><div class="col-md-2">
                                        <?php echo  $row->SenderName;?>
                                    </div></td>
                                        <td>  <form action="" method="post">
                                    <div class="col-md-2">
                                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                        <input type="submit" name="delsubmit" class="btn btn-danger" value="Delete" />
                                    </div>
                                        </form></td>

                                            <td>  <form action="" method="post">
                                                    <div class="col-md-2">
                                                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                                        <input type="submit" name="btnsubmit" class="btn btn-info" value="Details" />
                                                    </div>
                                                </form></td>

                                            <td>  <form action="" method="post">
                                                    <div class="col-md-2">
                                                        <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                                        <input type="submit" name="editsubmit" class="btn btn-primary" value="Edit" />
                                                    </div>
                                                </form></td>




                                        </tr>
                                        </tbody>
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