<?php 

	//connecting server
	//include("connect.php");
	require_once("connect.php");

	//Create database if doesnt exist.
	//$query="CREATE DATABASE LoginData";

	//Connecting database if database created.
	//$db=mysqli_select_db($connection,"logindata");

	//if(mysqli_query($connection,$query)){
		//if db connected then created table.	
		//if($db){
			$query1="CREATE TABLE users(id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT, fname varchar(50) NOT NULL, lname varchar(50) NOT NULL, email varchar(100) NOT NULL, password varchar(300) NOT NULL, contactno varchar(11) NOT NULL, posting_date datetime DEFAULT CURRENT_TIMESTAMP )";
			//$temp=mysqli_query($connection,$query1);
			//if(!$temp)
				//echo "Error in creating table".mysqli_error($connection);
			//else{
			//	echo "Success in creating table.";
			//}
		//}
		//else{
		//	echo"Error in selecting database<br>".mysqli_error($connection);
		//}
	//}
	/*else{
		echo"Error in creating DB<br>".mysqli_error($connection);
	} */
	
 ?>