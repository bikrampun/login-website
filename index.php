<?php session_start();
//dbconnection.php connect to the host database.
//require_once('connect.php');
require_once('dbconnection.php');

//check if session already started
if(isset($_SESSION['id'])){
    if ($_SESSION['id'] != 0) {
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/welcome.php");
        //header('location:welcome.php');
    }
}
//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=ucfirst($_POST['fname']); //ucfirst() function converts the first character of a string to uppercase
	$lname=ucfirst($_POST['lname']);
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=md5($password); //md5 encrypt the password

	//check exist email from database
	$sql=mysqli_query($connection,"SELECT id FROM users WHERE email='$email'");
	
	if(!$sql)
	{
	//check if database is empty then first step, insert data
		$data="INSERT INTO users(fname,lname,email,password,contactno) VALUES('$fname','$lname','$email','$enc_password','$contact')";
		if(mysqli_query($connection,$data))
		{
			echo "<script>alert('Register successfully');</script>";
		}
		else{
			echo "<script>alert('Not successfully register');</script>";
		}

	} else {
	$row=mysqli_num_rows($sql);
	//return the number of rows present in the result set
	if($row>0)
	{
	//check if exists email find out.
		echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
	}
	else{
		$msg=mysqli_query($connection,"INSERT INTO users(fname,lname,email,password,contactno) VALUES('$fname','$lname','$email','$enc_password','$contact')");

		if($msg)
		{
			echo "<script>alert('Register successfully');</script>";
		}
	}
	}
}
// Code for login 
if(isset($_POST['login']))
{
	$password=$_POST['upassword'];
	$enc_password=md5($password);
	$useremail=$_POST['uemail'];
	$ret= mysqli_query($connection,"SELECT * FROM users WHERE email='$useremail' and password='$enc_password'");
	
	if(!$ret){
	//check if database is empty.
		echo "<script>alert('Please, Register first!');</script>";
	} else {
	$num=mysqli_fetch_array($ret);
	//fetches a result row as an associative array, a numeric array, or both
	if($num>0)
	{
		$_SESSION['login']=$_POST['uemail'];
		$_SESSION['id']=$num['id'];
		$_SESSION['name']=$num['fname'];
		$host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/welcome.php");
		//header("location: welcome.php");
	}
	else
	{
		echo "<script>alert('Invalid username or password');</script>";
		//header("location: index.php");
		
	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<!-- icon in tab -->
    <link rel="icon" href="assets/nepal.png">
</head>
<body onload="display1()">
	<h2>Registration and Login System</h2>
	<br>
	<div class="wrapAll">
		<div class="contentHead">
			<div class="optionlist">
				<div onclick="display2()" style="cursor: pointer;" id="register-button">
						<img src="assets/reg.png" alt="reg" width="40px" height="40px">
						<span id="register">Register</span>
					</div>
				<div onclick="display3()" style="cursor: pointer;" id="login-button">
						<img src="assets/log.png" alt="log" width="40px" height="40px">
						<span id="login">Login</span>
					</div>

			</div>
		</div>
		<div id="register-wrap">
			<p class="bottomline">Please, Register</p>
			<form class="registration" action="" method="POST">
				<p>First Name</p>
				<input type="text" name="fname" value="" class="text" required>
				<p>Last Name </p>
				<input type="text" class="text" value="" name="lname"  required>
				<p>Email Address </p>
				<input type="email" class="text" value="" name="email" required>
				<p>Password </p>
				<input type="password" value="" name="password" required>
				<p>Contact No. </p>
				<input type="text" value="" name="contact"  required>
				<div class="sign-up">
					<input type="reset" value="Reset">
					<input type="submit" name="signup"  value="Sign Up">
				</div>
			</form>
		</div>
		<div id="login-wrap">
			<p class="bottomline">Please, Login</p>
			<form class="login" action="" method="POST">
				<input type="email" class="text" name="uemail" value="" placeholder="Enter your registered email" required><br>
				<input type="password" value="" name="upassword" placeholder="Enter valid password" required>
				<div class="sign-in">
					<input type="submit" name="login" value="LOG IN" >
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/changeContent.js"></script>
</body>
</html>