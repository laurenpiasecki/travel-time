<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$spec_content = mysqli_real_escape_string($connection, $_POST['spec_content']);
	$spec_img = mysqli_real_escape_string($connection, $_POST['spec_img']);
	$spec_type = mysqli_real_escape_string($connection, $_POST['spec_type']);
	if(empty($spec_content) || empty($spec_img) || empty($spec_type)) {
				
		if(empty($spec_content)) {
			echo "<font color='red'>spec_content field is empty.</font><br/>";
		}
		
		if(empty($spec_img)) {
			echo "<font color='red'>spec_img field is empty.</font><br/>";
		}
		
		if(empty($spec_type)) {
			echo "<font color='red'>spec_type field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
			
		$result = mysqli_query($connection, "INSERT INTO spec_table(spec_content,spec_img,spec_type) VALUES('$spec_content','$spec_img','$spec_type')");
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>
