<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$cropid = $_POST["CropID"];
$cropname = $_POST["cropname"];
$cropseason = $_POST["Crop_Season"];
$cropvariety = $_POST["cropvariety"];
$year = $_POST["year"];

//Prepare query
$query = "UPDATE CROP SET CropID = '$cropid' ,Crop_name='$cropname', Crop_Season = '$cropseason', Crop_Variety = '$cropvariety', year='$year' WHERE CropID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: CropDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
