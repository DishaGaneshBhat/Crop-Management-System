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

$query = "SELECT * FROM small1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Field Name</th><th>Crop Id</th><th>Crop_Name</th><th>Crop Season</th><th>Crop_Variety</th><th>year</th><th>Supplier ID</th><th>Supplier Name</th><th>Supplier Address</th><th>Crop Cost(Rs)</th><th>Production</th><th>Amount Spent</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
                
		$id = $row["FieldID"];
                $fieldname = $row["Field_Name"];
                $cropid = $row["CropID"];
		$cropname = $row["Crop_Name"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["Crop_Variety"];
	        $year = $row["year"];
                $suppliername = $row["Supplier_Name"];
                $supplierid = $row["SupplierID"];
                $cropcost = $row["Crop_Cost"];
                $production = $row["Production"];
                $amountspent = $row["Amount_Spent"];
                $supplieraddress = $row["Supplier_Address"];
             
        echo "<tr><td>". $id ."</td><td>". $fieldname ." </td><td>". $cropid ."</td><td>". $cropname ." </td><td>". $cropseason ."</td><td>". $cropvariety ."</td><td>". $year ."</td><td>". $supplierid ."</td><td>". $suppliername ."</td><td>". $supplieraddress ."</td><td>". $cropcost ."</td><td>". $production ."</td><td>".   $amountspent ."</td><td> </td></tr>";
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
