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

	$image = $row['image'];
	$name = $row['name'];
	
	
	echo "<img src='getDoc.php?id=$id'>";

	



$conn -> close();

?>

