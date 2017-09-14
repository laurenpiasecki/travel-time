<?php
/*Getting Tour Info*/
session_start();


require_once '../header.php';

/*Updating Cart*/
if(isset($_POST['updateCart'])){
    $tourId = $_POST['tourId'];

    $tourQuantity =$_POST['tourQuantity'];
    if($tourQuantity <= 0 ){
        unset($_SESSION['cart'][$tourId]);
    }
else {
    $_SESSION['cart'][$tourId]['quantity'] = $tourQuantity;
}
}


/*Adding to Cart*/
if(isset($_POST['addToCart'])){

     $tourId = $_POST['tourId'];
    require_once '../classes/DbConnect.php';
    require_once '../classes/Tours.php';
    $tourObj = new Tours();
    $tourDetail=$tourObj->tourDetail($tourId);

    /*Setting Session To hold Cart Values*/
    $lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
    session_set_cookie_params($lifetime, '/');


    // Create a cart array
    if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }



if(isset($_SESSION['cart'][$tourDetail[0]->id])){

    $_SESSION['cart'][$tourDetail[0]->id]['quantity']++;
}
  else {
      $_SESSION['cart'][$tourDetail[0]->id] = array('id' =>$tourDetail[0]->id, 'name' => $tourDetail[0]->name, 'cost' => $tourDetail[0]->price, 'quantity' => 1);
  }
}
?>

<div class="cartBody">
<div class="container">
    <?php   if(!empty($_SESSION['cart'])) { ?>
        <div class="row text-center">

            <h3 class="titleText">Your Cart Is Ready</h3>
            <p class="titleLine">All set to go.</p>
        </div><!---Row-->

        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Cost</th>
                        <th>Quantity</th>
                        <th>Item Total</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $key => $product) {

                        ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo "$" . $product['cost']; ?></td>
                            <td>
                                <form method="post" action="tourCart.php">
                                    <input type='number' name='tourQuantity' value=  <?php echo $product['quantity'] ?>>

                            </td>
                            <td>
                                <?php
                                $tourCost = ($product['quantity'] * $product['cost']);
                                echo "$" . number_format($tourCost, 2);
                                $_SESSION['cart'][($product['id'])]['tourCost'] = $tourCost;

                                ?>
                            </td>
                            <td>

                                <input type='hidden' name='tourId' value=  <?php echo $product['id'] ?>>
                                <input type='submit' class='btn btn-primary' name='updateCart' value='Update'/>
                                </form>

                            </td>
                        </tr>


                        <?php
                    }

                    ?>

                    <tr>
                        <td colspan="3" style="text-align: right;"><b>Subtotal</b></td>
                        <td>$<?php
                            function getSubtotal()
                            {
                                $totalCost = 0;
                                foreach ($_SESSION['cart'] as $key => $product) {

                                    $totalCost = $totalCost + $product['tourCost'];
                                }
                                return $totalCost;
                            };


                            echo number_format(getSubtotal(), 2);

                            $_SESSION['totalPayment'] = getSubtotal(); ?></td>
                    </tr>
                    </tbody>

                </table>

            </div><!---Table responsive-->
            <?php require_once 'stripeIndex.php' ?>
        </div><!---col-sm-12-->
        <?php
    }
    else{
     echo   '<div class="row text-center">

            <h3 class="titleText">Your Cart Is Empty</h3>
            <p class="titleLine">Its the time to travel the world.</p>
            <a href="../index.php" class="btn btn-primary" role="button">Shop our Tours</a>
        </div><!---Row-->';
    }

?>
</div><!---Container-->
</div><!---CartBody-->
<div>
    <img class="img-responsive" src="../images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator">
</div>
<?php

require_once '../footer.php';
?>
