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
$suppliername = "";
$cropid = 0;
$year = 0;
$cropcost = 0;
$supplieraddress = "";
$contactno = "";

$query = "SELECT * FROM SUPPLIER where SupplierID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
                $supplierid = $row["SupplierID"];
		$suppliername = $row["Supplier_Name"];
		$cropcost = $row["Crop_Cost"];
                 $cropid = $row["CropID"];
                $year = $row["year"];
		$supplieraddress = $row["Supplier_Address"];
		$contactno = $row["Contact_No"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Supplier</h2>
	<form action="SupplierUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
               <div class="form-group"><!--This is bootstrap class-->
			<label>Supplier ID</label>
			<input type="text" name="SupplierID" value="<?php echo $supplierid; ?>" class="form-control">
		</div>
		<div class="form-group"><!--This is bootstrap class-->
			<label>Supplier Name</label>
			<input type="text" name="Supplier_Name" value="<?php echo $suppliername; ?>" class="form-control">
		</div>
		<div class="form-group"><!--This is bootstrap class-->
			<label>Crop ID</label>
			<input type="text" name="CropID" value="<?php echo $cropid; ?>" class="form-control">
		</div>
                <div class="form-group"><!--This is bootstrap class-->
			<label>Crop Cost</label>
			<input type="text" name="Crop_Cost" value="<?php echo $cropcost; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Supplier Address</label>
			<input type="text" name="Supplier_Address" value="<?php echo $supplieraddress; ?>" class="form-control">
		</div>
               <div class="form-group">
			<label>Contact No</label>
			<input type="text" name="Contact_No" value="<?php echo $contactno; ?>" class="form-control">
		</div>
               <div class="form-group"><!--This is bootstrap class-->
			<label>Year</label>
			<input type="text" name="year" value="<?php echo $year; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
