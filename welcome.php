<?php
// Initialize the session
session_start();

if ($_SESSION['id']==0) {
  header('location:index.php');
  }
else{
	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
  <div class="intro">
    <h4>Welcome<p class="fname"><?php echo $_SESSION['name'];?></p></h4>
    
    <div><a href="logout.php">Logout</a></div>
  </div>
  <div class="content">
    <p>Hi, you've just logged in. This is your personal profile.</p>
    <p>Thank you for joining to this website.</p>
  </div>
</body>
</html>


<?php } //closing else ?> 
