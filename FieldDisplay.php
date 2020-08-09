<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Field</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT F.FieldID,F.Field_Area,F.Field_Type,F.Farmer_Name,C.Crop_Name,F.Field_Name,F.year From CROP C, FIELD F where F.CropID = C.CropID";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Field ID</th><th>Crop Name</th><th>Farmer Name</th><th>Field Name</th><th>Field_Area(Sq metres)</th><th>Field_Type</th><th>year</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["FieldID"];
		$feildarea = $row["Field_Area"];
		$feildtype = $row["Field_Type"];
                $farmername = $row["Farmer_Name"];
                $cropname = $row["Crop_Name"];
                $fieldname = $row["Field_Name"];
                $year = $row["year"];

        echo "<tr><td>". $id ."</td><td>". $cropname ."</td><td>". $farmername ."</td><td>". $fieldname ."</td><td>". $feildarea ."</td><td>". $feildtype ." </td><td>" .$year ."</td><td> <a href='FieldUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='FieldDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
