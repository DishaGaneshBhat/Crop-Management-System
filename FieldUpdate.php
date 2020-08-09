<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET["id"];
$fieldarea = 0;
$fieldtype= "";
$farmerid = 0;
$fieldname = "";

$query = "SELECT * FROM FIELD where FieldID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
                $fieldnmae = $row["Field_Name"];
		$fieldarea = $row["Field_Area"];
		$fieldtype= $row["Field_Type"];
		$cropid = $row["CropID"];
                $year = $row["year"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Field</h2>
	<form action="FieldUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
               <div class="form-group"><!--This is bootstrap class-->
			<label>Field ID</label>
			<input type="text" name="FieldID" value="<?php echo $fieldid; ?>" class="form-control">
		</div>
                <div class="form-group"><!--This is bootstrap class-->
			<label>Field Name</label>
			<input type="text" name="Field_Name" value="<?php echo $fieldname; ?>" class="form-control">
		</div>
		<div class="form-group"><!--This is bootstrap class-->
			<label>Field Area</label>
			<input type="text" name="Field_Area" value="<?php echo $fieldarea; ?>" class="form-control">
		</div>
		
		<div class="form-group">
			<label>Field Type</label>
			<select name="Field_Type" class="form-control">
				<option value="Cultivated">Cultivated</option>
				<option value="Barren">Barren</option>
			</select>
		</div>
                
                <div class="form-group">
			<label>Crop ID</label>
			<input type="text" name="CropID" value="<?php echo $cropid; ?>" class="form-control">
		</div>
                <div class="form-group">
			<label>Year</label>
			<input type="text" name="year" value="<?php echo $year; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
