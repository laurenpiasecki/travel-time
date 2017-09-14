<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($connect, $_POST['id']);
	
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
	} else {	
		$result = mysqli_query($connect, "UPDATE price_alerts SET name='$name',image='$image',price='$price' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$result = mysqli_query($connect, "SELECT * FROM price_alerts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$image = $res['image'];
	$price = $res['price'];
}
?>
<html>
<head>	
	<title>Edit My Info.</title>
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
				<td>image</td>
				<td><input type="text" name="image" value="<?php echo $image;?>"></td>
			</tr>
			<tr> 
				<td>price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
