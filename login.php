<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])){  

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

if(empty($username)){
    header("Location: index.php?error=User Name is Required");
    exit();
}
else if (empty($password)){
    header("Location: index.php?error=Password is Required");
    exit();
}

$sql = "SELECT username,password,id,background FROM phpusers WHERE username='$username' AND password = SHA1('$password') ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){

    $password = SHA1($password);

    $row = mysqli_fetch_assoc($result);
    
    if($row['username'] === $username && $row['password'] === $password){
        echo "You have Logged In!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['background'] =  $row['background'];
        $_SESSION['id'] =  $row['id'];
        $_SESSION['online'] = TRUE;
        header("location: home.php");
        exit();
    }
    else{
        
        header("Location: index.php?error= Incorrect User Name or Password");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}
	
	
	
