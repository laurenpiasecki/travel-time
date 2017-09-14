<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$age = mysqli_real_escape_string($connection, $_POST['age']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$phone = mysqli_real_escape_string($connection, $_POST['phone']);
	$persons = mysqli_real_escape_string($connection, $_POST['persons']);
	if(empty($name) || empty($age) || empty($email)) {
				
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
			
		$result = mysqli_query($connection, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email','$phone','$persons')");
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='mydata.php'>View Result</a>";
	}
}
?>
</body>
</html>
