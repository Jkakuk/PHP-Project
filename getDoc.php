<?php
include "db_conn.php";

if ($conn -> connect_error){
	die("Unable to connect" . $conn->connect_error);
}
$id = $_GET['id'];
$sql = "select name, image from images where id='$id'";
$result = $conn -> query($sql);
if (!$result){
	die("something wrong in query" . $conn->error);
}

$row = $result->fetch_assoc();

	$name = $row['name'];
	$image = $row['image'];
	
	
	
	//if((strncmp($type, "image", 5) != 0) or ($download == true)){
	//header("Content-Disposition: attachment; filename=$name");
	//}
	echo $row['image'];


$conn -> close();

?>

