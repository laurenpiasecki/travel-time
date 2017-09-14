<?php 
include("php-scripts/db-connect.php");
include("php-scripts/handle-calendar.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>I Feel Lucky - TraveTime</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto:100,400,600" />
    <link rel="stylesheet" href="../styles/travelTime.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
          <?php include_once "header.php"?>
<body>
    <div class="bg-overlay">
        <div class="container">
            <div class="row text-center">
                <h2 class="tagLine">The<span class="decorativeText"> journey </span> is the <span class="decorativeText">destination.</span></h2> </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="container main">
    <form method="post" action="#results">
        <div class="main">
            <!-- FORM -->
            <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>#results">
                <fieldset>
                    <h2>- I FEEL LUCKY! -</h2>
                    <h3>Please select your preferred date of travel:</h3>
                    <?php 
                        // print calendar 
                        printCalendar();
                    ?>
                          <div class="form-box">
            <input type="submit" name="send" id="send" value="Find My Lucky Package"> </div>
                </fieldset>
            </form>
            <!-- OUTPUT -->
            <div class="feed">
                <?php 
                // print errors | feedback | database-content
                evaluate();
            ?>
            </div>
        </div>
      
    </form>
    <!-- OUTPUT -->
    <div class="feed"> </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>
<footer class="footerBg">
    <div class="container">
        <div class="row text-center"> <img class="img-responsive" src="../images/travelTime_logo.png" alt="Travel Time" id="footer_logo" /> &copy; 2017 | Travel Time | Canada | All rights reserved</div>
    </div>
</footer>

</html>