<?php  session_start();
if(isset($_SESSION['adminName'])){
require_once '../header.php';
require_once '../classes/DbConnect.php';
require_once '../classes/Orders.php';
$orderObj = new Orders();
$orders = $orderObj->getOrders();





?>
    <div class="container">

        <div class="row">
            <!--****SideBar Starts***********************-->
            <?php require_once '../adminSidebar.php';?>
            <!--****SideBar Ends***********************-->


            <!--****Body Start***********************-->
            <!--***Tours And Create a Tour Tab***********************-->
            <div class="col-sm-9 col-md-10 admin_body">

<div class="col-sm-12">
    <div class="table-responsive table-hover">
        <table class="table">
            <thead class="thead-custom">
            <tr>
                <th>Order Id</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i =1;
            $j= 1;
            foreach ($orders as $order){ ?>
                <tr class="<?php echo $i; ?> hideRow">
                    <td><?php echo $order->id;?></td>
                    <td><?php echo $order->customer;?></td>
                    <td><?php echo $order->order_date;?></td>
                    <td><?php echo '$'.$order->amount;?></td>

                    <td><form method='post' action='adminOrderDetail.php'>
                            <input type='hidden' name='detailId' value='<?php echo $order->id; ?>'>
                            <input type='submit' class="btn btn-primary" name='detailOrder' value='Details' />
                        </form>
                    </td>
                </tr>
                <?php
                if($j==($i * 10)){
                    $i++;
                }
                $j++;

            }
            ?>
            </tbody>
        </table>

    </div>
</div>

<ul class="pagination">
    <?php
    $pageNumber= 1;
    while($pageNumber <= $i){
        echo '<li><a href="" class="linkPages">'. $pageNumber .'</a></li>';
        $pageNumber++;
    }
    ?>
</ul>

</div>

</div><!--END Row-->

    </div><!--END CONTAINER-->

    <!--Javascript for Pagination-->
    <script>
        $('.hideRow').hide();
        $('.1').show();
        $('.linkPages').click(function (e) {
            e.preventDefault();
            $('.hideRow').hide();
            var x = this.innerHTML;
            $("." + x).show();

        });

    </script>







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