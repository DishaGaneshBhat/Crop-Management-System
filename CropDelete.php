<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Crop</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$cropname = "";
$cropseason = "";
$cropvariety= "";
$year= 0;

$query = "SELECT * FROM CROP where CropID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{  
                $cropid = $row["CropID"];
		$cropname = $row["Crop_Name"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["Crop_Variety"];
		$year= $row["year"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
        <tr><td>Crop ID</td><td><?php echo $cropid; ?></td></tr>
	<tr><td>Crop Name</td><td><?php echo $cropname; ?></td></tr>
	<tr><td>Crop Season</td><td><?php echo $cropseason; ?></td></tr
	<tr><td>Crop Variety</td><td><?php echo $cropvariety; ?></td></tr>
	<tr><td>Year</td><td><?php echo $year; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='CropDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
