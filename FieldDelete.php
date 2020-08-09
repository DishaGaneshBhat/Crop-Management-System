<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Field</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$fieldname = "";
$fieldarea= 0;
$fieldtype = "";
$cropid= 0;
$year = 0;

$query = "SELECT * FROM FIELD where FieldID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{ 
                $fieldid = $row["FieldID"];
                $fieldname = $row["Field_Name"];
		$fieldarea = $row["Field_Area"];
		$fieldtype = $row["Field_Type"];
		$cropid = $row["CropID"];
                $year = $row["year"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
         <tr><td>Field ID</td><td><?php echo $fieldid; ?></td></tr>
        <tr><td>Field Name</td><td><?php echo $fieldname; ?></td></tr>
	<tr><td>Field Area</td><td><?php echo $fieldarea; ?></td></tr>
	<tr><td>Field Type</td><td><?php echo $fieldtype; ?></td></tr
	<tr><td>Crop ID</td><td><?php echo $cropid; ?></td></tr>
        <tr><td>Year</td><td><?php echo $year; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='FieldDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
