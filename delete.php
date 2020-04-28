<?php

//http://codd.cs.gsu.edu/~mpalad1/tryout/uservalidate2.php
$servername = "localhost"; 
$username = "mpalad1"; 	   
$password = "mpalad1";     
$dbname = "mpalad1";  

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connections
if ($conn->connect_error) {

   die("FAILURE" . $conn->connect_error);
}
	echo "SUCCESS\n";
	

// Interpreting the users inputted data 
	if (isset($_POST['submit'])) {
		
		session_start(); 
		$username = mysqli_real_escape_string($conn, $_POST['username']);  // prevent mysql injection 
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
	

		if ($password == $password_2) {
			$password = md5($password_2); //tried to Hash for more password protection. 
			mysqli_select_db($conn, "mpalad1"); 
			$deletethis = $_POST['username']; 
			$sqlcommand = "DELETE FROM database3 WHERE Username='$deletethis';"; 
			mysqli_query($conn,$sqlcommand);  
			header ('Location: deleteuser_success.html'); 
			
			if (!mysqli_query($conn, "SET a=1")) { // states error if the query can't get inputted
				printf("error msg: %s\n", mysqli_error($conn));
			} 
			
			
		}
		
			
	}




	
	
?>


