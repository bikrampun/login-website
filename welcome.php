<?php
// Initialize the session
session_start();
if(isset($_SESSION['id'])){
    if ($_SESSION['id']==0) {
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/index.php");
        //header('location:index.php');
    } else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="assets/style.css">
  <!-- icon in tab -->
  <link rel="icon" href="assets/nepal.png">
</head>
<body>
  <div class="intro">
    <h4>Welcome<p class="fname"><?php echo $_SESSION['name'];?></p></h4>
    
    <div><a href="logout.php">Logout</a></div>
  </div>
  <div class="content">
    <p>Hi, you've just logged in. This is your personal profile.</p>
    <p>Thank you for joining to this website.</p>
    <p>Hope you like it.</p>
  </div>
</body>
</html>


<?php 

    } //closing else 
}// closing main-if
else{
//if session is not started then redirecting...
    $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/index.php");
    //header('location:index.php');
}
?> 
