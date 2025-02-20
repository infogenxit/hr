<?php

session_start();
require("dbconnection.php");

	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE `hired_stats` SET ".$column_name."='".$text."' WHERE app_id=".$id; 	
	if(mysqli_query($con, $sql))  
	{  
		echo "Record Updated";  
	}
	else	
	{
		echo "Something went wrong";
	}


?>