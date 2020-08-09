<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Expenditure</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT E.ExpenditureID,E.Amount_Spent,M.Description from MAINTENANCE M, EXPENDITURE E WHERE M.MaintenanceID = E.MaintenanceID";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Expenditure ID</th><th>Maintenance Name</th><th>Amount Spent(Rs)</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["ExpenditureID"];
                $description= $row["Description"];
		$amountused = $row["Amount_Spent"];
		
		
         echo "<tr><td>". $id ."</td><td>". $description ." </td><td>". $amountused ."</td><td> <a href='EUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='EDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
