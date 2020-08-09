<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "deepa", "Management");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$fieldid=$_POST["FieldID"];
$fieldname=$_POST["Field_Name"];
$fieldarea=$_POST["Field_Area"];
$fieldtype = $_POST["Field_Type"];
$farmername = $_POST["Farmer_Name"];
$cropname = $_POST["Crop_Name"];
$year = $_POST["year"];
$farmername = $_POST["Farmer_Name"];



$cropexists=false;

$crop_query="select CropID from CROP where Crop_Name='".$cropname."'";

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
	$query = "INSERT INTO FIELD(FieldID,Field_Name,Farmer_Name,Field_Area,Field_Type,CropID,year) VALUES('$fieldid','$fieldname','$farmername','$fieldarea','$fieldtype','$cropid','$year')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: FieldDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
