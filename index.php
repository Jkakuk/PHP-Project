<!DOCTYPE html>
<html>
<head>
    <title> Log In</title>
</head>

<body> 
    <form action="login.php" method="POST">
        <h2>Log in</h2>
        <?php if(isset($_GET['error'])){?>
            <p> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label> User Name</label>
        <input type='text' name='username' placeholder='User Name'><br>
        <label>Password</label>
        <input type='password' name='password' placeholder='Password'><br>

        <button type='submit'>Login</button><a href='signup.php'>Need to Create an Account?</a>

        </form>
        </body>
        </html>

        