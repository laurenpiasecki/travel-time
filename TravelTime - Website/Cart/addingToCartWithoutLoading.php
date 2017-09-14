<?php
/*Getting Tour Info*/
session_start();




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
<div class="alignedCenter">
<span class="alert alert-success alert-dismissable fade in">
    Tour added to cart. <a href="#"  style="color: red; font-size: 25px " data-dismiss="alert" aria-label="close">&times;</a>

</span>
</div>