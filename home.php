<?php


session_start();
if(isset($_SESSION['user'])){
?>
<div style="text-align:center;position:relative;top:20%;">
<?php
      echo"<h2>Welcome ".$_SESSION['user']."</h2>";
      echo"<h4>You are visitor number ".$_SESSION['user_count']."</h4>";
?>
</div>
<?php
}
else{
     header('Location:login.html');
}

?>

