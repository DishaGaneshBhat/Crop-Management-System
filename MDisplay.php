<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Maintenance</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT M.MaintenanceID,M.Description,F.Field_Name From MAINTENANCE M,FIELD F WHERE M.FieldId = F.FieldID";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Field Name</th><th>Description</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["MaintenanceID"];
		$description = $row["Description"];
		$fieldname= $row["Field_Name"];
        echo "<tr><td>". $id ."</td><td>". $fieldname ." </td><td>". $description ."</td><td> <a href='MUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='MDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
    }
	echo "</tbody></table>";
} 
else 
{
    echo "0 results";
}

//close connection
mysqli_close($conn);
?>

</body>
