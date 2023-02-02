<?php
session_start();

	
if(isset($_SESSION['online'])){
  
include "db_conn.php";

if(isset($_REQUEST['submit'])){
$id=$_GET['id'];
$idsesh = $_SESSION['id'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
if($_SESSION['username'] == $_REQUEST['username'] ){
    $_SESSION['username'] = $_REQUEST['username'];
}
$sql = "Update phpusers SET username='$username', password=SHA1('$password') WHERE id='$id' ";

if($conn->query($sql) === TRUE){
    
    


    header("Location:updated.php");

}else {
    echo"Error updating record: ". $conn-> error;
}
$conn -> close();
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





?><html>
    <h1 style='background-color:white;'><?php
    $header = $_SESSION['username'];
    echo $header;
    ?></h1>
 <form method="POST" style='background-color:white;'>
        
        <?php if(isset($_GET['error'])){?>
            <p> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label> User Name</label>
        <input type='text' name='username' placeholder='User Name'><br>
        <label>Password</label>
        <input type='password' name='password' placeholder='Password'><br>

        <button type='submit' name='submit'>Accept Changes</button> <a href="manage.php">Back</a>

        </form>
    </html>