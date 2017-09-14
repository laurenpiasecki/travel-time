<!-- logo and menu navbar-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Time</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto:100,400,600" />
    <link rel="stylesheet" href="../styles/travelTime.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://prabhninder.com/dist/sweetalert.css">
    <link rel="stylesheet" href="http://prabhninder.com/dist/travelTime.css">
    <link rel="stylesheet" href="http://prabhninder.com/dist/car.css">
    <script src="http://prabhninder.com/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/car.css">
<!--    <link rel="stylesheet" href="styles/feedback_style1.css">-->
    <script src="styles/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/dist/sweetalert.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js";></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-bg navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
               <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">
                <img src="../images/travelTime_logo.png" class="img__logo" alt="Travel Time Logo" title="Travel Time" class="img-responsive" /><span class="hidden">Travel Time</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://gursewakghuman.com/traveltime/cardeals/view/user.php">Cars</a></li>
                <li><a href="http://gursewakghuman.com/traveltime/hotels/index.php">Hotels</a></li>
                <li><a href="http://gursewakghuman.com/traveltime/midhu/Gift_Card.php">Gifts</a></li>
                
                <li><a href="http://gursewakghuman.com/traveltime/feedbackform/view/userfeedback.php">Feedback</a></li>
                <li><a href="http://gursewakghuman.com/traveltime/price_alert/">Price Alert</a></li>
                <li><a href="http://gursewakghuman.com/traveltime/wishlist/index.php"><span class="glyphicon glyphicon glyphicon-heart"></span></a></li>
                <li class="active"><a href="http://gursewakghuman.com/traveltime/Cart/tourCart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            </ul>
        </div>
    </div>
    </nav>
	<?php if (file_exists('../errorhandle.php')) {include('../errorhandle.php');}?>