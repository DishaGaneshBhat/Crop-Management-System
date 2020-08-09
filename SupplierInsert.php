<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$supplierid = $_POST["SupplierID"]; 
$suppliername = $_POST["Supplier_Name"];
$cropname = $_POST["Crop_Name"];
$cropcost = $_POST["Crop_Cost"];
$supplieraddress = $_POST["Supplier_Address"];
$contactno = $_POST["Contact_No"];
$year = $_POST["year"];
$cropexists=false;

$crop_query="select CropID from CROP where Crop_Name='".$cropname."' and  year ='" .$year."'";

$result = mysqli_query($conn, $crop_query); 
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$cropid = $row["CropID"];
		$cropexists=true;
	}
}
else
{
	echo"<a href='FieldInsert.html'><h1 align:'center'> Please enter a valid Crop name</h1></a>";
}

if($cropexists==true)
{
//No need to insert id, On each insert, id will be auto-incremented
$query = "INSERT INTO SUPPLIER(SupplierID,Supplier_Name,CropID,Crop_Cost,Supplier_Address,Contact_No,year) VALUES ('$supplierid','$suppliername', '$cropid','$cropcost', '$supplieraddress', '$contactno','$year')";

if (mysqli_query($conn, $query)) 
{
    //If insert is successful, user will be redirected to Display page
	header("Location: SupplierDisplay.php"); 
} 
else 
{
    echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
}
}


//close connection
mysqli_close($conn);
?>
