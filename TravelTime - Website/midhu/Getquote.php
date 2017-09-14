<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_insurance_select.php";
session_start();
$destination = $_SESSION['destination'];
$DepartureDate = $_SESSION['DepartureDate'];
$ReturnDate = $_SESSION['ReturnDate'];
$Number1 = $_SESSION['Number1'];
$Province = $_SESSION['Province'];
$departcity = $_SESSION['departcity'];
$Name1 = $_SESSION['Name1'];
$Age1 = $_SESSION['Age1'];
$Name2 = $_SESSION['Name2'];
$Age2 = $_SESSION['Age2'];
$Relationship2 = $_SESSION['Relationship2'];
$Name3 = $_SESSION['Name3'];
$Age3 = $_SESSION['Age3'];
$Relationship3 = $_SESSION['Relationship3'] ;
$Name4 = $_SESSION['Name4'];
$Age4 = $_SESSION['Age4'];
$Relationship4 = $_SESSION['Relationship4'];
$Name5 = $_SESSION['Name5'];
$Age5 = $_SESSION['Age5'];
$Relationship5 = $_SESSION['Relationship5'];
$price ="";


if (isset($_POST['backtolist']))
{
    header("Location: Travel_Insurance.php");

}



if(isset($_POST['button1']))
{
    $price = 35.00;
    $temp = ($price * $Number1);
}
if(isset($_POST['button2']))
{
    $price = 74.00;
    $temp = ($price * $Number1);
}

if(isset($_POST['button3']))
{
    $price = 120.00;
    $temp = ($price * $Number1);

}
if(isset($_POST['button4']))
{
    $_SESSION['passedprice'] = $_POST['passedprice'];
    if ($_POST['passedprice'] == "") {
        $errormsg = "Please select a plan";

    }else {
        header("Location: GetquoteDetails.php");
    }
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
    <link rel="stylesheet" href="styles/insurance.css">
    <?php include_once "../header.php"?>
</header>
<div class ="page-wrapper">
    <form  action="" method="post">

        <div class="container">
            <h2>Select a Plan </h2>
            <div class ="row">
                <div   class ="col-sm-4">
                    <div class="box1">
                        <p>Per Trip
                            Basic Travel & Medical<br/> Plan
                        </p>
                        <h3>$35.00</h3>
                     </div>
                     <div class="box2 price">
                     <input type="submit" name="button1" class="button" value="Select" />
                     <h3>Details</h3>
                     </div>
                </div>
                <div  class ="col-sm-4">
                    <div class="box1">
                        <p>10-Day Multi-Trip
                            Basic Travel & Medical <br/> Plan
                        </p>
                        <h3>$74.00</h3>
                    </div>
                    <div class="box2 price">
                        <input type="submit" name="button2" class="button" value="Select" />
                        <h3>Details</h3>
                    </div>
                </div>
                <div   class ="col-sm-4">
                    <div class="box1">
                        <p>31-Day Multi-Trip
                            Basic Travel & Medical <br/> Plan
                        </p>
                        <h3>$120.00</h3>
                    </div>
                    <div class="box2 price">
                        <input type="submit" name="button3" class="button" value="Select" />
                        <h3>Details</h3>
                        <p><td></td></p>
                        <p></p>
                    </div>
                </div>
             </div>
            <div class ="box3 row">
                <div class="row">
                    <p> Price Plan Selected:</p> <?php if(isset($_POST['button1']) || (isset($_POST['button2']))|| (isset($_POST['button3'])))
                    { echo $price; }?>

                    <p>No of person:</p> <?php if(isset($_POST['button1']) || (isset($_POST['button2']))|| (isset($_POST['button3'])))
                    { echo $Number1; }?>

                    <p>Total Amount:</p> <?php if(isset($_POST['button1']) || (isset($_POST['button2']))|| (isset($_POST['button3'])))
                    { echo $temp; }?> <br/>

                    <input type="hidden" name="passedprice" value="<?php echo $price;?>">
                    <input type="submit" name="button4" class="button" value="Next" />
                    <input type="submit" name="backtolist" class="button" value="Back" />


                    <?php
                    if(isset($_POST['button4']))
                    { ?>                <div Id="errmsg" ><?php echo $errormsg; ?></div>
                    <?php } ?>


                </div>
            </div>
         </div>
</form>
</div>
<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
<?php include_once "../footer.php" ?>
</footer>
</body>
</html>

