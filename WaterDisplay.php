<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Water</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT W.WaterID,W.amountused,W.source1,W.method,C.Crop_Name from CROP C, WATER W WHERE C.CropID = W.CropID ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Water ID</th><th>Crop Name</th><th>Amount Used(litres)</th><th>Source</th><th>Method</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["WaterID"];
		$amountused = $row["amountused"];
		$source = $row["source1"];
		$method = $row["method"];
		$cropname= $row["Crop_Name"];
        echo "<tr><td>". $id ."</td><td>". $cropname ." </td><td>". $amountused ."</td><td>". $source ." </td><td>". $method ."</td><td> <a href='WaterUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='WaterDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
