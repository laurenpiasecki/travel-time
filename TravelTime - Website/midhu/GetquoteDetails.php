<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_insurance_select.php";
include_once "classes/midhu_insurance_insert.php";


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
$price = $_SESSION['passedprice'];

if (isset($_POST['backtolist']))
{
    header("Location: Getquote.php");

}


if(isset($_POST['submit1']))
{



    $obj = new midhu_insurance_insert();
    $insuranceinsert = $obj->insert_insurance_function();




?>
    <script>
alert ("Thanking for your purchase");
    </script>

    <?php





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

            <div class="box4 col-md-9">
                <div class="box5">
                    <div  class="agentdetails row">


                        <div  class="col-sm-6 details try">
                              <h2>Purchase Details</h2>
                            <div class="row">
                                <p>Destination:</p> <?php echo $destination;?>
                            </div>
                            <div class="row">
                                <p>Departure Date:</p> <?php echo $DepartureDate;?>
                            </div>

                            <div class="row">
                                <p>Return Date:</p> <?php echo $ReturnDate;?>
                            </div>
                            <div class="row">
                                <p>No of person:</p> <?php echo $Number1;?>
                            </div>
                            <div class="row">
                                <p>Province: </p><?php echo $Province;?>
                            </div>
                            <div class="row">
                                <p>Plan Price: $ </p><?php echo $price;?>
                            </div>
                            <div class="row">
                                <p>Total Amount: $ </p><?php echo $price *  $Number1;?>
                            </div>
                            <div class="row">
                                <p>Departure City:</p> <?php echo $departcity;?>
                            </div>
                            <div class="row">
                                <p>Name: </p><?php echo $Name1;?>
                            </div>
                            <div class="row">
                                <p>Age: </p><?php echo $Age1 ;?>
                            </div>
                            <div class="row">
                                <p>Relationship: </p><?php echo ("primary Insured");?>
                            </div>
                            <?php if ($Number1 ==2)
                            {?>

                            <div class="row">
                                <p>Name: </p><?php echo $Name2;?>
                            </div>
                            <div class="row">
                                <p>Age: </p><?php echo $Age2 ;?>
                            </div>
                            <div class="row">
                                <p>Relationship: </p><?php echo $Relationship2;?>
                            </div>

                            <?php  }  ?>
                            <?php if ($Number1 ==3)
                            {?>

                                <div class="row">
                                    <p>Name: </p><?php echo $Name2;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age2 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship2;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name3;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age3 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship3;?>
                                </div>

                            <?php  }  ?>

                            <?php if ($Number1 ==4)
                            {?>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name2;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age2 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship2;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name3;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age3 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship3;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name4;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age4 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship4;?>
                                </div>

                            <?php  }  ?>

                            <?php if ($Number1 ==4)
                            {?>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name2;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age2 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship2;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name3;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age3 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship3;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name4;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age4 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship4;?>
                                </div>
                                <div class="row">
                                    <p>Name: </p><?php echo $Name5;?>
                                </div>
                                <div class="row">
                                    <p>Age: </p><?php echo $Age5 ;?>
                                </div>
                                <div class="row">
                                    <p>Relationship: </p><?php echo $Relationship5;?>
                                </div>





                            <?php  }  ?>




                            <div class="row">

                                <input type="submit" name="submit1" class="button" value="Check Out"/>
                                <input type="submit" name="backtolist" class="button" value="Back" />


                            </div>

                        </div>
                    </div>
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

