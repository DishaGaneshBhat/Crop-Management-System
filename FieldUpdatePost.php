<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$fieldid = $_POST["FieldID"];
$fieldname= $_POST["Field_Name"];
$fieldarea= $_POST["Field_Area"];
$fieldtype = $_POST["Field_Type"];
$cropid = $_POST["CropID"];
$year = $_POST["year"];

//Prepare query
$query = "UPDATE FIELD SET FieldID = '$fieldid',Field_Name = '$fieldname',Field_Area='$fieldarea', Field_Type = '$fieldtype', CropID='$cropid', year = '$year' WHERE FieldID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: FieldDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
