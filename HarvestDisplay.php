<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Harvest</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT H.HarvestID,H.Harvest_Time,H.Production,C.Crop_Name from CROP C,HARVEST H WHERE C.CropID = H.CropID";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Harvest ID</th><th>Harvest_Time</th><th>Production(quintals)</th><th>Crop Name</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["HarvestID"];
		$harvesttime = $row["Harvest_Time"];
		$production = $row["Production"];
		$cropname= $row["Crop_Name"];

        echo "<tr><td>". $id ."</td><td>". $harvesttime ." </td><td>". $production ."</td><td>". $cropname ." </td><td> <a href='HarvestUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='HarvestDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
