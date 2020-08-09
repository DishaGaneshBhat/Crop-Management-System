<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Crop</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM CROP";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Crop_Name</th><th>Crop Season</th><th>Crop_Variety</th><th>year</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["CropID"];
		$cropname = $row["Crop_Name"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["Crop_Variety"];
	        $year = $row["year"];
        echo "<tr><td>". $id ."</td><td>". $cropname ." </td><td>". $cropseason ."</td><td>". $cropvariety ." </td><td>". $year ."</td><td> <a href='CropUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='CropDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
