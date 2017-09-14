<?php

include_once("config.php");
$result = mysqli_query($connection, "SELECT * FROM spec_table ORDER BY spec_id DESC");  

?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table wspec_idth='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>spec_content</td>
		<td>spec_img</td>
		<td>spec_type</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['spec_content']."</td>";
		echo "<td>".$res['spec_img']."</td>";
		echo "<td>".$res['spec_type']."</td>";	
		echo "<td><a href=\"edit.php?spec_id=$res[spec_id]\">Edit</a> | <a href=\"delete.php?spec_id=$res[spec_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
