<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="loginpage.css">
</head>
<body>
	<div class="login-box">
		<div class="login1">
		<h1>Login Here</h1><br>
		<form action="loginpage.php" method="post">
			<p>Username</p>
			<input type="text" name="Name" placeholder="Enter Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" maxlength="6"><br>
			<input type="submit" name="submit" value="Login" class="log">
		</form>
		</div>
	</div>
</body>
</html>


<?php


$server="localhost";
$username="root";
$password="";
$db="project";

$con=mysqli_connect($server,$username,$password,$db);

if(!$con)
{
	echo "Connection unsuccessful".mysqli_connect_error();
}
else
{
	echo "";
}
?>
<!-- login -->
<?php

if(isset($_POST['submit'])){
	$name=$_POST['Name'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM project WHERE Name='$name' AND password='$pass'";
	$result = mysqli_query($con,$sql);
	$check = mysqli_fetch_array($result);
	if(isset($check))
	{
		$_SESSION['user']= $name;
		$_SESSION['pass']= $pass;
        header("location:welcome.php");
	}
	else
	{
		// header("location:loginpage.php");
        echo '<script>
                window.location.href="loginpage.php";
                alert("wrong password or username!!!")
        </script>';
	}
}
?>