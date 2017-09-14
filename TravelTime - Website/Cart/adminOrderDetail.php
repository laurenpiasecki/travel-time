<?php session_start(); if(isset($_SESSION['adminName'])){ include_once "../header.php";
require_once '../classes/DbConnect.php';
require_once '../classes/Orders.php';
$orderObj = new Orders();

    $orderId = $_POST['detailId'];
$orderDetail = $orderObj->getOrderDetail($orderId);


?>
<div class="container">

    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->
        <!--***Tours And Create a Tour Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
             <h3>Order Details</h3>

            <div class="pull-left" style="width: 50%"><h4><b>Order Id:</b> <?php echo $orderDetail[0]->id;?> </h4>
        <h4><b>Customer:</b> <?php echo $orderDetail[0]->customer;?> </h4></div>
            <div class="pull-right" style="width: 50%"><h4><b>Date:</b> <?php echo $orderDetail[0]->order_date;?> </h4>
                <h4><b>Total Amount: </b> <?php echo '$'.$orderDetail[0]->amount;?> </h4></div>



            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-custom">
                <tr>
                    <th>Tour Name</th>
                    <th>Quantity</th>
                    <th>Cost</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($orderDetail as $tour){
                ?>
                <tr>

                    <td>
                        <?php echo $tour->name;?>
                    </td>

                    <td>
                        <?php echo $tour->quantity;?>
                    </td>


                    <td>
                        <?php echo '$'.$tour->cost;?>
                    </td>
                </tr>
<?php } ?>
                </tbody>

            </table>

            <div class="col-sm-4"><a href="adminOrders.php"> <button type="button" class="btn btn-primary">Back to List</button></a>
            </div>
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
