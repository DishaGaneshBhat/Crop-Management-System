<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$supplierid = $_POST["SupplierID"];
$suppliername = $_POST["Supplier_Name"];
$cropid = $_POST["CropID"];
$cropcost = $_POST["Crop_Cost"];
$supplieraddress = $_POST["Supplier_Address"];
$contactno = $_POST["Contact_No"];
$year = $-POST["year"];

//Prepare query
$query = "UPDATE SUPPLIER SET SupplierID = '$supplierid',Supplier_Name='$suppliername', CropID = '$cropid',Crop_Cost = '$cropcost', Supplier_Address = '$supplieraddress', Contact_No='$contactno' ,year = '$year' WHERE SupplierID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: SupplierDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
