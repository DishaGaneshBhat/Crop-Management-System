<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Supplier</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT S.SupplierID,S.Supplier_Name,S.Crop_Cost,S.Supplier_Address,C.Crop_Name,S.Contact_No,S.year from CROP C,SUPPLIER S where S.CropId = C.CropID";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Supplier_Name</th><th>Crop Name</th><th>Crop_Cost(Rs)</th><th>Supplier_Address</th><th>Contact_No</th><th>Year</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["SupplierID"];
		$suppliername = $row["Supplier_Name"];
                $cropname = $row["Crop_Name"];
		$cropcost = $row["Crop_Cost"];
		$supplieraddress = $row["Supplier_Address"];
		$contactno= $row["Contact_No"];
                $year = $row["year"];
        echo "<tr><td>". $id ."</td><td>". $suppliername." </td><td>".$cropname."</td><td>". $cropcost ."</td><td>". $supplieraddress ." </td><td>". $contactno ."</td><td>".$year."</td><td> <a href='SupplierUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='SupplierDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
