<?php
session_start();

	
if(isset($_SESSION['online'])){
    include "db_conn.php";
echo "<h1 style='background-color:white;'>Updated Successfully!</h1>";

header("refresh:3;url=manage.php");

$tableBackground = $_SESSION['background'];
$conn -> close();




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


}


?>