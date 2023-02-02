<?php

session_start();
if(isset($_SESSION['online'])){
$header = $_SESSION['username'];
	echo"<h1 style='background-color:white;'>$header</h1>";
include "db_conn.php";

$sql = "SELECT id, background, username FROM phpusers";

$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0 ){
    echo "<table border=1 style='background-color:white;'>\n";
    echo "<tr><th>id</th><th>Name</th></tr>\n";
    while($row = $result -> fetch_assoc()){
		$id = $row['id'];
        echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td><a href='Delete.php?id=$id'>Delete User</a></td><td>
		<a href='Update.php?id=$id'>Update Registration</a></td>
		
		
		</tr>";
    }
    echo "</table><br>\n";
}


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
else{
	header("location: Error.php");
}

?>

<a href='home.php'style='background-color:white;'>Home Page</a><br><a href='logout.php' style='background-color:white;'>Logout</a>