<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($connect, $_POST['name']);
	$image = mysqli_real_escape_string($connect, $_POST['image']);
	$price = mysqli_real_escape_string($connect, $_POST['price']);
	if(empty($name) || empty($image) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>price field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$result = mysqli_query($connect, "INSERT INTO price_alerts(name,image,price) VALUES('$name','$image','$price')");
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>