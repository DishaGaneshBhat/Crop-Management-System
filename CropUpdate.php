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
$cropname = "";
$cropseason = "";
$cropvariety = "";
$year = 0;
$cropid = 0;

$query = "SELECT * FROM CROP where CropID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
                $cropid = $row["CropID"];
	 	$cropname = $row["cropname"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["cropvariety"];
		$year = $row["year"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update CROP</h2>
	<form action="CropUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Crop ID</label>
			<input type="text" name="CropID" value="<?php echo $cropid; ?>" class="form-control">
		</div>
		<div class="form-group"><!--This is bootstrap class-->
			<label>Crop Name</label>
			<input type="text" name="cropname" value="<?php echo $cropname; ?>" class="form-control">
		</div>
		
		<div class="form-group">
			<label>Crop Season</label>
			<select name="Crop_Season" class="form-control">
				<option value="Rabi">Rabi</option>
				<option value="Kharif">Kharif</option>
			</select>
		</div>
                <div class="form-group"><!--This is bootstrap class-->
			<label>Crop Variety</label>
			<input type="text" name="cropvariety" value="<?php echo $cropvariety; ?>" class="form-control">
		</div>
		
               <div class="form-group"><!--This is bootstrap class-->
			<label>Date</label>
			<input type="text" name="year" value="<?php echo $year; ?>" class="form-control">
		</div>
		
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
