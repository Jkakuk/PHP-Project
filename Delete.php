<?php
session_start();

if(isset($_SESSION['online'])){
    $header = $_SESSION['username'];
	echo"<h1 style='background-color:white;'>$header</h1>";
include "db_conn.php";


$id=$_GET['id'];

$sql = "DELETE FROM phpusers WHERE id=$id";

if($conn->query($sql) === TRUE){
    echo "<h1 style='background-color:white;'>Record Deleted Successfully</h1>";
    header("refresh:3;url=manage.php");

}else {
    echo"Error deleting record: ". $conn-> error;
}

$tableBackground = $_SESSION['background'];
$conn -> close();
}else{
    header("Location:Error.php");
}


if($tableBackground == '1'){
	echo"<style> 
		 body {background-image: url(bluesky.jpg);}
		 </style>";
	}elseif($tableBackground == '2'){
	echo"<head><style> 
		 body {background-image: url(mountain.jpg);}
		 </style></head>";
	}elseif($tableBackground == '3'){
	echo"<style> 
		 body {background-image: url(desert.jpg);}
		 </style>";
	}elseif($tableBackground == '4'){
	echo"<style> 
		 body  {background-image: url('ocean.jpg');}
		 </style>";	
	}else{
	echo"<style> 
		 body {background-image:none;}
		 </style>";	
	}




?>
