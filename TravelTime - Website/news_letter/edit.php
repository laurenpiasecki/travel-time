<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($connection, $_POST['id']);
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$age = mysqli_real_escape_string($connection, $_POST['age']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);	
	
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
	} else {	
		$result = mysqli_query($connection, "UPDATE users SET name='$name',age='$age',email='$email', phone='$phone', persons='$persons' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$result = mysqli_query($connection, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
	$phone = $res['phone'];
	$persons = $res['persons'];
}
?>
<html>
<head>	
	<title>Edit Info.</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="persons" value="<?php echo $persons;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
