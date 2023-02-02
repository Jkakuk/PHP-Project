<script>
function loadDoc(num) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ImageArea").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "getImage.php?id="+num, true);
  xhttp.send();
}
</script>

<?php
if (isset($_REQUEST['submit'])) {  
	
	
	

	include "db_conn.php";

	
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$tableUsername  = $_REQUEST['username'];
	$tablePassword = $_REQUEST['password'];
	$tableBackground = $_REQUEST['background'];
	
	
	
	
	
	$sql = "insert into phpusers (username,password,background) values ('$tableUsername', SHA1('$tablePassword'), '$tableBackground')";
	
	
	if($conn->query($sql) === TRUE){
		Echo"Account was created! <a href='index.php'>Click here to Log in</a>";
		$conn->close();
		die();
		
		
	}else die("Had Error!!!!" . $conn->error);

}








?>

<html>


<h1>Sign Up</h1>
<form>

<h3>Username</h3><br>
	<input type='text' name='username'><br>
<h3>Password</h3><br>
	<input type='password' name='password'><br>

<h3>Which background would you like?</h3>
	<input type='radio' name='background' value='1' onclick='loadDoc(1)'>Blue Skys
	<input type='radio' name='background' value='2' onclick='loadDoc(2)'>Mountain
	<input type='radio' name='background' value='3' onclick='loadDoc(3)'>Desert
	<input type='radio' name='background' value='4' onclick='loadDoc(4)'>Ocean<br><br>

<input type='submit' name='submit' value='Create Account'>       <input type='reset' name ='reset' value='Reset'>

<div id="ImageArea"style='width=49%;float:right;border:1px solid black'>

</div>

<p>
Already have an account? <a href='index.php'>Login Here!</a>
</p>



</form>


</html>