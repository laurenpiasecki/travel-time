<html lang="en">
<head>
    <title>News Letter - Travel Time</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto:100,400,600" />
    <link rel="stylesheet" href="../styles/travelTime.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>  
    .bg-overlay {
    background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("../images/header2.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    color: #fff;
    width: 100%;
    height: auto;
    padding-top: 12em;
    padding-bottom: 20em;
    }</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php include_once 'header.php'; ?>
<body>
        <!---MAIN IMAGE-->
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
        <div class="container">
            <h1>Subscribe to our news letter feature!</h1>
            <h3>Please enter your information</h3>
	<br/><br/>    
	<form action="#" method="post" name="form1">
		<table width="70%" border="0">
			<tr> 
				<td><h4>Name</h4></td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td><h4>Age</h4></td>
				<td><input type="text" name="age"></td>
			</tr>
			<tr> 
				<td><h4>Email</h4></td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td><h4>Phone</h4></td>
				<td><input type="text" name="phone"></td>
			</tr>
			<tr> 
				<td><h4>Number of People</h4></td>
				<td><input type="text" name="persons"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>    
     <?php
include_once("config.php");
if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$age = mysqli_real_escape_string($connection, $_POST['age']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$persons = mysqli_real_escape_string($connection, $_POST['persons']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
	if(empty($name) || empty($age) || empty($email) || empty($phone) || empty($persons)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
				if(empty($phone)) {
			echo "<font color='red'>Phone field is empty.</font><br/>";
		}
        if(empty($persons)) {
			echo "<font color='red'>The number of persons field is empty.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		$result = mysqli_query($connection, "INSERT INTO users(name,age,email,phone,persons) VALUES('$name','$age','$email','$phone','$persons')");
echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	   }
    }
?>     
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <!--ROW SEPARATOR-->
        <div> <img class="img-responsive" src="../images/rowSeparator.png" alt="rowSeparator" id="img__RowSeparator"> </div>
        <div> <img class="img-responsive" src="../images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator"> </div>
</body>
        <?php include_once "footer.php" ?>

</html>