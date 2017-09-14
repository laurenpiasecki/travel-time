<?php session_start(); if(isset($_SESSION['adminName'])){
    include_once "../header.php";

require_once '../classes/DbConnect.php';
require_once '../classes/Tours.php';

require_once '../classes/Orders.php';
$orderObj = new Orders();








$tourObj = new Tours();
if(isset($_POST['delConfirmTour'])){
    $tourDetail=$tourObj->tourDetail($_POST['delConfirmId']);
    $orderCount = $orderObj->tourOrdersCount($_POST['delConfirmId']);

}
elseif(isset($_POST['detailTour'])){
    $tourDetail=$tourObj->tourDetail($_POST['detailId']);
}
elseif(isset($_POST['updateTour'])){
    $tourDetail=$tourObj->tourDetail($_POST['admin__tour_id']);
}

?>
<div class="container">

    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->
        <!--***Tours And Create a Tour Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
            <div class="col-sm-6">
                <?php if(isset($_POST['delConfirmTour'])){?> <h3>Are you sure you want to delete this?</h3>
                    <div class="alert alert-danger">
                      There are <strong><?php echo $orderCount->counter;?></strong> orders associated with this tour.
                    </div>
                <?php }

                elseif(isset($_POST['updateTour'])){
                    if(!empty($tourUpdated)){?> <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> <?php echo $tourUpdated; ?> tour updated
                    </div>
                        <h3>Details</h3>
                        <?php
                    }
                }

                else{?>
                    <h3>Details</h3>
                <?php }
                ?>

            <h4> <?php echo $tourDetail[0]->name;?> </h4></div>
            <div class="col-xs-6" style="margin-bottom: 10px;"><img class="pull-right" src='../images/<?php echo $tourDetail[0]->image; ?>' width='50%' height='auto'> </div>
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <td class="table-inverse">
                    Id
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->id;?>
                    </td>
                </tr>

                <tr>
                    <td>
Name
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->name;?>
                    </td>
                </tr>

                <tr>
                    <td>
From
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->from_place;?>
                    </td>
                </tr>

                <tr>
                    <td>
To
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->location;?>
                    </td>
                </tr>

                <tr>
                    <td>
Type
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->type;?>
                    </td>
                </tr>

                <tr>
                    <td>
Start Date
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->start_date;?>
                    </td>
                </tr>

                <tr>
                    <td>
Return Date
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->return_date;?>
                    </td>
                </tr>

                <tr>
                    <td>
Description
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->description;?>
                    </td>
                </tr>

                <tr>
                    <td>
Days
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->days;?>
                    </td>
                </tr>

                <tr>
                    <td>
Price
                    </td>

                    <td>
                        <?php echo $tourDetail[0]->price;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Popular
                    </td>

                    <td>
                        <?php  if ($tourDetail[0]->popular == 1) {
                        echo 'Yes';}
                        else{
                            echo 'No';
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <div class="col-sm-4"><a href="adminTours.php"> <button type="button" class="btn btn-primary">Back to List</button></a>
            </div>
            <?php if(isset($_POST['delConfirmTour'])){?>
                <div class="col-sm-4">
                <form method='post' action='adminTours.php'>
                    <input type='hidden' name='delId' value='<?php echo $tourDetail[0]->id; ?>'>
                    <input type='submit' class="btn btn-danger" name='delTour' value='Delete' />
                </form>
            </div>
                <?php }?>

        </div>
    </div>
</div>

        <!-- Footer-->
        <?php include_once "../footer.php"; }

else{
    include_once "../header.php";
    echo "<div class='titleText alignedCenter noAccess'>Sorry! you dont have access to this page.</div>
<!--ROW SEPARATOR-->
<div>
    <img class=\"img-responsive\" src=\"../images/rowSeparator_Family.png\" alt=\"rowSeparator\" id=\"img__BlackRowSeparator\">
</div>";
    include_once "../footer.php";
}
?>
