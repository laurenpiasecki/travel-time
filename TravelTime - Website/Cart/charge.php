<?php session_start();
require_once '../header.php';


require_once('./config.php');
$token  = $_POST['stripeToken'];
$customer = \Stripe\Customer::create(array(
    'email' => $_POST['stripeEmail'],
    'card'  => $token
));
$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => round($_SESSION['totalPayment']*100),
    'currency' => 'usd'
));




require_once '../classes/DbConnect.php';
require_once '../classes/Orders.php';
$orderObj = new Orders();
date_default_timezone_set("America/Toronto");
$dateNow = date('Y-m-d H:i:s');
$insertOrder = $orderObj->insertOrders($_SESSION['totalPayment'], $_POST['stripeEmail'], $dateNow);

foreach ($_SESSION['cart'] as $key => $product) {
    $insertOrderDetails = $orderObj->insertOrderDetails($product['id'], $insertOrder, $product['quantity'],$product['tourCost']);
}


unset($_SESSION['cart']);
?>

<div class="cartBody">
    <div class="container">
        <div class="row text-center">
            <h3 class="titleText">Successfully charged $<?php echo $_SESSION['totalPayment'];?>!</h3>
            <p class="titleLine">Thanks for choosing Us.</p>
            <a href="../index.php" class="btn btn-primary" role="button">Back to Homepage</a>
        </div><!---Row-->
    </div><!---container-->
</div><!---cartbody-->
    <div>
        <img class="img-responsive" src="../images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator">
    </div>
<?php
require_once 'PHPMailer/examples/gmail.php';

require_once '../footer.php';?>