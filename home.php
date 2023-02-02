<?php
session_start();
if(isset($_SESSION['online'])){
	$header = $_SESSION['username'];
	echo"<h1 style='background-color:white;'>$header</h1>";
include "db_conn.php";
if(isset($_SESSION['username']) && isset($_SESSION['id'])){
	
   ?>
<!DOCTYPE html>
<html>
     <body>
    
    <h2><a href="logout.php" style='background-color:white;'>Logout</a><br> <a href="manage.php"style='background-color:white;'>Manage Users</a></h2>
    </body>
</html>
<?php
}else 
{
    header("Location: index.php");
    exit();
}

$tableBackground = $_SESSION['background'];  

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


}else{

	header("Location:Error.php");
}
?>