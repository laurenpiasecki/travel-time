<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$spec_id = mysqli_real_escape_string($connection, $_POST['spec_id']);
	
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
	} else {	
		$result = mysqli_query($connection, "UPDATE spec_table SET spec_content='$spec_content',spec_img='$spec_img',spec_type='$spec_type' WHERE spec_id=$spec_id");
		header("Location: admin.php");
	}
}
?>
<?php

$spec_id = $_GET['spec_id'];


$result = mysqli_query($connection, "SELECT * FROM spec_table WHERE spec_id=$spec_id");

while($res = mysqli_fetch_array($result))
{
	$spec_content = $res['spec_content'];
	$spec_img = $res['spec_img'];
	$spec_type = $res['spec_type'];
}
?>
<html>
<head>	
	<title>Edit My Info.</title>
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>spec_content</td>
				<td><input type="text" name="spec_content" value="<?php echo $spec_content;?>"></td>
			</tr>
			<tr> 
				<td>spec_img</td>
				<td><input type="text" name="spec_img" value="<?php echo $spec_img;?>"></td>
			</tr>
			<tr> 
				<td>spec_type</td>
				<td><input type="text" name="spec_type" value="<?php echo $spec_type;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="spec_id" value=<?php echo $_GET['spec_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
